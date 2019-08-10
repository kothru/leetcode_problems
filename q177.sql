CREATE FUNCTION getNthHighestSalary(N INT) RETURNS INT
BEGIN
  RETURN (
      # Write your MySQL query statement below.
      SELECT MAX(Salary)
      FROM (SELECT
              (SELECT COUNT(r.Salary)
                FROM (SELECT DISTINCT d.Salary
                      FROM Employee d
                     ) as r
               WHERE r.Salary >= e.Salary) AS RN,
             e.Salary
        FROM Employee e) s
       WHERE s.RN = N
  );
END