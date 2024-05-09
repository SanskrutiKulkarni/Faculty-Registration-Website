-- // sign up login REGISTRATION TABLE
CREATE TABLE IF NOT EXISTS registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cast VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    re_password VARCHAR(255) NOT NULL
);
-- // personal details 1st page sql query
CREATE TABLE personaldetails (
    id INT(11) NOT NULL AUTO_INCREMENT,
    advertisement_number VARCHAR(50),
    date_of_application DATE,
    application_number VARCHAR(50),
    post_applied_for VARCHAR(100),
    department_school VARCHAR(100),
    first_name VARCHAR(50),
    middle_name VARCHAR(50),
    last_name VARCHAR(50),
    nationality VARCHAR(50),
    date_of_birth DATE,
    gender VARCHAR(20),
    marital_status VARCHAR(20),
    category VARCHAR(50),
    id_proof VARCHAR(50),
    father_name VARCHAR(100),
    correspondence_street VARCHAR(100),
    correspondence_city VARCHAR(100),
    correspondence_state VARCHAR(100),
    correspondence_country VARCHAR(100),
    correspondence_pin VARCHAR(20),
    permanent_street VARCHAR(100),
    permanent_city VARCHAR(100),
    permanent_state VARCHAR(100),
    permanent_country VARCHAR(100),
    permanent_pin VARCHAR(20),
    mobile VARCHAR(20),
    alternate_mobile VARCHAR(20),
    email VARCHAR(100),
    alternate_email VARCHAR(100),
    landline VARCHAR(20),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (id),
    UNIQUE KEY application_number (application_number)
) ;

-- // second page

CREATE TABLE detailsPHD (
    id INT AUTO_INCREMENT PRIMARY KEY,
    university VARCHAR(255),
    department VARCHAR(255),
    supervisor VARCHAR(255),
    joining_year INT,
    defence_date DATE,
    award_date DATE,
    thesis_title TEXT
);

CREATE TABLE detailsMTech (
    id INT AUTO_INCREMENT PRIMARY KEY,
    degree VARCHAR(50),
    university VARCHAR(255),
    branch VARCHAR(255),
    joining_year INT,
    completion_year INT,
    duration_years INT,
    percentage_cgpa VARCHAR(11),
    division_class VARCHAR(50)
);

CREATE TABLE detailsBTech (
    id INT AUTO_INCREMENT PRIMARY KEY,
    degree VARCHAR(255),
    university VARCHAR(255),
    branch VARCHAR(255),
    joining_year INT,
    completion_year INT,
    duration_years INT,
    percentage_cgpa VARCHAR(11),
    division_class VARCHAR(50)
);

CREATE TABLE additional_educational_qualifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    degree_certificate VARCHAR(255),
    university_institute VARCHAR(255),
    branch_stream VARCHAR(255),
    joining_year INT,
    completion_year INT,
    duration_years INT,
    percentage_cgpa VARCHAR(50) ,
    division_class VARCHAR(50)
);

CREATE TABLE academicdetails_class12 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    school VARCHAR(255),
    passing_year INT,
    percentage_grade VARCHAR(50),
    division_class VARCHAR(50)
);

-- // page 3
CREATE TABLE Present_Employment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Position VARCHAR(255),
    Organization VARCHAR(255),
    Status VARCHAR(50),
    Date_of_Joining DATE,
    Date_of_Leaving DATE,
    Duration VARCHAR(50)
);

CREATE TABLE Employment_History (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Position VARCHAR(255),
    Employer VARCHAR(255),
    Date_of_Joining DATE,
    Date_of_Leaving DATE,
    Duration VARCHAR(50)
);

CREATE TABLE Teaching_Experience (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Position VARCHAR(255),
    Employer VARCHAR(255),
    Course_Taught VARCHAR(255),
    UG_PG VARCHAR(10),
    No_of_Students INT,
    Date_of_Joining_Institute DATE,
    Date_of_Leaving_Institute DATE,
    Duration VARCHAR(50)
);

CREATE TABLE Research_Experience (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Position VARCHAR(255),
    Institute VARCHAR(255),
    Supervisor VARCHAR(255),
    Date_of_Joining DATE,
    Date_of_Leaving DATE,
    Duration VARCHAR(50)
);

