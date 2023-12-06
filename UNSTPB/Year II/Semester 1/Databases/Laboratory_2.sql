SELECT last_name, job_id, hire_date FROM employees WHERE last_name LIKE 'Matos%' OR last_name like 'Taylor%' ORDER BY hire_date;
SELECT last_name, job_id FROM employees WHERE manager_id IS NULL;
SELECT last_name, ROUND(MONTHS_BETWEEN(SYSDATE,hire_date)) "MONTHS_WORKED" FROM employees ORDER BY months_worked;
SELECT rpad(' ', salary/1000, '*') || ',' || last_name "EMPLOYEES_AND_THEIR_SALARIES" FROM employees ORDER BY employees_and_their_salaries;
SELECT last_name, LPAD(salary, 15, '$') "SALARY" FROM employees;
SELECT last_name, trunc((SYSDATE-hire_date)/7) "TENURE" FROM employees WHERE department_id LIKE '90' ORDER BY tenure DESC;