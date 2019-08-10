# Write your MySQL query statement below
SELECT d.Name AS Department
      ,e3.Name AS Employee 
      ,e3.Salary 
FROM Employee e3
JOIN Department d
  ON e3.DepartmentId = d.Id
JOIN (
    SELECT (
      SELECT COUNT(s1.Salary)
        FROM (SELECT DISTINCT e1.Salary
                    ,e1.DepartmentId 
                 FROM Employee e1
              ) s1
        WHERE s1.Salary >= s2.Salary
          AND s1.DepartmentId = s2.DepartmentId
    ) AS rank
          ,s2.Salary
          ,s2.DepartmentId
      FROM (SELECT DISTINCT e2.Salary
                  ,e2.DepartmentId 
                 FROM Employee e2
              ) s2
    ) s3
  ON e3.Salary = s3.Salary
 AND d.Id = s3.DepartmentId
WHERE s3.rank <= 3

      

  