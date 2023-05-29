




<?php
include('config.php');
try{
    
        $mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            if ($mysqli->connect_error) {
            echo json_encode(["ConnectionFailed"=> $mysqli->connect_error]);
        }
    
     
        $result = $mysqli->query('SELECT b.reference, CEILING(b.Jun/b.Jan*100-100) AS increase
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