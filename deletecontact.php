<?php
session_start();

        $id = $_GET['id'];
        //echo $id;
        $type = $_GET['type'];
        //echo $type;
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            //echo "<button><a href=\"contactIndex.php\">Home</a></button>";
            if($type=="contact")
            {
                $sql = "DELETE FROM contact WHERE Contact_id =$id";
                if(mysqli_query($conn,$sql)){
                    echo "Deleted Contact - Successful";
                }else{
                    echo "Unsuccessful";
                }
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
            }
            else if($type=="address")
            {
                $sql = "DELETE FROM address WHERE Address_id =$id";
                if(mysqli_query($conn,$sql)){
                    echo "Deleted Address - Successful";
                }else{
                    echo "Unsuccessful";
                }
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
                
            }
            else if($type=="phone")
            {
                $sql = "DELETE FROM phone WHERE Phone_id =$id";
                if(mysqli_query($conn,$sql)){
                    echo "Deleted Phone details - Successful";
                }else{
                    echo "Unsuccessful";
                }
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
            }
            else if($type=="date")
            {
                $sql = "DELETE FROM date WHERE date_id =$id";
                if(mysqli_query($conn,$sql)){
                    echo "Deleted Date - Successful";
                }else{
                    echo "Unsuccessful";
                }
                echo "<br><button><a href=\"contactIndex.php\">Home</a></button>";
            }
            
        }
?>