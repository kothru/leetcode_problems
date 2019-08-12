# Write your MySQL query statement below
SELECT *
FROM (
SELECT s1.id, s2.student
  FROM seat s1, seat s2
 WHERE s1.id + 1 = s2.id
   AND MOD(s1.id,2) = 1
UNION ALL
SELECT s2.id, s1.student
  FROM seat s1, seat s2
 WHERE s1.id + 1 = s2.id
   AND MOD(s1.id,2) = 1
UNION ALL
SELECT s.id, s.student
  FROM seat s
 WHERE s.id = (SELECT MAX(id) FROM seat)
   AND MOD(s.id, 2) = 1
) s3
ORDER BY s3.id