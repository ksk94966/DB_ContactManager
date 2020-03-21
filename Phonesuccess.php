<?php

session_start();
        $str = $_GET["q"];
        $arr = explode(",",$str);
        $Contactidphp = $arr[0];
        $Phonetypephp = $arr[1];
        $AreaCodephp = $arr[2];
        $Numberphp = $arr[3];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            //echo "connection succesful";
            $stmt2 = $conn->prepare("INSERT INTO phone (Contact_id,Phone_type, Area_code, Number) VALUES (?,?, ?, ?)");
            $stmt2->bind_param("isis",$Contactidphp,$Phonetypephp, $AreaCodephp, $Numberphp);
            $stmt2->execute();
            $prikey = $conn->insert_id;
            echo $prikey;
        }
        session_destroy();
?>