create database CA;

use CA;

create table Users(
id int primary key auto_increment,
email varchar(255),
password varchar(255)
);

insert into Users(email, password) values ('rinesamala@ca.com','rinesamala'),
('elsaahmeti@ca.com','elsaahmeti');


CREATE TABLE `application` (
  `id` int(30) NOT NULL auto_increment primary key,
  `emri` varchar(50) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `numri_telefonit` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mosha` int(11) NOT NULL,
  `gjinia` enum('femer','mashkull') NOT NULL,
  `trajnimii` enum('frontend development','backend development') NOT NULL,
  `grupi` enum('Grupi 1','Grupi 2','Grupi 3','Grupi 4','Grupi 5','Grupi 6') NOT NULL,
  `oraret` enum('Fizikisht','Online') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `application` (`emri`, `mbiemri`, `numri_telefonit`, `email`, `mosha`, `gjinia`, `trajnimii`, `grupi`, `oraret`) VALUES
( 'Verona', 'Zeqiri', '044877869', 'veronazeq@gmail.com', 18, 'femer', 'frontend development', 'Grupi 3', 'Fizikisht'),
( 'Verona', 'Zeqiri', '045333333', 'verona.zeqiri@student.uni-pr.edu', 20, 'femer', 'frontend development', 'Grupi 3', 'Online'),
( 'Blerona', 'Mala', '045333333', 'blerona@gmail.com', 18, 'femer', 'backend development', 'Grupi 1', 'Fizikisht'),
( 'Irida', 'Jashanica', '045111111', 'irida.jashanica@gmail.com', 20, 'femer', 'backend development', 'Grupi 6', 'Fizikisht');

