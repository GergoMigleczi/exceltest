


<?php
include('config.php');
try{
    
        $mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            if ($mysqli->connect_error) {
            echo json_encode(["ConnectionFailed"=> $mysqli->connect_error]);
        }
    
     
        $result = $mysqli->query('SELECT ROUND(AVG(dd.val),0) as median_val
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
        ');

        $respond = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            array_push($respond, $row);
            }
        }
    
        echo json_encode($respond);
    }catch(Exception $err){
        $result = $err->getMessage();
        echo json_encode($result);
    }
?>