DROP SCHEMA IF EXISTS c9;
CREATE SCHEMA c9;
USE c9;

CREATE TABLE Test (
address_id INT NOT NULL AUTO_INCREMENT,
address_street VARCHAR(100) NOT NULL,
address_street2 VARCHAR(100),
address_city VARCHAR(100) NOT NULL, /* Longest town name in Ireland is Bullaunancheathrairaluinn which is 25 char */
address_county VARCHAR(100) NOT NULL,
address_eircode VARCHAR(100), /* D01AB2C or D01 AB2C */
address_country VARCHAR(100),
address_geo_latitude FLOAT(10,6),
address_geo_longtitude FLOAT(10,6), /* Geo location to be used with Google Maps */
PRIMARY KEY (address_id)
);


CREATE TABLE Address (
address_id INT NOT NULL AUTO_INCREMENT,
address_street VARCHAR(100) NOT NULL,
address_street2 VARCHAR(100),
address_city VARCHAR(100) NOT NULL, /* Longest town name in Ireland is Bullaunancheathrairaluinn which is 25 char */
address_county VARCHAR(100) NOT NULL,
address_eircode VARCHAR(100), /* D01AB2C or D01 AB2C */
address_country VARCHAR(100),
address_geo_latitude FLOAT(10,6),
address_geo_longtitude FLOAT(10,6), /* Geo location to be used with Google Maps */
PRIMARY KEY (address_id)
);

CREATE TABLE Transport (
transport_id INT NOT NULL AUTO_INCREMENT,
transport_name VARCHAR(100) NOT NULL,
address_id INT NOT NULL, /* Transport company's main office address */
contact_first_name VARCHAR (100) NOT NULL,
contact_last_name VARCHAR (100),
contact_email VARCHAR(100),
contact_phone LONG NOT NULL,
PRIMARY KEY (transport_id),
FOREIGN KEY (address_id) REFERENCES Address (address_id)
);
 
CREATE TABLE Customer ( /* Customer can also be a Guest account, not both*/
customer_id INT NOT NULL AUTO_INCREMENT,
first_name VARCHAR(100) NOT NULL,
last_name VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
address_id INT NOT NULL,
has_account ENUM('false','true') NOT NULL,
password VARCHAR(100),
PRIMARY KEY (customer_id),
FOREIGN KEY (address_id) REFERENCES Address (address_id)
);

CREATE TABLE Business (
business_id INT NOT NULL AUTO_INCREMENT,
business_name VARCHAR(100) NOT NULL,
address_id INT NOT NULL,
rep_first_name VARCHAR(100) NOT NULL,
rep_last_name VARCHAR(100),
rep_email VARCHAR(100),
rep_phone LONG NOT NULL,
PRIMARY KEY (business_id),
FOREIGN KEY (address_id) REFERENCES Address (address_id)
);

CREATE TABLE Venue (
venue_id INT NOT NULL AUTO_INCREMENT,
venue_name VARCHAR(100),
address_id INT NOT NULL,
venue_contact_first_name VARCHAR(100),
venue_contact_last_name VARCHAR(100),
venue_phone LONG NOT NULL,
PRIMARY KEY (venue_id),
FOREIGN KEY (address_id) REFERENCES Address (address_id)
);

CREATE TABLE Event_Type ( /*This is required, so user can select from pre-assigned values and not just input any value */
event_type_id INT NOT NULL AUTO_INCREMENT, 
event_type_name VARCHAR(15) NOT NULL, /* Event, Medical, University */
PRIMARY KEY (event_type_id)
);

CREATE TABLE Event (
event_id INT NOT NULL AUTO_INCREMENT,
event_title VARCHAR(100) NOT NULL,
event_desc VARCHAR(400),
event_type_id INT NOT NULL,
venue_id INT NOT NULL,
event_time_hour INT(2) NOT NULL DEFAULT 00,
event_time_min INT(2) NOT NULL DEFAULT 00,
event_date DATE NOT NULL,
is_transport_provided ENUM('false','true') NOT NULL DEFAULT 'false', /* Default is FALSE */
transport_id INT, 
can_pay_cash ENUM('false','true') NOT NULL DEFAULT 'false', /* Default is FALSE. Business can select if the Customer can pay for Event at the Event */
price DECIMAL(4,2) NOT NULL,
business_id INT NOT NULL, /* This is to know which business added what event */
PRIMARY KEY (event_id),
FOREIGN KEY (event_type_id) REFERENCES Event_Type (event_type_id),
FOREIGN KEY (venue_id) REFERENCES Venue (venue_id),
FOREIGN KEY (business_id) REFERENCES Business (business_id),
FOREIGN KEY (transport_id) REFERENCES Transport (transport_id)
);

CREATE TABLE Vendor ( /* Payment processor */
vendor_id INT NOT NULL AUTO_INCREMENT,
vendor_name VARCHAR(100) NOT NULL,
address_id INT NOT NULL,
contact_first_name VARCHAR (100) NOT NULL,
contact_last_name VARCHAR (100),
contact_email VARCHAR(100),
contact_phone LONG NOT NULL,
PRIMARY KEY (vendor_id),
FOREIGN KEY (address_id) REFERENCES Address (address_id)
);

