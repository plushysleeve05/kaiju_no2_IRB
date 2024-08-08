-- Database: IRBManagementSystem

-- Table structure for table `Roles`
CREATE TABLE Roles (
    role_id INT PRIMARY KEY AUTO_INCREMENT,
    role_name ENUM('SuperAdmin', 'Admin', 'User', 'Legal') NOT NULL
);

-- Table structure for table `Users`
CREATE TABLE Users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES Roles(role_id)
);

-- Table structure for table `Proposals`
CREATE TABLE Proposals (
    proposal_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Submitted', 'In Review', 'Approved', 'Rejected') DEFAULT 'Submitted',
    researcher_id INT,
    FOREIGN KEY (researcher_id) REFERENCES Users(user_id)
);

-- Table structure for table `Reviews`
CREATE TABLE Reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    proposal_id INT,
    reviewer_id INT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comments TEXT,
    decision ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    FOREIGN KEY (proposal_id) REFERENCES Proposals(proposal_id),
    FOREIGN KEY (reviewer_id) REFERENCES Users(user_id)
);

-- Table structure for table `Notifications`
CREATE TABLE Notifications (
    notification_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Table structure for table `SystemSettings`
CREATE TABLE SystemSettings (
    setting_id INT PRIMARY KEY AUTO_INCREMENT,
    setting_name VARCHAR(100) NOT NULL,
    setting_value VARCHAR(255) NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert predefined roles
INSERT INTO Roles (role_name) VALUES ('SuperAdmin'), ('Admin'), ('User'), ('Legal');

-- Example data for Users
INSERT INTO Users (username, password, role_id, first_name, last_name, email)
VALUES ('superadmin', 'hashed_password', (SELECT role_id FROM Roles WHERE role_name = 'SuperAdmin'), 'John', 'Doe', 'superadmin@ashesi.edu.gh'),
       ('admin1', 'hashed_password', (SELECT role_id FROM Roles WHERE role_name = 'Admin'), 'Alice', 'Brown', 'alice.brown@ashesi.edu.gh'),
       ('user1', 'hashed_password', (SELECT role_id FROM Roles WHERE role_name = 'User'), 'Jane', 'Smith', 'jane.smith@ashesi.edu.gh'),
       ('legal1', 'hashed_password', (SELECT role_id FROM Roles WHERE role_name = 'Legal'), 'Mark', 'Johnson', 'mark.johnson@ashesi.edu.gh');

-- Example data for Proposals
INSERT INTO Proposals (title, description, researcher_id)
VALUES ('Research on AI', 'A detailed proposal on artificial intelligence research.', (SELECT user_id FROM Users WHERE username = 'user1'));

-- Example data for Reviews
INSERT INTO Reviews (proposal_id, reviewer_id, comments, decision)
VALUES ((SELECT proposal_id FROM Proposals WHERE title = 'Research on AI'), (SELECT user_id FROM Users WHERE username = 'admin1'), 'Needs more detailed methodology.', 'Pending');

-- Example data for Notifications
INSERT INTO Notifications (user_id, message)
VALUES ((SELECT user_id FROM Users WHERE username = 'user1'), 'Your proposal has been submitted successfully.');

-- Example data for SystemSettings
INSERT INTO SystemSettings (setting_name, setting_value)
VALUES ('ReviewDeadline', '2024-07-20'),
       ('MaxReviewersPerProposal', '3');

