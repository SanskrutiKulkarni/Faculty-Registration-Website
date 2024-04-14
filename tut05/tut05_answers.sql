-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 
-- 1. Select all employees from the 'Engineering' department.

SELECT *
FROM employees e
JOIN departments d ON e.department_id = d.department_id
WHERE d.department_name = 'Engineering';


-- 2.Perform a projection to display only the first names and salaries of all employees.

SELECT first_name, salary
FROM employees;


-- 3. Find employees who are managers.

SELECT *
FROM departments
WHERE manager_id IS NOT NULL;


-- 4. Perform a selection to retrieve employees earning a salary greater than ?60000.

SELECT *
FROM employees
WHERE salary > 60000;


-- 5. Join employees with their respective departments.

SELECT *
FROM employees e
JOIN departments d ON e.department_id = d.department_id;


-- 6. Perform a Cartesian product between employees and projects.

SELECT *
FROM employees, projects;


-- 7. Find employees who are not managers.

SELECT e.*
FROM employees e
LEFT JOIN departments d ON e.emp_id = d.manager_id
WHERE d.manager_id IS NULL;


-- 8. Perform a natural join between departments and projects.

SELECT *
FROM departments
NATURAL JOIN projects;


-- 9. Project the department names and locations from the departments table.

SELECT department_name, location
FROM departments;


-- 10. Perform a selection to retrieve projects with budgets greater than ?100000.

SELECT *
FROM projects
WHERE budget > 100000;


-- 11. Find employees who are managers in the 'Sales' department.

SELECT *
FROM departments
WHERE department_name = 'Sales' AND manager_id IS NOT NULL;


-- 12. Perform a union operation between two sets of employees from the 'Engineering' and 'Finance' departments.

(SELECT *
 FROM employees
 WHERE department_id = (SELECT department_id FROM departments WHERE department_name = 'Engineering'))
UNION
(SELECT *
 FROM employees
 WHERE department_id = (SELECT department_id FROM departments WHERE department_name = 'Finance'));


-- 13. Find employees who are not assigned to any projects.

SELECT *
FROM employees
WHERE emp_id NOT IN (SELECT emp_id FROM projects);


-- 14. Perform a join operation to display employees along with their project assignments.

SELECT *
FROM employees e
LEFT JOIN projects p ON e.emp_id = p.emp_id;


-- 15. Find employees whose salaries are not within the range ?50000 to ?70000.

SELECT *
FROM employees
WHERE salary NOT BETWEEN 50000 AND 70000;

