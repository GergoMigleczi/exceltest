SELECT month, SUM(value) AS sum
        FROM incomedata
        GROUP BY month
        ORDER BY sum ASC LIMIT 0,1