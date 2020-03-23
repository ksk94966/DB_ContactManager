<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<?php

session_start();
        $str = $_GET["q"];
        $arr = explode(":",$str);
        $type = $arr[0];
        // $Datetypephp = $_GET["Datetype"];
        // $datephp = $_GET["date"];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            if($type=='name')
            {
                $Fnamephp = $arr[1];
                $Mnamephp = $arr[2];
                $Lnamephp = $arr[3];
                $stmt = $conn->prepare("INSERT INTO contact (Fname, Mname, Lname) VALUES (?, ?, ?)");
                $stmt->bind_param("sss",$Fnamephp, $Mnamephp, $Lnamephp);
                $stmt->execute();
                $prikey = $conn->insert_id;
                echo $prikey;
            }
            else if($type=='address')
            {
                $Contactidphp = $arr[1];
                $Addresstypephp = $arr[2];
                $Addressphp = $arr[3];
                $Cityphp = $arr[4];
                $Statephp = $arr[5];
                $Zipphp = $arr[6];
                $stmt1 = $conn->prepare("INSERT INTO address (Contact_id,Address_type,Address, City,State,Zip) VALUES (?,?, ?, ?,?,?)");
                $stmt1->bind_param("isssss",$Contactidphp,$Addresstypephp, $Addressphp, $Cityphp,$Statephp,$Zipphp);
                $stmt1->execute();
                $prikey1 = $conn->insert_id;
                echo $prikey1;
            }
            else if($type=='phone')
            {
                $Contactidphp = $arr[1];
                $Phonetypephp = $arr[2];
                $AreaCodephp = $arr[3];
                $Numberphp = $arr[4];
                $stmt2 = $conn->prepare("INSERT INTO phone (Contact_id,Phone_type, Area_code, Number) VALUES (?,?, ?, ?)");
                $stmt2->bind_param("isss",$Contactidphp,$Phonetypephp, $AreaCodephp, $Numberphp);
                $stmt2->execute();
                $prikey = $conn->insert_id;
                echo $prikey;
            }
            else if($type=='date')
            {
                $Contactidphp = $arr[1];
                $Datetypephp = $arr[2];
                $datephp = $arr[3];
                $stmt3 = $conn->prepare("INSERT INTO date (Contact_id,Date_type, date) VALUES (?,?,?)");
                $stmt3->bind_param("iss",$Contactidphp,$Datetypephp, $datephp);
                $stmt3->execute();
                $prikey = $conn->insert_id;
                echo $prikey;
            }
            //echo "connection succesful";
           
        }
        session_destroy();
?>

</body>    
</html>