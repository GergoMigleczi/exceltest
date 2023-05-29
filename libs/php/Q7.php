


<?php
include('config.php');
try{
    
        $mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            if ($mysqli->connect_error) {
            echo json_encode(["ConnectionFailed"=> $mysqli->connect_error]);
        }
    
     
        $result = $mysqli->query('SELECT SUM(overFifty.value) AS sum
        FROM (
        SELECT incomedata.reference, SUM(incomedata.value) as value
        FROM 
        (SELECT clients.reference,ROUND((CURRENT_DATE() - clients.dob)/10000, 0)
        FROM clients
        WHERE  ROUND((CURRENT_DATE() - dob)/10000, 0) > 50) AS c INNER JOIN incomedata
        ON c.reference = incomedata.reference
        WHERE incomedata.month = "Mar"
        GROUP BY c.reference) AS overFifty 
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