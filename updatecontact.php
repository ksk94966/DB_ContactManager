<?php

    session_start();
    
    $type = $_GET['type'];
    $id = $_GET['id'];  
    if($type=="name")
    {
        $id = $_GET['id'];
        $Fnamephp = $_GET['Fname'];
        $Mnamephp = $_GET['Mname'];
        $Lnamephp = $_GET['Lname'];
        echo $Mnamephp;     
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {
            $sql = "UPDATE contact SET Fname=\"$Fnamephp\",Mname=\"$Mnamephp\",Lname=\"$Lnamephp\" WHERE Contact_id=".$id;
            echo $sql;
            if(mysqli_query($conn,$sql))
            {
                echo "Update Successful";
            }
            else
            {
                echo "Unsuccessful";
            }
                echo "<br><button><a href=\"contactIndex.php\">Modify</a></button>";
        }
        session_destroy();
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
            //echo "krishna";
            $sql = "UPDATE address SET Address_type=\"$Addresstypephp\",Address=\"$Addressphp\",City=\"$Cityphp\",State=\"$Statephp\",Zip=$Zipphp WHERE Address_id =".$id;
            if(mysqli_query($conn,$sql))
            {
                echo "Update Successful";
            }
            else
            {
                echo "Unsuccessful";
            }
                echo "<br><button><a href=\"contactIndex.php\">Modify</a></button>";
        }
        session_destroy();
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
            //echo "krishna";
            $sql = "UPDATE phone SET Phone_type=\"$Phonetypephp\",Area_code=$AreaCodephp,Number=\"$Numberphp\" WHERE Phone_id =".$id;
            //echo $sql;
            if(mysqli_query($conn,$sql))
            {
                echo "Update Successful";
            }
            else
            {
                echo "Unsuccessful";
            }
                echo "<br><button><a href=\"contactIndex.php\">Modify</a></button>";
        }
        session_destroy();
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
                echo "<br><button><a href=\"contactIndex.php\">Modify</a></button>";
        }
        session_destroy();
    }
    
?>