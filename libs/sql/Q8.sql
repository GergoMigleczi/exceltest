SELECT month, SUM(value) AS sum
        FROM incomedata
        GROUP BY month
        ORDER BY sum DESC LIMIT 0,1