CREATE TABLE Transaction (
transaction_id INT NOT NULL AUTO_INCREMENT,
vendor_id INT NOT NULL,
amount DECIMAL(4,2) NOT NULL,
PRIMARY KEY (transaction_id),
FOREIGN KEY (vendor_id) REFERENCES Vendor (vendor_id)
);

CREATE TABLE Booking (
booking_id INT NOT NULL AUTO_INCREMENT,
customer_id INT NOT NULL,
event_id INT NOT NULL, /* Event has venue_id, address_id (in Venue), transport_id,  */
paying_through_vendor ENUM('false','true') NOT NULL DEFAULT 'true', /* Default is TRUE. If FALSE, Customer is paying cash at Event */
transaction_id INT, /* Can be null if Customer is paying Cash */
PRIMARY KEY (booking_id),
FOREIGN KEY (customer_id) REFERENCES Customer (customer_id),
FOREIGN KEY (event_id) REFERENCES Event (event_id),
FOREIGN KEY (transaction_id) REFERENCES Transaction (transaction_id)
);

CREATE TABLE Login (
login_id INT NOT NULL AUTO_INCREMENT,
login_date DATE NOT NULL,
customer_id INT DEFAULT 0,
business_id INT DEFAULT 0,
password1 VARCHAR(16) DEFAULT 'password',
password2 VARCHAR(16) DEFAULT 'password again',
password_encryption VARCHAR(20),
timestamp timestamp,
PRIMARY KEY (login_id, login_date),
FOREIGN KEY (customer_id) REFERENCES Customer (customer_id),
FOREIGN KEY (business_id) REFERENCES Business (business_id)
);

CREATE INDEX pw_enc ON Login(password_encryption);

CREATE TABLE Password_Encryption (
encryption_id INT NOT NULL AUTO_INCREMENT,
login_id INT NOT NULL,
password_encryption VARCHAR(100),
password_saved VARCHAR(16) NOT NULL,
is_valid ENUM('false','true') NOT NULL DEFAULT 'false',
timestamp timestamp,
/*KEY pw_enc (password_encryption),*/
PRIMARY KEY (encryption_id),
CONSTRAINT pw_enc FOREIGN KEY (password_encryption) REFERENCES Login (password_encryption)
);

CREATE TABLE User (
user_id INT NOT NULL AUTO_INCREMENT,
username VARCHAR(16) DEFAULT 'username',
password VARCHAR(16) DEFAULT 'password',
PRIMARY KEY (user_id)
);

INSERT INTO User (user_id, username, password) VALUES (1, 'paul', 123);

INSERT INTO Event_Type (event_type_id,event_type_name) VALUES (1,"Medical"),(2,"Event"),(3,"Education");

INSERT INTO Address (address_id, address_street, address_street2, address_city, address_county, address_eircode, address_country, address_geo_latitude, address_geo_longtitude)
VALUES
/* For Transport Companies */
(1, "(none)", NULL, "(none)", "(none)", NULL, NULL, NULL, NULL), /*Dublin Bus*/
(2, "59 O'Connell Street", "", "Dublin", "Dublin 1", "D01 RX04", "Ireland", NULL, NULL), /*Dublin Bus*/
(3, "King's Inns Street","", "Dublin", "Dublin 1", "D01 C9R3", "Ireland", NULL, NULL), /*Bus Eireann*/
(4, "Keatingspark", "", "Rathcoole", "Dublin 24", "D24 DP90", "Ireland", NULL, NULL), /* Dualway */
(5, "Unit 113 Grange Way", "Baldoyle Industrial Estate", "Baldoyle2", "Dublin 13", "D13 N7D0", "Ireland", NULL, NULL), /* Allied Coaches */
(6, "Collinstown Business Park", "Old Airport Road", "Cloghran", "Co. Dublin", "", "Ireland", NULL, NULL), /* Nolan Coaches */
(7, "Regus Harcourt", "Harcourt Road", "St Kevins",	"Dublin 2", "D02 KD58", "Ireland", NULL, NULL), /* Go-Ahead */
(8, "Corduff Road", "", "Blandardstown", "Dublin 15", "D15 R854", "Ireland", NULL, NULL), /* Budget Bus */

