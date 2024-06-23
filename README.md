# Job-Portal-System
This project implements a job portal system where users can sign up, log in, apply for jobs, update their profiles, reset passwords, and log out. Administrators have additional functionalities such as managing categories, companies, jobs, and viewing applied jobs.

# Technologies Used
-Frontend: HTML, CSS, JavaScript
-Backend: PHP
-Database: MySQL (XAMPP server)
-Code Editor: Visual Studio Code

# Features for Users
-Sign Up: New users can register by providing necessary details.
-Login: Registered users can log in using their credentials.
-Apply Jobs: Users can browse available jobs and apply for positions they are interested in.
-Profile Update: Users can update their profile information such as contact details, skills, etc.
-Forget Password: Option to reset password via email verification.
-Logout: Option to securely log out from the system.

# Features for Admins
-Admin Sign Up: Administrators can create accounts with administrative privileges.
-Admin Login: Secure login for administrators.
-Manage Categories: Ability to add, edit, and delete job categories.
-Manage Companies: Add, update, and remove company profiles.
-Manage Jobs: Create, edit, and delete job postings.
-View Applied Jobs: Review applications submitted by users.
-Admin Dashboard: Provides an overview of system activities and statistics.
-Add Customers: Add new customers to the system for targeted job postings.

# Development Environment Setup
-Code Editor: Install Visual Studio Code (or any preferred code editor).
-Backend Setup: Use XAMPP to set up a local server environment with PHP and MySQL.
-Database Configuration: Import the provided SQL schema (database.sql) into your MySQL database using phpMyAdmin.
-Run the Application: Start Apache and MySQL servers in XAMPP. Open the project folder in Visual Studio Code and launch the application.

# Directory Structure
job_portal/
├── css/
│   └── styles.css
├── js/
│   └── script.js
├── php/
│   ├── config.php
│   ├── functions.php
│   ├── index.php
│   ├── login.php
│   ├── signup.php
│   ├── apply_job.php
│   ├── update_profile.php
│   ├── forgot_password.php
│   ├── logout.php
│   ├── admin/
│   │   ├── admin_dashboard.php
│   │   ├── add_category.php
│   │   ├── add_company.php
│   │   ├── add_job.php
│   │   ├── add_customer.php
│   │   ├── manage_categories.php
│   │   ├── manage_companies.php
│   │   ├── manage_jobs.php
│   │   ├── view_applied_jobs.php
│   │   └── admin_logout.php
│   └── includes/
│       └── header.php
├── index.html
├── login.html
├── signup.html
├── apply_job.html
├── update_profile.html
├── forgot_password.html
├── admin_login.html
└── README.md

ChatGPT
Job Portal System
This project implements a job portal system where users can sign up, log in, apply for jobs, update their profiles, reset passwords, and log out. Administrators have additional functionalities such as managing categories, companies, jobs, and viewing applied jobs.

Technologies Used
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL (XAMPP server)
Code Editor: Visual Studio Code
Features for Users
Sign Up: New users can register by providing necessary details.
Login: Registered users can log in using their credentials.
Apply Jobs: Users can browse available jobs and apply for positions they are interested in.
Profile Update: Users can update their profile information such as contact details, skills, etc.
Forget Password: Option to reset password via email verification.
Logout: Option to securely log out from the system.
Features for Admins
Admin Sign Up: Administrators can create accounts with administrative privileges.
Admin Login: Secure login for administrators.
Manage Categories: Ability to add, edit, and delete job categories.
Manage Companies: Add, update, and remove company profiles.
Manage Jobs: Create, edit, and delete job postings.
View Applied Jobs: Review applications submitted by users.
Admin Dashboard: Provides an overview of system activities and statistics.
Add Customers: Add new customers to the system for targeted job postings.
Development Environment Setup
Code Editor: Install Visual Studio Code (or any preferred code editor).

Backend Setup: Use XAMPP to set up a local server environment with PHP and MySQL.

Database Configuration: Import the provided SQL schema (database.sql) into your MySQL database using phpMyAdmin.

Run the Application: Start Apache and MySQL servers in XAMPP. Open the project folder in Visual Studio Code and launch the application.

Directory Structure
arduino
Copy code
job_portal/
├── css/
│   └── styles.css
├── js/
│   └── script.js
├── php/
│   ├── config.php
│   ├── functions.php
│   ├── index.php
│   ├── login.php
│   ├── signup.php
│   ├── apply_job.php
│   ├── update_profile.php
│   ├── forgot_password.php
│   ├── logout.php
│   ├── admin/
│   │   ├── admin_dashboard.php
│   │   ├── add_category.php
│   │   ├── add_company.php
│   │   ├── add_job.php
│   │   ├── add_customer.php
│   │   ├── manage_categories.php
│   │   ├── manage_companies.php
│   │   ├── manage_jobs.php
│   │   ├── view_applied_jobs.php
│   │   └── admin_logout.php
│   └── includes/
│       └── header.php
├── index.html
├── login.html
├── signup.html
├── apply_job.html
├── update_profile.html
├── forgot_password.html
├── admin_login.html
└── README.md

# Usage
1. Clone the Repository:
   git clone https://github.com/yourusername/job_portal.git
2. Open the Project:
   Open the project folder in Visual Studio Code.
3. Start XAMPP:
   Start Apache and MySQL servers in XAMPP control panel.
4. Access the Application:
   Open http://localhost/job_portal in your web browser to access the job portal application.

# Notes
-Ensure proper security measures such as input validation and authentication checks are implemented to prevent vulnerabilities.
-Customize and extend the application as per specific requirements and business logic.
-Refer to individual PHP files for detailed implementation of functionalities.
