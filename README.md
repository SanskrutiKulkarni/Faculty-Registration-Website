# 2201AI56_CS260

# Faculty Registration Website

This is a faculty registration website where faculty members can sign up, log in, provide their personal details, academic qualifications, and more. Upon completion of the registration process, a PDF containing all the details provided by the user is generated using TCPDF. The user can download this PDF, and a copy is stored on the server. Additionally, the website supports email verification for password recovery and auto-saving of incomplete details.

## Table of Contents

- [Features](#key-features)
- [Technologies Used](#technologies-used)
- [Setup and Installation](#setup-and-installation)
- [Usage](#usage)
- [Docker Deployment](#docker-deployment)

### Key Features:
1. **User Authentication:**
   - The website features user authentication functionality, allowing faculty members to sign up for a new account or log in with existing credentials. This ensures secure access to the registration process and user-specific data.

2. **Registration Process:**
   - Upon logging in, faculty members are guided through a multi-page registration form. This form collects various details, including personal information (e.g., name, contact information) and academic qualifications (e.g., degrees, certifications).

3. **Email Verification for Password Recovery:**
   - The website incorporates an email verification system to enable password recovery functionality. In the event that a faculty member forgets their password, they can initiate the password recovery process, which involves verifying their email address for security purposes.

4. **Auto-Saving of Incomplete Details:**
   - To enhance user experience, the website automatically saves incomplete registration details for logged-in users. This ensures that faculty members can resume the registration process from where they left off without losing any entered information.

5. **PDF Generation:**
   - Upon completing the registration process, faculty members have the option to submit their details. Subsequently, the website generates a PDF document summarizing all the information provided by the user. This PDF serves as a record of the registration details and can be downloaded by the user for their records.

6. **Server-Side Storage of PDFs:**
   - Additionally, a copy of the generated PDF document is stored on the server for record-keeping purposes. This ensures that a record of each faculty member's registration details is maintained within the system.

### Technologies Used:
Your project leverages a variety of technologies to implement its functionality, including:

- **Frontend Development:** HTML, CSS, JavaScript
- **Backend Development:** PHP
- **Database Management:** MySQL
- **PDF Generation:** TCPDF
- **Local Development Environment:** XAMPP

## Setup and Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/faculty-registration-website.git
   ```

2. Set up your local development environment using XAMPP or similar tools.
3. Import the SQL schema provided in `database.sql` to set up the database schema.
4. Configure the database connection settings in `config.php`.
5. Start your local server (Apache and MySQL) and navigate to the project directory in your web browser.

## Usage

1. Register for a new account or log in with existing credentials.
2. Fill in the multi-page form with personal details and academic qualifications.
3. In case of incomplete details, they will be auto-saved for logged-in users.
4. Use the forgot password functionality to reset your password via email verification.
5. Review the information provided on the final page.
6. Click on the "Submit" button to generate a PDF summarizing the details.
7. Download the generated PDF and store it for your records.

## Docker Deployment

To deploy this project using Docker, follow these steps:

1. Install Docker on your system if you haven't already.
2. Clone the repository to your local machine.
3. Build the Docker image:

   ```bash
   docker build -t faculty-registration .
   ```

4. Run the Docker container:

   ```bash
   docker run -d -p 80:80 faculty-registration
   ```

5. Access the website in your browser at `http://localhost`.
