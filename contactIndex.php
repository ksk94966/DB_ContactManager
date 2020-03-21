<html>
<head></head>
<h4>Contact Details</h4>
<style>
    table, th, td {
  border: 1px solid black;
}
</style>

<body>
<input type="button" onclick="window.location='./addcontact.php'" class="Redirect" value="Add Contact"/>
<h3>Customers Table</h3>
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
                    echo "<tr><td>" . $row["Contact_id"]. "</td><td>" . $row["Fname"]. " " .$row["Lname"]. "</td><td><button id=".$row["Contact_id"]."><a href=\"viewcontact.php\">View Details</a></button></td></tr>";
                }
            }   
        }

        //,CONCAT(Fname, ' ', Lname) AS Fullname,
       
        session_destroy();
?>
</body>
</html>