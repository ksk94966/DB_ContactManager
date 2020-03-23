<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<?php
session_start();

        $id = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            $sql = "SELECT * FROM contact WHERE Contact_id =$id";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Customer Name:</h3>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    // echo "hi";
                    echo '<div class="form-group" id="namerow">
                    <form class="form-horizontal" action="updatecontact.php" method="GET">
                        <div>
                            <input type="hidden" name="type" value="name">
                                <input type="hidden" name="id" value="'.$id.'">
                            <label for="Fname">First name:</label>
                                <input type="text" id="Fname" name="Fname" value="'.$row["Fname"].'">
                            <label for="Mname">Middle name:</label>
                                <input type="text" id="Mname" name="Mname" value="'.$row["Mname"].'">
                            <label for="Lname">Last name:</label>
                                <input type="text" id="Lname" name="Lname" value="'.$row["Lname"].'">
                        </div>
                        <input type="submit" value="Update"><button><a href="contactIndex.php">Home</a></button>
                    </form>
                    </div>';
                }
            }
        }
?>
</body>
</html>