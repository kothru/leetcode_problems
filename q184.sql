# Write your MySQL query statement below

SELECT dep.Name AS Department
      ,emp.Name AS Employee
      ,emp.Salary 
  FROM Department dep
  JOIN Employee emp
    ON dep.Id = emp.DepartmentId 
  JOIN (SELECT MAX(e.Salary) AS hi_sal
              ,d.Id
          FROM Employee e
          JOIN Department d
            ON e.DepartmentId = d.Id
         GROUP BY d.Id
        ) hi
    ON emp.Salary = hi.hi_sal
   AND dep.Id = hi.Id
  