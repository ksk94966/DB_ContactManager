<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            $sql = "SELECT * FROM phone WHERE Phone_id =$id";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    // echo "hi";
                echo '<div id= "phoneform">
                <form class="form-horizontal" action="updatecontact.php" method="GET"> 
                    <div>
                    <h3>Phone Deatils:</h3>
                    <input type="hidden" name="type" value="phone">
                    <input type="hidden" name="id" value="'.$id.'">    
                    <label for="Phonetype">Phone Type:</label>
                    <input type="text" id="Phonetype" name="Phonetype" value="'.$row["Phone_type"].'">
                    <label for="AreaCode">Area Code:</label>
                    <input type="text" id="AreaCode" name="AreaCode" value="'.$row["Area_code"].'">
                    <label for="Number">Number:</label>
                    <input type="text" id="Number" name="Number" value="'.$row["Number"].'">
                    </div>          
                    <input type="submit" value="Update">&nbsp&nbsp<button><a href="contactIndex.php">Home</a></button>
                </form>
                </div>';
                }
            }
        }
?>
</body>
</html>