drop database if exists  GD223Passport;
create schema GD223Passport;
use GD223Passport;


CREATE TABLE `admincredentials` (
  `username` varchar(200) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admincredentials` (`username`, `password`) VALUES
('admin', '0000');

create table register
(
id int PRIMARY KEY auto_increment,
fname varchar(20) not null,
lastname varchar(20) not null,
email varchar(40) not null,
psword varchar(20) not null,
psword_repeat varchar(20) not null
);




create table Applicant
	(
    Applicant_ID int auto_increment,
    Title enum("Mr", "Mrs", "Ms") not null,
    fname varchar(20) not null,
    lname varchar(20) not null,
    other_name varchar (35),
    gender enum ("M","F"),
    dob date not null,
    town_of_birth varchar(35) not null,
    country char(25) not null,
    height_metres decimal(3,2),
    eye_colour char (15),
    hair_colour char(10),
    nationality char(30)not null,
    marital_status enum ("Married","Divorced","Single","Widower"),
    profession varchar(30),
    telephone varchar(20),
    email varchar(40),
    birth_certificate_number int not null unique,
    date_of_issue date,
    place_of_issue varchar(35),
    PRIMARY KEY (Applicant_ID)
    );
    
    

create table Appointment
(
Applicant_ID int,
Applicant_fullname varchar(40),
Application_type enum ("Standard", "Expedited"),
Application_date date,
Appointment_date date,
form enum ("In-person", "Virtual"),
PAC enum ("Kumasi PAC", "Accra PAC", "Ho PAC", "Koforidua PAC", "Takoradi PAC", "Tamale PAC", "Sunyani PAC", "Cape Coast PAC", "Wa PAC"),
Witness_name varchar(40),
Witness_contact varchar(20),
FOREIGN KEY (Applicant_ID) REFERENCES Applicant(Applicant_ID)
);
 
create index Applicant_Applicant_ID_idx
on Applicant (Applicant_ID, fname, lname, other_name);

create index Appointment_idx
on Appointment (Application_type, Appointment_date, form, PAC);