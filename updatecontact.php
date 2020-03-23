<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<?php

    session_start();
    
    $type = $_GET['type'];
    $id = $_GET['id'];  
    $result ="";
    if($type=="name")
    {

        //$id = $_GET['id'];
        $Fnamephp = $_GET['Fname'];
        $Mnamephp = $_GET['Mname'];
        $Lnamephp = $_GET['Lname'];
        //echo $Mnamephp;     
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {
            $sql = "UPDATE contact SET Fname=\"$Fnamephp\",Mname=\"$Mnamephp\",Lname=\"$Lnamephp\" WHERE Contact_id=".$id;
            //echo $sql;
            if(mysqli_query($conn,$sql))
            {
                echo "Update Successful";
            }
            else
            {
                echo "Unsuccessful";
            }
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
        }
        
    }
    else if($type=="address")
    {

        $Addresstypephp = $_GET['Addresstype'];
        $Addressphp = $_GET['Address'];
        $Cityphp = $_GET['City'];
        $Statephp = $_GET['State'];
        $Zipphp = $_GET['Zip'];  
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {
            $sql1 = "SELECT Contact_id FROM address WHERE Address_id =$id";
            $result1 = mysqli_query($conn,$sql1);
            $result = mysqli_fetch_array($result1);
            //echo "krishna";
            $sql = "UPDATE address SET Address_type=\"$Addresstypephp\",Address=\"$Addressphp\",City=\"$Cityphp\",State=\"$Statephp\",Zip=\"$Zipphp\" WHERE Address_id =".$id;
            if(mysqli_query($conn,$sql))
            {
                echo "Update Successful";
            }
            else
            {
                echo "Unsuccessful";
            }
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
        }
        
    }
    else if($type=="phone")
    {

        $Phonetypephp = $_GET['Phonetype'];
        $AreaCodephp = $_GET['AreaCode'];
        $Numberphp = $_GET['Number'];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {
            $sql1 = "SELECT Contact_id FROM phone WHERE Phone_id =$id";
            $result1 = mysqli_query($conn,$sql1);
            $result = mysqli_fetch_array($result1);
            //echo "krishna";
            $sql = "UPDATE phone SET Phone_type=\"$Phonetypephp\",Area_code=\"$AreaCodephp\",Number=\"$Numberphp\" WHERE Phone_id =".$id;
            //echo $sql;
            if(mysqli_query($conn,$sql))
            {
                echo "Update Successful";
            }
            else
            {
                echo "Unsuccessful";
            }
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
        }
        
    }
    else if($type=="date")
    {
        
        $Datetypephp = $_GET["Datetype"];
        $datephp = $_GET["date"];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {
            $sql1 = "SELECT Contact_id FROM date WHERE date_id =$id";
            $result1 = mysqli_query($conn,$sql1);
            $result = mysqli_fetch_array($result1);
            //echo "krishna";
            $sql = "UPDATE date SET Date_type=\"$Datetypephp\",date=\"$datephp\" WHERE date_id =".$id;
            //echo $sql;
            if(mysqli_query($conn,$sql))
            {
                echo "Update Successful";
            }
            else
            {
                echo "Unsuccessful";
            }
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
        }
        
        }

        if($type=="name")
        {
            header('location: viewcontact.php?contactid='.$id);
        }
        else
        {
            header('location: viewcontact.php?contactid='.$result['Contact_id']);
        }
        
        session_destroy();
    
?>
</body>
</html>