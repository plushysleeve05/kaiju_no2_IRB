# kaiju_no2_IRB

Ashesi IRB Management System
Project Overview
The Ashesi Institutional Review Board (IRB) Management System is a web-based application designed to streamline the process of reviewing and approving research proposals at Ashesi University. It provides functionalities for researchers, administrators, and reviewers to manage submissions, track the review process, and ensure compliance with ethical standards.

A key feature of this system is the integration of a trained OpenAI API model, which reviews research papers and proposals, providing insightful comments and feedback to enhance the quality of submissions.

Features
User Authentication: Secure login and signup functionalities for different user roles (researchers, administrators, reviewers).
Proposal Submission: Researchers can submit proposals for review, along with necessary documents.
Automated Review with AI: The system utilizes a trained OpenAI API model to automatically review submitted research papers and proposals, offering comments and suggestions.
Review Process: Administrators and reviewers can view, comment on, and approve or reject submissions.
Dashboard: Custom dashboards for researchers and administrators to manage their tasks.
Plagiarism Check: Integrated plagiarism checking for submitted documents.
Responsive Design: The application is designed to be fully responsive and user-friendly.
Installation
Prerequisites
PHP: Ensure PHP is installed on your server.
MySQL: A MySQL database is required to store user data and proposal information.
Web Server: Apache or any other web server that supports PHP.
OpenAI API Key: A valid OpenAI API key is required for the AI-based review functionality.

Usage
For Researchers
Submit Proposals: Upload your research proposals and related documents.
Track Status: View the status of your submissions and any feedback provided.
For Administrators
Review Proposals: Manage and review submitted proposals.
Manage Users: Add or remove users and assign roles.


Memory updated
Here's the updated README content with the additional information about using a trained OpenAI API model for reviewing research papers and proposals:

Ashesi IRB Management System
Project Overview
The Ashesi Institutional Review Board (IRB) Management System is a web-based application designed to streamline the process of reviewing and approving research proposals at Ashesi University. It provides functionalities for researchers, administrators, and reviewers to manage submissions, track the review process, and ensure compliance with ethical standards.

A key feature of this system is the integration of a trained OpenAI API model, which reviews research papers and proposals, providing insightful comments and feedback to enhance the quality of submissions.

Features
User Authentication: Secure login and signup functionalities for different user roles (researchers, administrators, reviewers).
Proposal Submission: Researchers can submit proposals for review, along with necessary documents.
Automated Review with AI: The system utilizes a trained OpenAI API model to automatically review submitted research papers and proposals, offering comments and suggestions.
Review Process: Administrators and reviewers can view, comment on, and approve or reject submissions.
Dashboard: Custom dashboards for researchers and administrators to manage their tasks.
Plagiarism Check: Integrated plagiarism checking for submitted documents.
Responsive Design: The application is designed to be fully responsive and user-friendly.
Installation
Prerequisites
PHP: Ensure PHP is installed on your server.
MySQL: A MySQL database is required to store user data and proposal information.
Web Server: Apache or any other web server that supports PHP.
OpenAI API Key: A valid OpenAI API key is required for the AI-based review functionality.
Setup Instructions
Clone the repository:

bash
Copy code
git clone <repository-url>
Navigate to the project directory:

bash
Copy code
cd kaiju_no2_IRB
Import the database:

Open your MySQL client and create a new database.
Import the provided SQL files (Ashesi_IRB.sql and queries-3.sql) into your MySQL database.
Configure the application:

Update the config.php file in the settings directory with your database credentials.
Add your OpenAI API key to the configuration for enabling the AI-based review functionality.
Deploy the application:

Place the project files in your web server's root directory.
Start the web server.
Access the application:

Open your web browser and navigate to http://localhost/ to access the application.
Usage
For Researchers
Submit Proposals: Upload your research proposals and related documents.
Track Status: View the status of your submissions and any feedback provided.
For Administrators
Review Proposals: Manage and review submitted proposals.
Manage Users: Add or remove users and assign roles.
File Structure

kaiju_no2_IRB/
├── assets/                   # Contains images and other assets
├── css/                      # Stylesheets for the application
├── db/                       # SQL scripts for database setup
├── settings/                 # Configuration files
├── uploads/                  # Uploaded documents
├── view/                     # PHP files for different views
├── .git/                     # Git configuration files
└── README.md                 # Project documentation

License
This project is licensed under the MIT License. See the LICENSE file for details.
