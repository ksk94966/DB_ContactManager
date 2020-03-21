<html>
<head></head>
<h4>Customer Names</h4>
<style>
    table, th, td {
  border: 1px solid black;
}
</style>
<?php
session_start();
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {
            //echo "connection successfull";
            $sql = "SELECT Contact_id,Fname,Lname FROM contact";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table><tr><th>Id</th><th>Fullname</th></tr>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["Contact_id"]. "</td><td>" . $row["Fname"]. " " .$row["Lname"]. "</td><td><button id=".$row["Contact_id"].">View Details</button></td></tr>";
                }
            }   
        }

        //,CONCAT(Fname, ' ', Lname) AS Fullname,
       
        session_destroy();
?>
</html>