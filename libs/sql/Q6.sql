SELECT ROUND(AVG(dd.val),0) as median_val
        FROM (
        SELECT d.val, @rownum:=@rownum+1 as `row_number`, @total_rows:=@rownum
          FROM (SELECT SUM(value) AS val, month, reference
        FROM incomedata
        WHERE reference = (
SELECT reference
FROM clients
WHERE last_name = "Walker" AND first_name = "Caroline")
        GROUP BY month) d, (SELECT @rownum:=0) r
          WHERE d.val is NOT NULL
          ORDER BY d.val
        ) as dd
        WHERE dd.row_number IN ( FLOOR((@total_rows+1)/2), FLOOR((@total_rows+2)/2) );