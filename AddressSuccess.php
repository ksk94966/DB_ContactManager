<?php
session_start();
        $str = $_GET["q"];
        $arr = explode(",",$str);
        $Contactidphp = $arr[0];
        $Addresstypephp = $arr[1];
        $Addressphp = $arr[2];
        $Cityphp = $arr[3];
        $Statephp = $arr[4];
        $Zipphp = $arr[5];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            //echo "connection succesful";
            $stmt1 = $conn->prepare("INSERT INTO address (Contact_id,Address_type,Address, City,State,Zip) VALUES (?,?, ?, ?,?,?)");
            $stmt1->bind_param("issssi",$Contactidphp,$Addresstypephp, $Addressphp, $Cityphp,$Statephp,$Zipphp);
            $stmt1->execute();
            $prikey1 = $conn->insert_id;
            echo $prikey1;
        }
    session_destroy();
?>