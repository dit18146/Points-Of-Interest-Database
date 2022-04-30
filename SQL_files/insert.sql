INSERT INTO users(special_id, name, surname, gender, dob, followers_num) 
SELECT DISTINCT special_id, name, surname, gender, dob, followers_num 
FROM users_file;

UPDATE friends_file
SET final_id1=users.id
FROM users
WHERE users.special_id = friends_file.id1;

UPDATE friends_file
SET final_id2=users.id
FROM users
WHERE users.special_id = friends_file.id2; 


INSERT INTO friends(user1_id, user2_id) 
SELECT final_id1,final_id2
FROM friends_file; 

INSERT INTO check_in(user_id, poi_id, day, month, year, hour, minute, second)
SELECT users.id, pois_file.id, check_in_file.day, check_in_file.month, check_in_file.year, check_in_file.hour, check_in_file.minute, check_in_file.second
FROM users, pois_file,check_in_file
WHERE users.special_id=check_in_file.user_id
AND pois_file.hex_id=check_in_file.hex_id;

INSERT INTO located(poi_id, city_id) 
SELECT DISTINCT pois_file.id, city.id 
FROM pois_file,city 
WHERE pois_file.city=city.name 
AND pois_file.state=city.state 
AND pois_file.country=city.country;

INSERT INTO residing(user_id, city_id) 
SELECT DISTINCT users.id, city.id 
FROM users,users_file,city 
WHERE users_file.city_name=city.name 
AND users_file.state=city.state 
AND users_file.country=city.country
AND users.special_id=users_file.special_id;
