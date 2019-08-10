# Write your MySQL query statement below

SELECT t.Request_at AS Day
      ,ROUND(COUNT(t.Status = 'cancelled_by_driver' OR t.Status = 'cancelled_by_client' OR NULL) / COUNT(t.Id),2) AS "Cancellation Rate"
  FROM Trips t
  JOIN Users u
    ON t.Client_Id = u.Users_Id
 WHERE t.Request_at BETWEEN '2013-10-01' AND '2013-10-03'
   AND u.Banned = "No"
 GROUP BY t.Request_at