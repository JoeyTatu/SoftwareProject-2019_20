DROP SCHEMA IF EXISTS c9;
CREATE SCHEMA IF NOT EXISTS c9;
USE c9;

-- CREATE TABLE Artist(
--     artist_id INT NOT NULL AUTO_INCREMENT,
--     artist_email VARCHAR(255), /* encrypted */
--     artist_password VARCHAR(255), /* encrypted */
--     artist_type ENUM("Tattooist","Piercer","Body modifier","Other"),
--     last_login DATETIME,
--     PRIMARY KEY (artist_id)
-- );

-- CREATE TABLE Client(
--     client_id INT NOT NULL AUTO_INCREMENT,
--     client_email VARCHAR(255), /* encrypted */
--     client_password VARCHAR(255), /* encrypted */
--     last_login DATETIME,
--     PRIMARY KEY (client_id)
-- );

-- CREATE TABLE Parlour( /* tattoo parlour/shop, etc.) */
--     parlour_id INT NOT NULL AUTO_INCREMENT,
--     artist_id INT,
--     address VARCHAR(50),
--     address2 VARCHAR(50),
--     city VARCHAR(50),
--     postal_code VARCHAR(10),
--     country VARCHAR(20),
--     PRIMARY KEY (parlour_id),
--     FOREIGN KEY (artist_id) REFERENCES Artist(artist_id)
-- );

-- CREATE TABLE Profile(
--     profile_id INT NOT NULL AUTO_INCREMENT,
--     prefix ENUM("Mr","Ms","Mrs","Dr","Fr","Mx"),
--     fist_name VARCHAR(50),
--     last_name VARCHAR(50),
--     date_of_birth DATE,
--     location VARCHAR(50),
--     bio VARCHAR(255),
--     interested_in ENUM("Tattoos","Piercings","Body mods"),
--     profile_pic BLOB,
--     artist_id INT,
--     client_id INT,
--     PRIMARY KEY (profile_id),
--     FOREIGN KEY (artist_id) REFERENCES Artist(artist_id),
--     FOREIGN KEY (client_id) REFERENCES Client(client_id)
-- );

-- CREATE TABLE Messaging(
--     message_id INT NOT NULL AUTO_INCREMENT,
--     external_ref VARCHAR(255),
--     session_key VARCHAR(255),
--     artist_id INT,
--     client_id INT,
--     PRIMARY KEY (message_id),
--     FOREIGN KEY (artist_id) REFERENCES Artist(artist_id),
--     FOREIGN KEY (client_id) REFERENCES Client(client_id)
-- );

-- CREATE TABLE Preference(
--     preference_id INT NOT NULL AUTO_INCREMENT,
--     artist_id INT,
--     size1_desc VARCHAR(255),
--     size1_pic BLOB,
--     size1_price FLOAT,
--     size2_desc VARCHAR(255),
--     size2_pic BLOB,
--     size2_price FLOAT,
--     size3_desc VARCHAR(255),
--     size3_pic BLOB,
--     size3_price FLOAT,
--     PRIMARY KEY (preference_id),
--     FOREIGN KEY (artist_id) REFERENCES Artist(artist_id)
-- );

-- CREATE TABLE ArtistPage(
--     page_id INT NOT NULL AUTO_INCREMENT,
--     artist_id INT,
--     parlour_id INT,
--     headline VARCHAR(50),
--     rating_average FLOAT,
--     total_ratings INT,
--     shop_picture BLOB, 
--     total_price FLOAT,
--     PRIMARY KEY (page_id),
--     FOREIGN KEY (artist_id) REFERENCES Artist(artist_id),
--     FOREIGN KEY (parlour_id) REFERENCES Parlour(parlour_id)
-- );

-- CREATE TABLE Comment(
--     comment_id INT NOT NULL AUTO_INCREMENT,
--     comment_text VARCHAR(255),
--     page_id INT,
--     artist_id INT,
--     client_id INT,
--     PRIMARY KEY (comment_id),
--     FOREIGN KEY (artist_id) REFERENCES Artist(artist_id),
--     FOREIGN KEY (client_id) REFERENCES Client(client_id),
--     FOREIGN KEY (page_id) REFERENCES ArtistPage(page_id)
-- );

-- CREATE TABLE Booking(
--     booking_id INT NOT NULL AUTO_INCREMENT,
--     date DATE,
--     start_time TIME,
--     end_time TIME,
--     artist_id INT,
--     client_id INT,
--     parlour_id INT,
--     preference_id INT,
--     description VARCHAR(255),
--     getting ENUM("Tattoo","Piercing","Body mod"),
--     ref_pic BLOB,
--     PRIMARY KEY (booking_id)/*,*/
--     FOREIGN KEY (artist_id) REFERENCES Artist(artist_id),
--     FOREIGN KEY (client_id) REFERENCES Client(client_id),
--     FOREIGN KEY (parlour_id) REFERENCES Parlour(parlour_id),
--     FOREIGN KEY (preference_id) REFERENCES Preference(preference_id)
-- );

-- CREATE TABLE Payment(
--     payment_id INT NOT NULL AUTO_INCREMENT,
--     external_ref VARCHAR(255),
--     booking_id INT,
--     artist_id INT,
--     client_id INT,
--     PRIMARY KEY (payment_id),
--     FOREIGN KEY (artist_id) REFERENCES Artist(artist_id),
--     FOREIGN KEY (client_id) REFERENCES Client(client_id),
--     FOREIGN KEY (booking_id) REFERENCES Booking(booking_id)
-- );


-- For Mid-point prototype only: 
CREATE TABLE Booking(
    booking_id INT NOT NULL AUTO_INCREMENT,
    client_name VARCHAR(255),
    start_time DATETIME,
    end_time DATETIME,
    description VARCHAR(255),
    PRIMARY KEY (booking_id)/*,*/
);




