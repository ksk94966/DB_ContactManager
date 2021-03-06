<?php


session_start();

    $conn = mysqli_connect("localhost", "root", "root", "contactmanager");

    if(!$conn){     
    echo "Database connection failed";
    }
    else
    {
        $row = 1;
        if (($handle = fopen("Contacts.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($row==1)
                {
                    $row++;
                    continue;
                }
                $row++;
                $fname = $data[1];
                //echo $fname;
                $mname = $data[2];
                $lname = $data[3];
                //echo $lname;
                $home_phone = substr($data[4],4);
                //echo $home_phone;
                $home_areacode = substr($data[4],0,3);
                //echo $home_areacode;
                $cell_phone = substr($data[5],4);
                //echo $cell_phone;
                $cell_areacode = substr($data[5],0,3);
                $home_address = trim($data[6]);
                $home_city = $data[7];
                $home_state = $data[8];
                $home_zip = $data[9];
                $work_phone = $data[10];
                $work_address = trim($data[11]);
                $work_city = $data[12];
                $work_state = $data[13];
                $work_zip = $data[14];
                $birth_date = $data[15];

                $varhome = 'home';

                $varwork = 'work';

                $varbday = 'birthday';

                //Inserting into contact table
                $stmt = $conn->prepare("INSERT INTO contact (Fname, Mname, Lname) VALUES (?, ?, ?)");
                $stmt->bind_param("sss",$fname, $mname, $lname);
                $stmt->execute();
                $prikey = $conn->insert_id;
                //echo $prikey;

                //Inserting into Address table
        
                $stmt1 = $conn->prepare("INSERT INTO address (Contact_id,Address_type,Address, City,State,Zip) VALUES (?,?, ?, ?,?,?)");
                $stmt1->bind_param("isssss",$prikey,$varhome, $home_address, $home_city,$home_state,$home_zip);
                $stmt1->execute();

                $stmt2 = $conn->prepare("INSERT INTO address (Contact_id,Address_type,Address, City,State,Zip) VALUES (?,?, ?, ?,?,?)");
                $stmt2->bind_param("isssss",$prikey,$varwork, $work_address, $work_city,$work_state,$work_zip);
                $stmt2->execute();

                //Inserting into phone table

                $stmt3 = $conn->prepare("INSERT INTO phone (Contact_id,Phone_type, Area_code, Number) VALUES (?,?, ?, ?)");
                $stmt3->bind_param("isss",$prikey,$varhome, $home_areacode, $home_phone);
                $stmt3->execute();

                $stmt4 = $conn->prepare("INSERT INTO phone (Contact_id,Phone_type, Area_code, Number) VALUES (?,?, ?, ?)");
                $stmt4->bind_param("isss",$prikey,$varwork, $cell_areacode, $cell_phone);
                $stmt4->execute();

                // //Insering into date table

                $stmt5 = $conn->prepare("INSERT INTO date (Contact_id,Date_type, date) VALUES (?,?,?)");
                $stmt5->bind_param("iss",$prikey,$varbday, $birth_date);
                $stmt5->execute();
                    
            }
            fclose($handle);
        }
    } 
        //echo "Succesfully Upload csv file"; 

        header('location: contactIndex.php');

        session_destroy();

?>