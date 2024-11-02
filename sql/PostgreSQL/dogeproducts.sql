CREATE TABLE dogeproducts (
  id integer PRIMARY KEY GENERATED BY DEFAULT AS IDENTITY,
  brand varchar(255) NOT NULL,
  flavor varchar(255) NOT NULL,
  price integer NOT NULL,
  category varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  dogecreated_at timestamptz DEFAULT current_timestamp
);