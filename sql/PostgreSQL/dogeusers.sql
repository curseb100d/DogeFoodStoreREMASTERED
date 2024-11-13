CREATE TABLE dogeusers (
  id SERIAL PRIMARY KEY,
  name VARCHAR(20) NOT NULL,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  number VARCHAR(10) NOT NULL,
  password VARCHAR(50) NOT NULL,
  address VARCHAR(500) NOT NULL,
  dogeuserscreated_at timestamptz DEFAULT current_timestamp
);