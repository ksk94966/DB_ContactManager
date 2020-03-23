<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h1>Contact Addition Form &nbsp&nbsp<button><a href="contactIndex.php">Index Home</a></button></h1> 
</head>
<body>
<form class="form-horizontal" action="addcontactdetails.php" method="GET">
    <div>
        <h3>Customer Name:</h3> 
        <label for="Fname">First name:</label>
            <input type="text" id="Fname" name="Fname">
        <label for="Mname">Middle name:</label>
            <input type="text" id="Mname" name="Mname">
        <label for="Lname">Last name:</label>
            <input type="text" id="Lname" name="Lname">
        <p hidden id='nameid'></p>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>