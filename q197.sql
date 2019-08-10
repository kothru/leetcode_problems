# Write your MySQL query statement below
SELECT w2.Id
  FROM Weather w1, Weather w2
 WHERE DATE_ADD(w1.RecordDate,INTERVAL 1 DAY) = w2.RecordDate
   AND w1.Temperature < w2.Temperature