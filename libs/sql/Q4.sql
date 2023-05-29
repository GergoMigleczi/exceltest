SELECT reference, SUM(value) AS sum
        FROM incomedata
        GROUP BY reference
        ORDER BY sum DESC LIMIT 0,1