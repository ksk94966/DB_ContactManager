<?php

session_start();
        $str = $_GET["q"];
        $arr = explode(",",$str);
        $Fnamephp = $arr[0];
        $Mnamephp = $arr[1];
        $Lnamephp = $arr[2];
        // $Datetypephp = $_GET["Datetype"];
        // $datephp = $_GET["date"];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            //echo "connection succesful";
            $stmt = $conn->prepare("INSERT INTO contact (Fname, Mname, Lname) VALUES (?, ?, ?)");
            $stmt->bind_param("sss",$Fnamephp, $Mnamephp, $Lnamephp);
            $stmt->execute();
            $prikey = $conn->insert_id;
            echo $prikey;
            // $stmt3 = $conn->prepare("INSERT INTO date (Contact_id,Date_type, date) VALUES (?,?, ?)");
            // $stmt3->bind_param("iss",$prikey,$Datetypephp, $datephp);
            // $stmt3->execute();
            // echo "New records inserted";
            // echo "<script>alert(\"Insertion Successful\")</script>";
            // $stmt->close();
            // $conn->close();
        }
        session_destroy();
?>