/* For Venues */
(9, "Spender Dock", "North Wall Quay", "North Wall", "Dublin 1", "D01 T1W6", "Ireland", NULL, NULL), /* Convention Centre*/
(10, "26 King's Inns Street","", "","Dublin 1", "D01 P2W7", "Ireland", NULL, NULL), /*The Chocolate Factory Arts Centre */
(11, "Lansdowne Road","","","Dublin 4", "D04 W2F3", "Ireland", NULL, NULL), /* Aviva Stadium */
(12, "25 Fitzwilliam Place","",	"Grand Canal Dock","Dublin 2", "D02 DP86", "Ireland", NULL, NULL), /* No 25 Fitzwillam Place */
(13, "6-7 Exchange Street Lower", "","Temple Bar", "Dublin 8", "D08 EH67","Ireland", NULL, NULL), /* Smock Alley Theatre */
(14, "Giffith College", "South Circular Road", "Merchants Quay", "Dublin 8", "D08 V04N", "Ireland", NULL, NULL), /* Griffith Conference Centre */
(15, "58-59 Vicar Street", "", "The Liberties", "Dublin 8", "D08 X0Y0", "Ireland", NULL, NULL), /* Vicar Street */
(16, "Military Road", "", "Kilmainham", "Dublin 8", "D08 FW31", "Ireland", NULL, NULL), /* Royal Hospital Kilmainham */
(17, "Jones's Road", "", "Dublin", "Dublin 3", "D03 P6K7", "Ireland", NULL, NULL), /* Croke Park */
(18, "25 Wexford Street", "", "Dublin", "Dublin 2", "D02 H527", "Ireland", NULL, NULL), /* Whelans */

/* For test business & customer account */
(19, "1 Business Test Street", "", "Dublin", "Dublin 2", "D01 ABCD", "Ireland", NULL, NULL), /* Business account */
(20, "1 Customer Test Street", "", "Dublin", "Dublin 24", "D99 9999", "Ireland", NULL, NULL); /* Customer Account*/

INSERT INTO Transport (transport_id,transport_name,address_id,contact_first_name,contact_last_name,contact_email,contact_phone)
VALUES 
(1, "(none)", 1, "(none)", NULL, NULL, "(none)"),
(2, "Dublin Bus", 2, "David","Guerra","litora.torquent.per@loremloremluctus.ca","056 5078 4263"),
(3, "Bus Eireann", 3,"Alec","Gilbert","urna@liberoProinsed.ca","055 3792 4160"),
(4, "Dualway,", 4, "Willow","Atkins","Phasellus.at.augue@mi.com","(01925) 94810"),
(5, "Allied Coaches", 5, "Nicole","Bray","neque@tempusrisusDonec.edu","(0101) 203 5910"),
(6, "Nolan Coaches", 6, "Kameko","York","ultrices.a.auctor@fermentum.org","0800 1111"),
(7, "Go-Ahead", 7, "Chava","Torres","mus@sed.co.uk","(022) 9962 6131"),
(8, "Budget Bus", 8, "Giselle", "Hickman", "lacus@estarcuac.edu", "0823 927 9745");

INSERT INTO Venue (venue_id,venue_name,address_id,venue_contact_first_name,venue_contact_last_name,venue_phone) 
VALUES 
(1,"The Convention Centre Dublin ",9,"Oscar","Fleming","0800 1111"),
(2,"The Chocolate Factory Arts Centre",10,"Carl","Berger","0848 086 9173"),
(3,"Aviva Stadium",11,"Yuli","Underwood","(0191) 151 5983"),
(4,"No 25 Fitzwilliam Place",12,"Robin","Martinez","0800 533 6482"),
(5,"Smock Alley Theatre, 1662",13,"Hillary","Blackburn","(023) 2473 6797"),
(6,"Griffith Conference Centre",14,"Catherine","Cash","(016977) 8323"),
(7,"Vicar Steet",15,"Aimee","Shepherd","07297 772268"),
(8,"Royal Hospital Kilmainham",16,"Jerome","Knowles","(016977) 3461"),
(9,"Croke Park",17,"Odysseus","Roberts","056 9052 8375"),
(10,"Whelans",18,"Reagan","Decker","0824 593 1886");

INSERT INTO Business (business_id, business_name, address_id, rep_first_name, rep_last_name, rep_email, rep_phone)
VALUES
(1, "Test Business", 19, "John", "Smith", "jsmith@testbusiness.com", "01 4123456");

INSERT INTO Customer (customer_id, first_name, last_name, email, address_id, has_account, password)
VALUES
(1, "Test", "Customer", "janedoe@testcustomer.com", 20, true, "1234");

INSERT INTO Event (event_id, event_title, event_desc, event_type_id, venue_id, event_time_hour, event_time_min, event_date, is_transport_provided, transport_id, can_pay_cash, price, business_id)
VALUES
(1, "Line_Dancing", "Suitable for all ages. Please consider health for this activity as it is physically demanding", 1, 5, 12, 00, "2017-12-18", "true", 1, "false", 10.00, 1),
(2, "Bingo", "Suitable for all ages. Visuals and Audios available.", 2, 4, 13, 15, "2017-12-19", "false", 1, "false", 5.50, 1),
(3, "Chess_Champion", "Enjoy chess? Love the thrill of competing? This is for you", 3, 3, 14, 30, "2017-12-20", "true", 1, "false", 25.00, 1),
(4, "Night_Out", "A meal in a hotel and dancing afterwards", 1, 2, 17, 45, "2017-12-21", "false", 1, "false", 60.00, 1),
(5, "Art_Class", "Art classes available locally", 2, 1, 21, 20, "2017-12-22", "false", 1, "false", 21.00, 1);

