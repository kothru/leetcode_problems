# Write your MySQL query statement below
SELECT e.Name as Employee
  FROM Employee e
 WHERE e.ManagerId IS NOT NULL
   AND e.Salary > (SELECT m.Salary 
                     FROM Employee m
                    WHERE m.Id = e.ManagerId)