DROP SCHEMA IF EXISTS c9;
CREATE SCHEMA c9;
USE c9;

CREATE TABLE Address (
address_id INT NOT NULL AUTO_INCREMENT,
address_street VARCHAR(50) NOT NULL,
address_street2 VARCHAR(50),
address_city VARCHAR(30) NOT NULL, /* Longest town name in Ireland is Bullaunancheathrairaluinn which is 25 char */
address_county VARCHAR(20) NOT NULL,
address_eircode VARCHAR(10), /* D01AB2C or D01 AB2C */
address_country VARCHAR(50),
address_geo_latitude FLOAT(10,6),
address_geo_longtitude FLOAT(10,6), /* Geo location to be used with Google Maps */
PRIMARY KEY (address_id)
);

CREATE TABLE Transport (
transport_id INT NOT NULL AUTO_INCREMENT,
transport_name VARCHAR(50) NOT NULL,
address_id INT NOT NULL, /* Transport company's main office address */
contact_first_name VARCHAR (20) NOT NULL,
contact_last_name VARCHAR (20),
contact_email VARCHAR(50),
contact_phone LONG NOT NULL,
PRIMARY KEY (transport_id),
FOREIGN KEY (address_id) REFERENCES Address (address_id)
);
 
CREATE TABLE Customer ( /* Customer can also be a Guest account, not both*/
customer_id INT NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(20) NOT NULL,
email VARCHAR(75) NOT NULL,
address_id INT NOT NULL,
has_account ENUM('false','true') NOT NULL,
PRIMARY KEY (customer_id),
FOREIGN KEY (address_id) REFERENCES Address (address_id)
);

CREATE TABLE Business (
business_id INT NOT NULL AUTO_INCREMENT,
business_name VARCHAR(50) NOT NULL,
address_id INT NOT NULL,
rep_first_name VARCHAR(20) NOT NULL,
rep_last_name VARCHAR(20),
rep_email VARCHAR(50),
rep_phone LONG NOT NULL,
PRIMARY KEY (business_id),
FOREIGN KEY (address_id) REFERENCES Address (address_id)
);

CREATE TABLE Venue (
venue_id INT NOT NULL AUTO_INCREMENT,
venue_name VARCHAR(40),
address_id INT NOT NULL,
venue_contact_first_name VARCHAR(20),
venue_contact_last_name VARCHAR(20),
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
event_type_id INT NOT NULL,
venue_id INT NOT NULL,
event_time_hour INT(2) NOT NULL DEFAULT 00,
event_time_min INT(2) NOT NULL DEFAULT 00,
event_date DATE NOT NULL,
is_transport_provided ENUM('false','true') NOT NULL DEFAULT 'false', /* Default is FALSE */
transport_id INT, 
can_pay_cash ENUM('false','true') NOT NULL DEFAULT 'false', /* Default is FALSE. Business can select if the Customer can pay for Event at the Event */
business_id INT NOT NULL, /* This is to know which business added what event */
PRIMARY KEY (event_id),
FOREIGN KEY (event_type_id) REFERENCES Event_Type (event_type_id),
FOREIGN KEY (venue_id) REFERENCES Venue (venue_id),
FOREIGN KEY (business_id) REFERENCES Business (business_id),
FOREIGN KEY (transport_id) REFERENCES Transport (transport_id)
);

CREATE TABLE Vendor ( /* Payment processor */
vendor_id INT NOT NULL AUTO_INCREMENT,
vendor_name VARCHAR(50) NOT NULL,
address_id INT NOT NULL,
contact_first_name VARCHAR (50) NOT NULL,
contact_last_name VARCHAR (50),
contact_email VARCHAR(50),
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
password_encryption VARCHAR(20),
password_saved VARCHAR(16) NOT NULL,
is_valid ENUM('false','true') NOT NULL DEFAULT 'false',
timestamp timestamp,
/*KEY pw_enc (password_encryption),*/
PRIMARY KEY (encryption_id),
CONSTRAINT pw_enc FOREIGN KEY (password_encryption) REFERENCES Login (password_encryption)
);




 
