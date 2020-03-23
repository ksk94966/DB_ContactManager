<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<?php

session_start();
        $type = $_GET['type'];
        $Contactidphp = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            if($type=='address')
            {
                $Addresstypephp = $_GET['Addresstype'];
                $Addressphp = $_GET['Address'];
                $Cityphp = $_GET['City'];
                $Statephp = $_GET['State'];
                $Zipphp = $_GET['Zip'];
                $stmt1 = $conn->prepare("INSERT INTO address (Contact_id,Address_type,Address, City,State,Zip) VALUES (?,?, ?, ?,?,?)");
                $stmt1->bind_param("isssss",$Contactidphp,$Addresstypephp, $Addressphp, $Cityphp,$Statephp,$Zipphp);
                $stmt1->execute();
                $prikey1 = $conn->insert_id;
                echo $prikey1;
            }
            else if($type=='phone')
            {
                $Phonetypephp = $_GET['Phonetype'];
                $AreaCodephp = $_GET['AreaCode'];
                $Numberphp = $_GET['Number'];
                $stmt2 = $conn->prepare("INSERT INTO phone (Contact_id,Phone_type, Area_code, Number) VALUES (?,?, ?, ?)");
                $stmt2->bind_param("isss",$Contactidphp,$Phonetypephp, $AreaCodephp, $Numberphp);
                $stmt2->execute();
                $prikey = $conn->insert_id;
                echo $prikey;
            }
            else if($type=='date')
            {
                $Datetypephp = $_GET["Datetype"];
                $datephp = $_GET["date"];
                $stmt3 = $conn->prepare("INSERT INTO date (Contact_id,Date_type, date) VALUES (?,?,?)");
                $stmt3->bind_param("iss",$Contactidphp,$Datetypephp, $datephp);
                $stmt3->execute();
                $prikey = $conn->insert_id;
                echo $prikey;
            }
            //echo "connection succesful";
           
        }

        header('location: viewcontact.php?contactid='.$Contactidphp);
        session_destroy();

?>

</body>    
</html>