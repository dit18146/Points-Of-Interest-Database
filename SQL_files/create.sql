CREATE TABLE users
(
    id SERIAL,
    special_id INTEGER,
    name VARCHAR(50),
    surname VARCHAR(100),
    dob DATE,
    gender VARCHAR(10),
    followers_num INTEGER,
    PRIMARY KEY (id)
);




create TABLE city(
    id SERIAL,
    name VARCHAR(50),
    state VARCHAR(100),
    country VARCHAR(100),
    longitude DECIMAL,
    latitude DECIMAL,
    PRIMARY KEY (id)

);

create TABLE poi(
    id SERIAL,
    hex_id VARCHAR(24),
    category VARCHAR(100),
    longitude DECIMAL,
    latitude DECIMAL,
    PRIMARY KEY (id)

);


CREATE TABLE check_in(
   user_id INTEGER,
   poi_id INTEGER,
day INTEGER,
month INTEGER,
year INTEGER,
hour INTEGER,
minute INTEGER,
second INTEGER,
   FOREIGN KEY (user_id) REFERENCEs users(id),
   FOREIGN KEY (poi_id) REFERENCEs poi(id)

);




CREATE TABLE friends(
   user1_id INTEGER,
   user2_id INTEGER,
   FOREIGN KEY (user1_id) REFERENCEs users(id),
   FOREIGN KEY (user2_id) REFERENCEs users(id)

);

CREATE TABLE residing(
   user_id INTEGER,
   city_id INTEGER,
   FOREIGN KEY (user_id) REFERENCEs users(id),
   FOREIGN KEY (city_id) REFERENCEs city(id)

);
CREATE TABLE located(
poi_id INTEGER,
city_id INTEGER,
FOREIGN KEY (poi_id) REFERENCEs poi(id),
FOREIGN KEY (city_id) REFERENCEs city(id)
);