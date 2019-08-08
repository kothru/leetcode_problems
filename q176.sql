# Write your MySQL query statement below
SELECT a.Salary as SecondHighestSalary
 FROM (SELECT NULL as Salary UNION ALL SELECT Salary FROM Employee) a
WHERE a.Salary IS NULL OR a.Salary <> (SELECT MAX(Salary) FROM Employee)
ORDER BY a.Salary DESC
 LIMIT 1