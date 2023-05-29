SELECT b.reference, CEILING(b.Jun/b.Jan*100-100) AS increase
        FROM (
        SELECT a.reference, a.Jan, SUM(incomedata.value) AS Jun
        FROM (
        SELECT reference, SUM(value) AS Jan
        FROM incomedata
        WHERE incomedata.month = "Jan"
        GROUP BY reference) AS a INNER JOIN incomedata 
        ON a.reference = incomedata.reference
        WHERE incomedata.month = "Jun"
        GROUP BY incomedata.reference) AS b
        ORDER BY increase DESC LIMIT 0,1