<?php

session_start();
        $str = $_GET["q"];
        $arr = explode(",",$str);
        $Contactidphp = $arr[0];
        $Datetypephp = $arr[1];
        $datephp = $arr[2];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            //echo "connection succesful";
            $stmt3 = $conn->prepare("INSERT INTO date (Contact_id,Date_type, date) VALUES (?,?,?)");
            $stmt3->bind_param("iss",$Contactidphp,$Datetypephp, $datephp);
            $stmt3->execute();
            $prikey = $conn->insert_id;
            echo $prikey;
        }
        session_destroy();
?>