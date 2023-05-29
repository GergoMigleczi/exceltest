

<?php
include('config.php');
try{
    
        $mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            if ($mysqli->connect_error) {
            echo json_encode(["ConnectionFailed"=> $mysqli->connect_error]);
        }
    
     
        $result = $mysqli->query('SELECT reference, dob FROM clients');

        $respond = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dateArr = explode("-",$row["dob"]);
                $row["dob"] = $dateArr[2]."-".$dateArr[1]."-".$dateArr[0];
                array_push($respond, $row);

                $q = $mysqli->prepare('UPDATE clients SET dob = ? WHERE reference = ?');
                $q->bind_param("ss", $row["dob"], $row["reference"]);
                $r = $q->execute();
            }
        }
    
        print_r($respond);
    }catch(Exception $err){
        $result = $err->getMessage();
        echo json_encode($result);
    }
?>