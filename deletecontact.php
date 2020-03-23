<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<?php
session_start();

        $id = $_GET['id'];
        $type = $_GET['type'];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        $result ="";

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            if($type=="contact")
            {

                $sql = "DELETE FROM contact WHERE Contact_id =$id";
                if(mysqli_query($conn,$sql)){
                    echo "Deleted Contact - Successful";
                }else{
                    echo "Unsuccessful";
                }
                echo "<br><button><a href=\"contactIndex.php\">Index Home</a></button>";
            }
            else if($type=="address")
            {
                $sql1 = "SELECT Contact_id FROM address WHERE Address_id =$id";
                $result1 = mysqli_query($conn,$sql1);
                $result = mysqli_fetch_array($result1);
                $sql = "DELETE FROM address WHERE Address_id =$id";
                if(mysqli_query($conn,$sql)){
                    echo "Deleted Address - Successful";
                }else{
                    echo "Unsuccessful";
                }

                echo "<br><button><a href=\"contactIndex.php\">Index Home</a></button>";
                
            }
            else if($type=="phone")
            {
                $sql1 = "SELECT Contact_id FROM phone WHERE Phone_id =$id";
                $result1 = mysqli_query($conn,$sql1);
                $result = mysqli_fetch_array($result1);
                $sql = "DELETE FROM phone WHERE Phone_id =$id";
                if(mysqli_query($conn,$sql)){
                    echo "Deleted Phone details - Successful";
                }else{
                    echo "Unsuccessful";
                }

                
                
                echo "<br><button><a href=\"contactIndex.php\">Index Home</a></button>";
            }
            else if($type=="date")
            {
                $sql1 = "SELECT Contact_id FROM date WHERE date_id =$id";
                $result1 = mysqli_query($conn,$sql1);
                $result = mysqli_fetch_array($result1);
                $sql = "DELETE FROM date WHERE date_id =$id";
                if(mysqli_query($conn,$sql)){
                    echo "Deleted Date - Successful";
                }else{
                    echo "Unsuccessful";
                }
                
                
                echo "<br><button><a href=\"contactIndex.php\">Index Home</a></button>";
            }
            
        }

        if($type=="contact")
        {
            header('location: contactIndex.php');
        }
        else
        {
            header('location: viewcontact.php?contactid='.$result['Contact_id']);
        }
        
        session_destroy();
?>
    
</body>    
</html>