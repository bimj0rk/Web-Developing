SELECT department_id FROM departments MINUS SELECT department_id FROM employees WHERE job_id LIKE 'ST_CLERK';
SELECT last_name, first_name FROM employees WHERE job_id LIKE 'SA_REP' INTERSECT SELECT e.last_name, e.first_name FROM employees e JOIN departments d ON (e.department_id = d.department_id) WHERE d.department_id LIKE 80;
UPDATE employees SET salary = 1000 WHERE salary < 900;
/
CREATE TABLE dept(id NUMBER(7) CONSTRAINT deptb_id_pk PRIMARY KEY, dept_name VARCHAR2(25));
ALTER TABLE employees2 ADD job_id NUMBER(8);
CREATE OR REPLACE VIEW dept_80_view AS SELECT employee_id "EMPNO", last_name "EMPLOYEE", department_id "DEPTNO" FROM employees WHERE department_id = 80 WITH CHECK OPTION CONSTRAINT emp_dept_80;
UPDATE employees SET department_id = 50 WHERE last_name LIKE 'Abel';