-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- 1.Trigger to increase salary by 10% for employees with salary below ?60000:

CREATE TRIGGER IncreaseSalaryTrigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    IF NEW.salary < 60000 THEN
        SET NEW.salary = NEW.salary * 1.1;
    END IF;
END;


-- 2.Trigger to prevent deleting records from departments table if employees are assigned to that department:

CREATE TRIGGER PreventDepartmentDeletionTrigger
BEFORE DELETE ON departments
FOR EACH ROW
BEGIN
    DECLARE employee_count INT;
    SELECT COUNT(*) INTO employee_count
    FROM employees
    WHERE department_id = OLD.department_id;

    IF employee_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot delete department with assigned employees';
    END IF;
END;


-- 3.Trigger to log salary updates into an audit table:

CREATE TRIGGER SalaryUpdateAuditTrigger
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    INSERT INTO salary_audit (emp_id, old_salary, new_salary, employee_name, change_date)
    VALUES (OLD.emp_id, OLD.salary, NEW.salary, CONCAT(OLD.first_name, ' ', OLD.last_name), NOW());
END;


-- 4.Trigger to assign department based on salary range:

CREATE TRIGGER AssignDepartmentTrigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    IF NEW.salary <= 60000 THEN
        SET NEW.department_id = 3; -- Department ID for salary range <= 60000
    -- Add more conditions for other salary ranges and corresponding department IDs
    END IF;
END;


-- 5.Trigger to update manager's salary when new employee is hired:

CREATE TRIGGER UpdateManagerSalaryTrigger
AFTER INSERT ON employees
FOR EACH ROW
BEGIN
    UPDATE employees
    SET salary = NEW.salary
    WHERE department_id = NEW.department_id
    ORDER BY salary DESC
    LIMIT 1; -- Update the highest-paid employee in the department
END;


-- 6.Trigger to prevent updating department_id if employee has worked on projects:

CREATE TRIGGER PreventDepartmentUpdateTrigger
BEFORE UPDATE ON employees
FOR EACH ROW
BEGIN
    DECLARE project_count INT;
    SELECT COUNT(*) INTO project_count
    FROM works_on
    WHERE emp_id = OLD.emp_id;

    IF project_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot update department for employee with assigned projects';
    END IF;
END;


-- 7.Trigger to update average salary for department on salary change:

CREATE TRIGGER UpdateAverageSalaryTrigger
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    UPDATE departments d
    SET d.avg_salary = (
        SELECT AVG(salary)
        FROM employees
        WHERE department_id = d.department_id
    )
    WHERE d.department_id = NEW.department_id;
END;


-- 8.Trigger to delete records from works_on table when employee is deleted:

CREATE TRIGGER DeleteWorksOnRecordsTrigger
AFTER DELETE ON employees
FOR EACH ROW
BEGIN
    DELETE FROM works_on
    WHERE emp_id = OLD.emp_id;
END;


-- 9.Trigger to prevent inserting employee with salary less than minimum for department:

CREATE TRIGGER PreventSalaryBelowMinimumTrigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    DECLARE min_salary DECIMAL;
    SELECT MIN_salary INTO min_salary
    FROM departments
    WHERE department_id = NEW.department_id;

    IF NEW.salary < min_salary THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Employee salary cannot be less than department minimum salary';
    END IF;
END;


-- 10.Trigger to update total salary budget for department on salary change:

CREATE TRIGGER UpdateTotalSalaryBudgetTrigger
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    UPDATE departments d
    SET d.total_salary_budget = (
        SELECT SUM(salary)
        FROM employees
        WHERE department_id = d.department_id
    )
    WHERE d.department_id = NEW.department_id;
END;


-- 11.Trigger to send email notification to HR on new employee hire:

-- Assuming the email sending mechanism is already set up
CREATE TRIGGER NewEmployeeNotificationTrigger
AFTER INSERT ON employees
FOR EACH ROW
BEGIN
    -- Code to send email notification to HR
    -- Example: INSERT INTO email_outbox (recipient, subject, body) VALUES ('hr@example.com', 'New Employee Hired', 'A new employee has been hired.');
END;


-- 12.Trigger to prevent inserting department without location:

CREATE TRIGGER PreventDepartmentWithoutLocationTrigger


BEFORE INSERT ON departments
FOR EACH ROW
BEGIN
    IF NEW.location IS NULL OR NEW.location = '' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Department location must be specified';
    END IF;
END;


-- 13.Trigger to update department_name in employees table on department_name update:

CREATE TRIGGER UpdateEmployeeDepartmentNameTrigger
AFTER UPDATE ON departments
FOR EACH ROW
BEGIN
    UPDATE employees
    SET department_name = NEW.department_name
    WHERE department_id = NEW.department_id;
END;


-- 14.Trigger to log all operations on employees table into audit table:

CREATE TRIGGER EmployeeTableAuditTrigger
AFTER INSERT, UPDATE, DELETE ON employees
FOR EACH ROW
BEGIN
    IF INSERTING THEN
        INSERT INTO employee_audit (operation, emp_id, first_name, last_name, salary, department_id, change_date)
        VALUES ('INSERT', NEW.emp_id, NEW.first_name, NEW.last_name, NEW.salary, NEW.department_id, NOW());
    ELSEIF UPDATING THEN
        INSERT INTO employee_audit (operation, emp_id, first_name, last_name, old_salary, new_salary, old_department_id, new_department_id, change_date)
        VALUES ('UPDATE', OLD.emp_id, OLD.first_name, OLD.last_name, OLD.salary, NEW.salary, OLD.department_id, NEW.department_id, NOW());
    ELSEIF DELETING THEN
        INSERT INTO employee_audit (operation, emp_id, first_name, last_name, salary, department_id, change_date)
        VALUES ('DELETE', OLD.emp_id, OLD.first_name, OLD.last_name, OLD.salary, OLD.department_id, NOW());
    END IF;
END;


-- 15.Trigger to generate employee ID using sequence:

-- Assuming a sequence named 'employee_id_sequence' exists
CREATE TRIGGER GenerateEmployeeIDTrigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    SET NEW.emp_id = NEXT VALUE FOR employee_id_sequence;
END;
