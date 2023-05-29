SELECT provider, SUM(value) AS sum
        FROM incomedata
        GROUP BY provider
        ORDER BY sum DESC LIMIT 0,1