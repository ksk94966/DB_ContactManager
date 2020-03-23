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
            $sql = "SELECT * FROM date WHERE date_id =$id";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    // echo "hi";
                echo '<div id= "Dateform">
                <form class="form-horizontal" action="updatecontact.php" method="GET">    
                    <div>
                    <h3>Date Details:</h3>
                    <input type="hidden" name="type" value="date">
                    <input type="hidden" name="id" value="'.$id.'">
                        <label for="Datetype">Date Type:</label>
                            <input type="text" id="Datetype" name="Datetype" value="'.$row["Date_type"].'">
                        <label for="date">Date(YYYY-MM-DD):</label>
                            <input type="text" id="date" name="date" value="'.$row["date"].'">
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