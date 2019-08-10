# Write your MySQL query statement below
SELECT p.Email
  FROM Person p
 GROUP BY p.Email
 HAVING COUNT(p.Id) > 1;