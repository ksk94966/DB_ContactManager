<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h1>Contact Addition Form &nbsp&nbsp<button><a href="contactIndex.php">Home</a></button></h1> 
</head>
<body>
<script>
    function ajaxCallname(){
            var Fnamescript = document.getElementById("Fname").value;
            var Mnamescript = document.getElementById("Mname").value;
            var Lnamescript = document.getElementById("Lname").value;
            var queryString = "name" + ":" + Fnamescript + ":" + Mnamescript +":"+Lnamescript;
            //console.log(queryString)
            var ajaxreq;
            if (window.XMLHttpRequest) {
                ajaxreq=new XMLHttpRequest();
            }
            ajaxreq.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById('nameid').innerHTML = ajaxreq.responseText;
                    //console.log(ajaxreq.responseText)
                    alert("Name added");
                }
            }
            ajaxreq.open("GET","Addsuccess.php?q="+queryString, true);
            ajaxreq.send();
        }

        function ajaxCallAddress(formref){
            var Contactidscript = document.getElementById("nameid").innerHTML;
            console.log(Contactidscript);
            var Addresstypescript = formref.elements.Addresstype.value;
            var Addressscript = formref.elements.Address.value;
            var Cityscript =formref.elements.City.value;
            var Statescript =formref.elements.State.value;
            var Zipscript = formref.elements.Zip.value;
            var queryString = "address" + ":" + Contactidscript+":"+Addresstypescript + ":" + Addressscript +":"+Cityscript+":"+Statescript+":"+Zipscript;
            //console.log(queryString)
            var ajaxreq;
            if (window.XMLHttpRequest) {
                ajaxreq=new XMLHttpRequest();
            }
            ajaxreq.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    console.log(ajaxreq.responseText);
                    alert("Address added");
                }
            }
            ajaxreq.open("GET","Addsuccess.php?q="+queryString, true);
            ajaxreq.send();
            //console.log(kp)

        }

        function ajaxCallPhone(formref){
            var Contactidscript = document.getElementById("nameid").innerHTML;
            var Phonetypecript = formref.elements.Phonetype.value;
            var AreaCodescript = formref.elements.AreaCode.value;
            var Numberscript = formref.elements.Number.value;
            var queryString = "phone" + ":" + Contactidscript+":"+ Phonetypecript + ":" + AreaCodescript +":"+ Numberscript;
            //console.log(queryString)
            var ajaxreq;
            if (window.XMLHttpRequest) {
                ajaxreq=new XMLHttpRequest();
            }
            ajaxreq.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    //console.log(ajaxreq.responseText)
                    alert("Phone details added");
                }
            }
            ajaxreq.open("GET","Addsuccess.php?q="+queryString, true);
            ajaxreq.send();
        }

        function ajaxCallDate(formref){
            var Contactidscript = document.getElementById("nameid").innerHTML;
            var Datetypecript = formref.elements.Datetype.value;
            var datescript = formref.elements.date.value;
            var queryString = "date" + ":" + Contactidscript + ":" + Datetypecript +":"+datescript;
            console.log(queryString)
            var ajaxreq;
            if (window.XMLHttpRequest) {
                ajaxreq=new XMLHttpRequest();
            }
            ajaxreq.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    //console.log(ajaxreq.responseText)
                    alert("Date added");
                }
            }   
            ajaxreq.open("GET","Addsuccess.php?q="+queryString, true);
            ajaxreq.send();
        }
    
    function addAddress(){
        var div1 = document.createElement('div');

        div1.innerHTML = document.getElementById('addressform').innerHTML;

        document.getElementById('addressrow').appendChild(div1);
    };


    function addPhone(){
        var div2 = document.createElement('div');

        div2.innerHTML = document.getElementById('phoneform').innerHTML;

        document.getElementById('Phonerow').appendChild(div2);
    };

    function addDate(){
        var div3 = document.createElement('div');

        div3.innerHTML = document.getElementById('Dateform').innerHTML;

        document.getElementById('Daterow').appendChild(div3);
    };

    function ajaxCallDelete(formref)
    {
        //var f = document.getElementById(formref);
        formref.parentNode.removeChild(formref);
    };
</script>
<div class="form-group" id='namerow'>
<form class="form-horizontal">
    <div>
        <h3>Customer Name:</h3> 
        <label for="Fname">First name:</label>
            <input type="text" id="Fname" name="Fname">
        <label for="Mname">Middle name:</label>
            <input type="text" id="Mname" name="Mname">
        <label for="Lname">Last name:</label>
            <input type="text" id="Lname" name="Lname">
            (Save this form first)
        <p hidden id='nameid'></p>
    </div>
    <input type="button" onclick="ajaxCallname()" value= "Save">
</form>
</div>
<div class="form-group" id='addressrow'>
<h5>Address List:<button onclick='addAddress();return false;'>Add form</button></h5>
<div id= "addressform">
<form class="form-horizontal">    
        <div>
            <label for="Addresstype">Address Type:</label>
                <input type="text" id="Addresstype" name="Addresstype">
            <label for="Address">Street Adress:</label>
                <input type="text" id="Address" name="Address">
            <label for="City">City:</label>
                <input type="text" id="City" name="City">
            <label for="State">State:</label>
                <input type="text" id="State" name="State">
            <label for="Zip">Zip:</label>
                <input type="text" id="Zip" name="Zip">
        </div>
    <input type="button" onclick="ajaxCallAddress(this.form)" value= "Save">
    <input type="button" onclick="ajaxCallDelete(this.form)" value= "Delete-form">
</form>
</div>
</div>
<div class="form-group" id="Phonerow">
<h5>Phone Number List:<button onclick='addPhone();return false;'>Add form</button></h5>
<div id= "phoneform">
    <form class="form-horizontal" > 
        <div>    
            <label for="Phonetype">Phone Type:</label>
                <input type="text" id="Phonetype" name="Phonetype">
            <label for="AreaCode">Area Code:</label>
                <input type="text" id="AreaCode" name="AreaCode">
            <label for="Number">Number:</label>
                <input type="text" id="Number" name="Number">
        </div>
    <input type="button" onclick="ajaxCallPhone(this.form)" value= "Save">
    <input type="button" onclick="ajaxCallDelete(this.form)" value= "Delete-form">
    </form>
    </div>
</div>
<div class="form-group" id="Daterow">
    <h5>Date:<button onclick='addDate();return false;'>Add form</button></h5>
    <div id= "Dateform">
        <form class="form-horizontal">    
            <div>
                <label for="Datetype">Date Type:</label>
                    <input type="text" id="Datetype" name="Datetype">
                <label for="date">Date(YYYY-MM-DD):</label>
                    <input type="text" id="date" name="date">
            </div>
        <input type="button" onclick="ajaxCallDate(this.form)" value= "Save">
        <input type="button" onclick="ajaxCallDelete(this.form)" value= "Delete-form">
    </form>
    </div>
</div>
<button onclick="location.reload();">Submit and Refresh</button>
</body>
</html>