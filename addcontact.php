<html>
<head>
Adding Contact Details
</head>
<body>
<script>
    function addAddress(){
        var div1 = document.createElement('div');

        div1.innerHTML = document.getElementById('addressform').innerHTML;

        document.getElementById('addressrow').appendChild(div1);
    };

    function addPhone(){
        var div2 = document.createElement('div');

        div2.innerHTML = document.getElementById('Phoneform').innerHTML;

        document.getElementById('Phonerow').appendChild(div2);
    };

    function addDate(){
        var div3 = document.createElement('div');

        div3.innerHTML = document.getElementById('Dateform').innerHTML;

        document.getElementById('Daterow').appendChild(div3);
    };
</script>
<form action="addcontact.php" method="get">
    <div class="row">
        <h3>Customer Name:</h3>
        <label for="Fname">First name:</label>
            <input type="text" id="Fname" name="Fname">
        <label for="Mname">Middle name:</label>
            <input type="text" id="Mname" name="Mname">
        <label for="Lname">Last name:</label>
            <input type="text" id="Lname" name="Lname">
    </div>
    <div id='addressrow'>
        <h3>Address List:<button onclick='addAddress();return false;'>Add</button></h3>
        <div id="addressform">
            <label for="Addresstype">Address Type:</label>
            <select name="Addresstype">
                    <option value="Home">Home</option>
                    <option value="Work">Work</option>
                    <option value="Other">Other</option>
            </select>
            <label for="Address">Street Adress:</label>
                <input type="text" id="Address" name="Address">
            <label for="City">City:</label>
                <input type="text" id="City" name="City">
            <label for="State">State:</label>
                <input type="text" id="State" name="State">
            <label for="Zip">Zip:</label>
                <input type="text" id="Zip" name="Zip">
        </div>
    </div>
    <div id="Phonerow">
    <h3>Phone Number List:<button onclick='addPhone();return false;'>Add</button></h3>
    <div id="Phoneform">    
    <label for="Phonetype">Phone Type:</label>
            <select name="Phonetype">
                    <option value="Home">Home</option>
                    <option value="Work">Work</option>
                    <option value="Fax">Fax</option>
                    <option value="Other">Other</option>
            </select>
        <label for="AreaCode">Area Code:</label>
            <input type="text" id="AreaCode" name="AreaCode">
        <label for="Number">Number:</label>
            <input type="text" id="Number" name="Number">
    </div>
    </div>
    <div id="Daterow">
    <h3>Date:<button onclick='addDate();return false;'>Add</button></h3>
    <div id="Dateform">    
    <label for="Datetype">Date Type:</label>
            <select name="Datetype">
                    <option value="Birthday">Birthday</option>
                    <option value="Anniversary">Anniversary</option>
                    <option value="Other">Other</option>
            </select>
        <label for="date">Date(YYYY-MM-DD):</label>
            <input type="text" id="date" name="date">
    </div>
    </div>
</form>
</div>
</body>
</html>