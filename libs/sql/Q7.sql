SELECT SUM(overFifty.value) AS sum
        FROM (
        SELECT incomedata.reference, SUM(incomedata.value) as value
        FROM 
        (SELECT clients.reference,ROUND((CURRENT_DATE() - clients.dob)/10000, 0)
        FROM clients
        WHERE  ROUND((CURRENT_DATE() - dob)/10000, 0) > 50) AS c INNER JOIN incomedata
        ON c.reference = incomedata.reference
        WHERE incomedata.month = "Mar"
        GROUP BY c.reference) AS overFifty 