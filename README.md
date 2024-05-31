# Faculty Registration Website

This is a faculty registration website where faculty members can sign up, log in, provide their personal details, academic qualifications, and more. Upon completion of the registration process, a PDF containing all the details provided by the user is generated using TCPDF. The user can download this PDF, and a copy is stored on the server. Additionally, the website supports email verification for password recovery and auto-saving of incomplete details.

####Note: To generate pdf at the end , you need tcpdf to be installed and placed inside the Project/DBMS_project directory

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
3. Import the SQL schema provided in `DBMS_SQL_Project` to set up the database schema.
4. Start your local server (Apache and MySQL) and navigate to the project directory in your web browser.

## Usage

1. Register for a new account or log in with existing credentials.
2. Fill in the multi-page form with personal details and academic qualifications.
3. In case of incomplete details, they will be auto-saved for logged-in users.
4. Use the forgot password functionality to reset your password via email verification.
5. Review the information provided on the final page.
6. Click on the "Submit" button to generate a PDF summarizing the details.
7. Download the generated PDF and store it for your records.

## Docker Deployment
Follow the steps below to set up the project on your local machine using Docker.

## Prerequisites

- Docker installed on your system. If you haven't installed Docker yet, you can download it from [here](https://www.docker.com/get-started).

## Steps for Deployment

1. **Clone the Repository**: Clone this repository to your local machine using the following command:

   ```bash
   git clone <repository-url>
   ```

2. **Build the Docker Image**: Navigate to the project directory and build the Docker image using the following command:

   ```bash
   docker build -t Project .
   ```

3. **Run the Docker Container**: Once the image is built, run the Docker container using the following command:

   ```bash
   docker run -d -p 8000:80 -v /path/to/DBMS_project:/var/www/html faculty-registration
   ```

   This command will start the container in detached mode and map port 8000 on your local machine to port 80 inside the container.

4. **Access the Website**: Open your web browser and navigate to [http://localhost:8000](http://localhost:8000) to access the faculty registration website.

5. **Access PHPMyAdmin (Optional)**: If you need to manage the MySQL database using PHPMyAdmin, you can access it by navigating to [http://localhost:8080](http://localhost:8080) in your web browser. Use `root` as the username and `12345` as the password.

## Docker Compose (Optional)

Alternatively, you can use Docker Compose to simplify the deployment process. The `docker-compose.yml` file provided in the repository defines the services required for the project:

- PHP with Apache server
- MySQL database
- PHPMyAdmin for database management

To deploy using Docker Compose, follow these steps:

1. Make sure Docker Compose is installed on your system. You can install it by following the instructions [here](https://docs.docker.com/compose/install/).

2. Navigate to the project directory containing the `docker-compose.yml` file.

3. Run the following command to start the services defined in the Docker Compose file:

   ```bash
   docker-compose up -d
   ```

   This command will start the services in detached mode, and you'll be able to access the website at [http://localhost:8000](http://localhost:8000) and PHPMyAdmin at [http://localhost:8080](http://localhost:8080).

## Notes

- The MySQL root password is set to `12345` by default. You can change it by modifying the `MYSQL_ROOT_PASSWORD` environment variable in the `docker-compose.yml` file.
- Make sure to update the PHP code and MySQL database credentials as per your requirements.

---

Feel free to customize this README file according to your project's specific requirements and provide any additional instructions or notes as needed.
