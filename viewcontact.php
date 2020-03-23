<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<h4>View Contact Page<button><a href="contactIndex.php">Home</a></button></h4>
<style>
    table, th, td {
  border: 1px solid black;
}
</style>

<?php
session_start();

        $id = $_GET['contactid'];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {
            //echo "connection successfull";
            $sql = "SELECT * FROM contact WHERE Contact_id =$id";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Contact Name:</h3>";
                echo "<table class=\"table table-striped\"><tr><th>Id</th><th>Fullname</th><th>Action</th><th>Action</th></tr>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["Contact_id"]. "</td><td>" . $row["Fname"]. " ".$row["Mname"]. " " .$row["Lname"]. "</td><td><button><a href=\"modifycontact.php?id=".$row['Contact_id']."\">Modify</a></button></td><td><button><a href=\"deletecontact.php?id=".$row['Contact_id']."&type=contact\">Delete</a></button></td></tr>";
                }

                echo "</table>";
            }  
            
            
            $sql = "SELECT * FROM address WHERE Contact_id =$id";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Address List:</h3>";
                echo "<table class=\"table table-striped\"><tr><th>Address_Id</th><th>Contact_id</th><th>Address_type</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Action</th><th>Action</th></tr>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["Address_id"]. "</td><td>" . $row["Contact_id"]. "</td><td> ".$row["Address_type"]. "</td><td> " .$row["Address"]. "</td><td> " .$row["City"]."</td><td>" .$row["State"]. "</td><td>" .$row["Zip"]."</td><td><button><a href=\"modifyaddress.php?id=".$row['Address_id']."\">Modify</a></button></td><td><button><a href=\"deletecontact.php?id=".$row['Address_id']."&type=address\">Delete</a></button></td></tr>";
                }

                echo "</table>";
            }


            $sql = "SELECT * FROM phone WHERE Contact_id =$id";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Phone List:</h3>";
                echo "<table class=\"table table-striped\"><tr><th>Phone_id</th><th>Contact_id</th><th>Phone_type</th><th>Area_code</th><th>Ph-Number</th><th>Action</th><th>Action</th></tr>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["Phone_id"]. "</td><td>" . $row["Contact_id"]. "</td><td> ".$row["Phone_type"]. "</td><td> " .$row["Area_code"]. "</td><td> " .$row["Number"]."</td><td><button><a href=\"modifyphone.php?id=".$row['Phone_id']."\">Modify</a></button></td><td><button><a href=\"deletecontact.php?id=".$row['Phone_id']."&type=phone\">Delete</a></button></td></tr>";
                }

                echo "</table>";
            }

            $sql = "SELECT * FROM date WHERE Contact_id =$id";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Date List:</h3>";
                echo "<table class=\"table table-striped\"><tr><th>Date_id</th><th>Contact_id</th><th>Date_type</th><th>Date</th><th>Action</th><th>Action</th></tr>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["date_id"]. "</td><td>" . $row["Contact_id"]. "</td><td> ".$row["Date_type"]. "</td><td> " .$row["date"]. "</td><td><button><a href=\"modifydate.php?id=".$row['date_id']."\">Modify</a></button></td><td><button><a href=\"deletecontact.php?id=".$row['date_id']."&type=date\">Delete</a></button></td></tr>";
                }

                echo "</table>";
            }
        }

        //,CONCAT(Fname, ' ', Lname) AS Fullname,
       
        session_destroy();
?>
</html>