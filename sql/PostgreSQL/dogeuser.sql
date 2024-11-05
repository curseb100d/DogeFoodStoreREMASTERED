CREATE TABLE dogeuser
(
    dogeuser_id SERIAL PRIMARY KEY,
    	firstname varchar(255) NOT NULL,
	lastname varchar(255) NOT NULL,
	username varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	mobile varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	dogeusercreated_at timestamptz DEFAULT current_timestamp
);