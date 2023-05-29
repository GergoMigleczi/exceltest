

<?php
include('config.php');
try{
    
        $mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            if ($mysqli->connect_error) {
            echo json_encode(["ConnectionFailed"=> $mysqli->connect_error]);
        }
    
     
        $result = $mysqli->query('SELECT month, SUM(value) AS sum
        FROM incomedata
        GROUP BY month
        ORDER BY sum DESC LIMIT 0,1');

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