CREATE TABLE Industrial_Experience (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Organization VARCHAR(255),
    Work_Profile VARCHAR(255),
    Date_of_Joining DATE,
    Date_of_Leaving DATE,
    Duration VARCHAR(50)
);

CREATE TABLE Specialization_Research (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Areas_of_specialization TEXT,
    Current_Area_of_research TEXT
);

-- // page 4
CREATE TABLE publicationssummary (
    id INT AUTO_INCREMENT PRIMARY KEY,
    NumInternationalJournalPapers INT,
    NumNationalJournalPapers INT,
    NumInternationalConferencePapers INT,
    NumNationalConferencePapers INT,
    NumPatents INT,
    NumBooks INT,
    NumBookChapters INT
);

CREATE TABLE BestPublications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    AuthorName VARCHAR(255),
    Title VARCHAR(255),
    JournalConferenceName VARCHAR(255),
    YearOfPublication INT,
    ImpactFactor DECIMAL(10, 2),
    DOI VARCHAR(255),
    Status VARCHAR(50)
);

CREATE TABLE Patents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    InventorName VARCHAR(255),
    Title VARCHAR(255),
    Country VARCHAR(100),
    PatentNumber VARCHAR(100),
    DateFiled DATE,
    DatePublished DATE,
    Status VARCHAR(50)
);

CREATE TABLE Books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    AuthorName VARCHAR(255),
    Title VARCHAR(255),
    YearOfPublication INT,
    ISBN VARCHAR(100)
);

CREATE TABLE BookChapters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    AuthorName VARCHAR(255),
    Title VARCHAR(255),
    YearOfPublication INT,
    ISBN VARCHAR(100)
);

CREATE TABLE GoogleScholarLinks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    URL VARCHAR(255)
);
-- //5th page
CREATE TABLE Professional_Societies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name_of_Society VARCHAR(255),
    Membership_Status VARCHAR(50)
);

CREATE TABLE Professional_Training (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Type_of_Training VARCHAR(255),
    Organisation VARCHAR(255),
    Year INT,
    Duration VARCHAR(50)
);

CREATE TABLE Awards_Recognition (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name_of_Award VARCHAR(255),
    Awarded_By VARCHAR(255),
    Year INT
);

CREATE TABLE Sponsored_Projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Sponsoring_Agency VARCHAR(255),
    Title_of_Project VARCHAR(255),
    Sanctioned_Amount DECIMAL(15, 2),
    Period VARCHAR(100),
    Role VARCHAR(255),
    Status VARCHAR(50)
);

CREATE TABLE Consultancy_Projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Organization VARCHAR(255),
    Title_of_Project VARCHAR(255),
    Amount_of_Grant DECIMAL(15, 2),
    Period VARCHAR(100),
    Role VARCHAR(255),
    Status VARCHAR(50)
);
-- //6th page
CREATE TABLE PhD_Thesis_Supervision (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Student_Name VARCHAR(255),
    Thesis_Title VARCHAR(255),
    Role VARCHAR(255),
    Ongoing_Completed VARCHAR(20),
    Ongoing_Since_Year_of_Completion INT
);

CREATE TABLE MTech_ME_Masters_Degree (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Student_Name VARCHAR(255),
    Thesis_Title VARCHAR(255),
    Role VARCHAR(255),
    Ongoing_Completed VARCHAR(20),
    Ongoing_Since_Year_of_Completion INT
);

CREATE TABLE BTech_BE_Bachelors_Degree (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Student_Name VARCHAR(255),
    Project_Title VARCHAR(255),
    Role VARCHAR(255),
    Ongoing_Completed VARCHAR(20),
    Ongoing_Since_Year_of_Completion INT
);

-- //7th page
CREATE TABLE Research_Contribution (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Research_Statement TEXT
);
CREATE TABLE Teaching_Contribution (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Courses_Developed TEXT
);
CREATE TABLE Other_Information (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Information TEXT
);
CREATE TABLE Professional_Service (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Description TEXT
);
CREATE TABLE Journal_Publications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Journal_Publications TEXT
);
CREATE TABLE Conference_Publications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Conference_Publications TEXT
);
-- //8th page
CREATE TABLE uploaded_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255),
    file_type VARCHAR(255),
    file_size INT,
    file_content LONGBLOB
);

CREATE TABLE referees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ref_name VARCHAR(255),
    position VARCHAR(255),
    association_referee VARCHAR(255),
    org VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20)
);


