CREATE TABLE dogeadmin (
  id SERIAL PRIMARY KEY,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(50) NOT NULL,
  dogeadmincreated_at timestamptz DEFAULT current_timestamp
);