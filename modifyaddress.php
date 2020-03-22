<html>
<body>
<?php
session_start();

        $id = $_GET['id'];
        //echo $id;
        //$type = $_GET['type'];
        //echo $type;
        $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

        if(!$conn){     
            echo "Database connection failed";
        }
        else
        {   
            $sql = "SELECT * FROM address WHERE Address_id =$id";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Address Details:</h3>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    // echo "hi";
                echo '<div id= "addressform">
                    <form class="form-horizontal" action="updatecontact.php" method="GET">
                    <div>
                    <input type="hidden" name="type" value="address">
                    <input type="hidden" name="id" value="'.$id.'">
                    <label for="Addresstype">Address Type:</label>
                    <input type="text" id="Addresstype" name="Addresstype" value="'.$row["Address_type"].'">
                    <label for="Address">Street Adress:</label>
                        <input type="text" id="Address" name="Address" value="'.$row["Address"].'">
                    <label for="City">City:</label>
                        <input type="text" id="City" name="City" value="'.$row["City"].'">
                    <label for="State">State:</label>
                        <input type="text" id="State" name="State" value="'.$row["State"].'">
                    <label for="Zip">Zip:</label>
                        <input type="text" id="Zip" name="Zip" value="'.$row["Zip"].'">
            </div>
            <input type="submit"><button><a href="contactIndex.php">Home</a></button>
        </form>
        </div>';
                }
            }
        }
?>
</body>
</html>