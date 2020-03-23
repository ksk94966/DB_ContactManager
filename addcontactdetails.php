<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<?php

session_start();
        $str = $_GET["q"];
        $arr = explode(":",$str);
        $type = $arr[0];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
                $Fnamephp = $_GET['Fname'];
                $Mnamephp = $_GET['Mname'];
                $Lnamephp = $_GET['Lname'];
                $stmt = $conn->prepare("INSERT INTO contact (Fname, Mname, Lname) VALUES (?, ?, ?)");
                $stmt->bind_param("sss",$Fnamephp, $Mnamephp, $Lnamephp);
                $stmt->execute();
                $prikey = $conn->insert_id;
                echo "Contact Added Succesfully".$prikey;
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
        }

        header('location: contactIndex.php');
        session_destroy();
?>
<body>
<html>