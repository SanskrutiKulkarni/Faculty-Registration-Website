-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- 1. Procedure to calculate the average salary of employees in a given department.

CREATE PROCEDURE CalculateAverageSalary(in_department_id INT, OUT avg_salary DECIMAL)
BEGIN
    SELECT AVG(salary) INTO avg_salary
    FROM employees
    WHERE department_id = in_department_id;
END;


-- 2.Procedure to update the salary of an employee by a specified percentage.

CREATE PROCEDURE UpdateEmployeeSalary(in_emp_id INT, in_percentage DECIMAL)
BEGIN
    UPDATE employees
    SET salary = salary * (1 + in_percentage / 100)
    WHERE emp_id = in_emp_id;
END;


-- 3.Procedure to list all employees in a given department.

CREATE PROCEDURE ListEmployeesInDepartment(in_department_id INT)
BEGIN
    SELECT *
    FROM employees
    WHERE department_id = in_department_id;
END;


-- 4. Procedure to calculate the total budget allocated to a specific project.

CREATE PROCEDURE CalculateProjectTotalBudget(in_project_id INT, OUT total_budget DECIMAL)
BEGIN
    SELECT budget INTO total_budget
    FROM projects
    WHERE project_id = in_project_id;
END;


-- 5.Procedure to find the employee with the highest salary in a given department.

CREATE PROCEDURE FindEmployeeWithHighestSalary(in_department_id INT, OUT emp_id INT, OUT max_salary DECIMAL)
BEGIN
    SELECT emp_id, MAX(salary) INTO emp_id, max_salary
    FROM employees
    WHERE department_id = in_department_id;
END;


-- 6.Procedure to list all projects that are due to end within a specified number of days.

CREATE PROCEDURE ListProjectsDueToFinishWithinDays(in_days INT)
BEGIN
    SELECT *
    FROM projects
    WHERE DATEDIFF(end_date, CURDATE()) <= in_days;
END;


-- 7.Procedure to calculate the total salary expenditure for a given department.

CREATE PROCEDURE CalculateDepartmentTotalSalaryExpenditure(in_department_id INT, OUT total_salary DECIMAL)
BEGIN
    SELECT SUM(salary) INTO total_salary
    FROM employees
    WHERE department_id = in_department_id;
END;


-- 8.Procedure to generate a report listing all employees along with their department and salary details.

CREATE PROCEDURE GenerateEmployeeReport()
BEGIN
    SELECT e.emp_id, e.first_name, e.last_name, d.department_name, e.salary
    FROM employees e
    JOIN departments d ON e.department_id = d.department_id;
END;


-- 9.Procedure to find the project with the highest budget.

CREATE PROCEDURE FindProjectWithHighestBudget(OUT project_id INT, OUT max_budget DECIMAL)
BEGIN
    SELECT project_id, MAX(budget) INTO project_id, max_budget
    FROM projects;
END;


-- 10. Procedure to calculate the average salary of employees across all departments.

CREATE PROCEDURE CalculateOverallAverageSalary(OUT avg_salary DECIMAL)
BEGIN
    SELECT AVG(salary) INTO avg_salary
    FROM employees;
END;


-- 11.Procedure to assign a new manager to a department and update the manager_id in the departments table.

CREATE PROCEDURE AssignNewManager(in_department_id INT, in_new_manager_id INT)
BEGIN
    UPDATE departments
    SET manager_id = in_new_manager_id
    WHERE department_id = in_department_id;
END;


-- 12.Procedure to calculate the remaining budget for a specific project.

CREATE PROCEDURE CalculateRemainingProjectBudget(in_project_id INT, OUT remaining_budget DECIMAL)
BEGIN
    SELECT budget - SUM(salary) INTO remaining_budget
    FROM projects p
    JOIN employees e ON p.project_id = e.department_id
    WHERE p.project_id = in_project_id;
END;


-- 13.Procedure to generate a report of employees who joined the company in a specific year.

CREATE PROCEDURE GenerateEmployeeJoinYearReport(in_join_year INT)
BEGIN
    SELECT *
    FROM employees
    WHERE YEAR(join_date) = in_join_year;
END;


-- 14.Procedure to update the end date of a project based on its start date and duration.

CREATE PROCEDURE UpdateProjectEndDate(in_project_id INT, in_duration INT)
BEGIN
    UPDATE projects
    SET end_date = DATE_ADD(start_date, INTERVAL in_duration DAY)
    WHERE project_id = in_project_id;
END;


-- 15. Procedure to calculate the total number of employees in each department.

CREATE PROCEDURE CalculateEmployeesPerDepartment()
BEGIN
    SELECT department_id, COUNT(*) AS num_employees
    FROM employees
    GROUP BY department_id;
END;
