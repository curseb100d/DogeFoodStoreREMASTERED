CREATE TABLE dogeproducts (
  id SERIAL PRIMARY KEY,
  brand VARCHAR(100) NOT NULL,
  flavor VARCHAR(100) NOT NULL,
  price INTEGER NOT NULL,
  category VARCHAR(100) NOT NULL,
  image VARCHAR(100) NOT NULL,
  dogeproductscreated_at timestamptz DEFAULT current_timestamp
);