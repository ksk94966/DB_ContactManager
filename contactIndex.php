<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<h4>Contact Details</h4>
<style>
    table, th, td {
  border: 1px solid black;
}
</style>

<body>
<input type="button" onclick="window.location='./addcontact.php'" class="Redirect" value="Add Contact"/>
<button><a href="contactIndex.php">Home</a></button>
<br>
<form action="contactIndex.php" method="GET">
        <label for="Search">Contact Search :
    <input type="text" id="Search" name="Search">
    </label>
    <button type="submit">Search</button>
</form>
<h3>Customers Table</h3>
<?php
session_start();

        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
        echo "Database connection failed";
        }
        else
        {
                $where = "";
                if(isset($_GET['Search']))
                {
                    $searchString = $_GET['Search'];
                    // $where = " WHERE fname like '%$searchString%' OR mname like '%$searchString%' OR lname like '%$searchString%'";
                    $where = "WHERE Fname LIKE '%$searchString%' OR Mname LIKE '%$searchString%' OR Lname LIKE '%$searchString%' OR Contact_id IN (SELECT Contact_id FROM Address WHERE Address LIKE '%$searchString%' OR City LIKE '%$searchString%' OR State LIKE '%$searchString%' OR Zip LIKE '%$searchString%') OR Contact_id IN(SELECT Contact_id FROM phone WHERE Area_code LIKE '%$searchString%' OR Number LIKE '%$searchString%') OR Contact_id IN(SELECT Contact_id FROM Date WHERE Date LIKE '%{$searchString}%')";
                    //echo $where;
                }
                $sql = "SELECT * FROM contact"." ".$where;
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<table class=\"table table-striped\"><tr><th>Id</th><th>Fullname</th><th>View</th></tr>";
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
        
                        echo "<tr><td>" . $row["Contact_id"]. "</td><td>" . $row["Fname"]. " " .$row["Mname"]." " .$row["Lname"]. "</td><td><button id=".$row["Contact_id"]."><a href=\"viewcontact.php?contactid=".$row['Contact_id']."\">View Details</a></button></td></tr>";
                    }
                }

                    
                session_destroy();

                
        }
?>
</body>
</html>