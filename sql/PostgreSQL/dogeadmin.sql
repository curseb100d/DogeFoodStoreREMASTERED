CREATE TABLE dogeadmin
(
    dogeadmin_id SERIAL PRIMARY KEY,
    username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	admindogecreated_at timestamptz DEFAULT current_timestamp
);