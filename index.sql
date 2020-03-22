
create table contact(
    Contact_id int(10) auto_increment primary key,
    Fname varchar(50) not null,
    Mname varchar(50),
    Lname varchar(50) not null);

create table ADDRESS(
    Address_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Contact_id INT(10),
    Address_type VARCHAR(50) NOT NULL,
    Address VARCHAR(350) NOT NULL,
    City VARCHAR(50) NOT NULL,
    State VARCHAR(50) NOT NULL,
    Zip VARCHAR(15) NOT NULL,
    FOREIGN KEY(Contact_id) REFERENCES contact(Contact_id)
    ON DELETE CASCADE);

create table Phone(
    Phone_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Contact_id INT(10),
    Phone_type varchar(20) not null,
    Area_code VARCHAR(20),
    Number varchar(20) not null,
    FOREIGN KEY(Contact_id) REFERENCES contact(Contact_id)
    on delete cascade
);

create table Date(
    date_id int(10) auto_increment PRIMARY key,
    Contact_id INT(10),
    Date_type VARCHAR(15),
    date DATE,
    FOREIGN KEY(Contact_id) REFERENCES contact(Contact_id)
    on delete cascade
);
    

Drop table Date;

Drop table phone;

Drop table Address;

Drop table contact;