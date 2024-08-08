import os
from flask import Flask, request, render_template, redirect, url_for, jsonify
from openai import OpenAI
from dotenv import load_dotenv
import yaml
import fitz  # PyMuPDF
import docx  # python-docx
import re

# Load environment variables from .env file
load_dotenv()

app = Flask(__name__)
app.config['UPLOAD_FOLDER'] = 'uploads'
app.config['ALLOWED_EXTENSIONS'] = {'pdf', 'docx'}

# Get the API key from environment variable
api_key = os.getenv('OPENAI_API_KEY')

# Instantiate the OpenAI client
client = OpenAI(api_key=api_key)

# Other code...

# Define the threshold for generating comments
section_score_threshold = 7  # Scores below this will get comments
cumulative_threshold = 80    # Overall score threshold

# Function to split text into chunks
def split_text_into_chunks(text, num_chunks):
    avg_chunk_size = len(text) // num_chunks
    chunks = [text[i:i+avg_chunk_size] for i in range(0, len(text), avg_chunk_size)]
    return chunks

# Function to evaluate a section and get comments if the score is low
def evaluate_section_and_comment(text):
    text_chunks = split_text_into_chunks(text, 3)  # Split into 3 chunks
    
    scores = {}
    comments = {}

    for idx, chunk in enumerate(text_chunks):
        messages = [
            {"role": "system", "content": "You are the chairman of the Institutional Review Board of a reputable university."},
            {"role": "system", "content": "In your evaluation take into consideration the syntax, grammatical composition, topic relevance, and efficacy of execution."},
            {"role": "system", "content": "Grade the research papers based strictly on the title, introduction, literature review, methodology, results, discussion, and conclusion. Do not be lenient; review with the highest academic standards in mind."},
            {"role": "system", "content": "If a section is incomplete or poorly executed, award a low mark accordingly."},
            {"role": "system", "content": "Only review the title, introduction, literature review, methodology, results, discussion, and conclusion once. Do not look through the paper attempting to review it multiple times. You are to only do it once!"},
            {"role": "user", "content": f"Evaluate the following sections of a research paper based on its content while comparing it to the criteria for great research papers:\n\n{chunk}\n\nProvide a score out of 10 for each section and give detailed feedback:"},
            {"role": "system", "content": "For the sections (title, introduction, literature review, methodology, results, discussion, and conclusion) look through the chunks to find the ones available and dont grade if they are not in that chunk."},
            {"role": "system", "content": "At the end of the review process, provide a fitting score out of 100 based on the sections reviewed."}
        ]

        response = client.chat.completions.create(
            model="gpt-4",
            messages=messages,
            max_tokens=2048
        )
        score_text = response.choices[0].message.content.strip()
        print("API Response (Score Text):", score_text)  # Debug statement to inspect the response

        try:
            chunk_scores, chunk_comments = extract_scores_and_comments(score_text)
            scores.update(chunk_scores)
            comments.update(chunk_comments)
        except Exception as e:
            print(f"Error extracting scores and comments: {e}")
            continue

    return scores, comments

def extract_scores_and_comments(score_text):
    scores = {}
    comments = {}
    current_section = None
    for line in score_text.split('\n'):
        if 'Score:' in line:
            section, score_comment = line.split('Score:', 1)
            section = section.strip()
            match = re.search(r'(\d+(\.\d+)?)', score_comment)
            if match:
                score = float(match.group(1))
                scores[section] = score
                comments[section] = f"Feedback:\n{score_comment.strip()}"
            else:
                scores[section] = 0  # Default to 0 if no score is found
                comments[section] = f"Feedback:\n{score_comment.strip()} - No valid score found."
        elif current_section:
            comments[current_section] += f"\n{line.strip()}"
        else:
            current_section = line.strip()
            comments[current_section] = line.strip()
    return scores, comments

def calculate_overall_score(scores):
    if scores:
        average_score = sum(scores.values()) / len(scores)
        overall_score = (average_score / 10) * 100  # Convert to a score out of 100
        return overall_score
    return 0

def passes_sectional_thresholds(scores, min_thresholds):
    return all(section in scores and scores[section] >= min_thresholds[section] for section in min_thresholds)

# Define minimum thresholds
min_thresholds = {
    'methodology': 7,
    'results': 7,
    'literature review': 7,
    'conclusion': 7
}

def extract_text_from_pdf(file_path):
    doc = fitz.open(file_path)
    text = ""
    for page in doc:
        text += page.get_text()
    return text

def extract_text_from_docx(file_path):
    doc = docx.Document(file_path)
    text = "\n".join([paragraph.text for paragraph in doc.paragraphs])
    return text

def process_paper(file_path):
    file_extension = os.path.splitext(file_path)[1].lower()
    if file_extension == '.pdf':
        text = extract_text_from_pdf(file_path)
    elif file_extension == '.docx':
        text = extract_text_from_docx(file_path)
    else:
        raise ValueError("Unsupported file format")

    scores, comments = evaluate_section_and_comment(text)

    overall_score = calculate_overall_score(scores)
    passes_min_thresholds = passes_sectional_thresholds(scores, min_thresholds)

    results = {
        "scores": scores,
        "overall_score": overall_score,
        "pass": overall_score >= cumulative_threshold and passes_min_thresholds,
        "comments": comments
    }

    for section, score in scores.items():
        if score < section_score_threshold or (section in min_thresholds and score < min_thresholds[section]):
            results[f"comments_for_{section}"] = comments.get(section, "")

    overall_comment = "The paper has passed the evaluation." if results["pass"] else "The paper has not passed the evaluation."
    results["overall_comment"] = overall_comment

    return results

def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in app.config['ALLOWED_EXTENSIONS']

@app.route('/upload', methods=['POST'])
def upload_file():
    if 'file' not in request.files:
        return jsonify({'error': 'No file part'}), 400
    file = request.files['file']
    if file.filename == '':
        return jsonify({'error': 'No selected file'}), 400
    if file and allowed_file(file.filename):
        filename = file.filename
        filepath = os.path.join(app.config['UPLOAD_FOLDER'], filename)
        file.save(filepath)
        results = process_paper(filepath)
        return jsonify(results)
    return jsonify({'error': 'Invalid file format'}), 400

if __name__ == '__main__':
    if not os.path.exists(app.config['UPLOAD_FOLDER']):
        os.makedirs(app.config['UPLOAD_FOLDER'])
    app.run(debug=False)
