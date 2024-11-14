CREATE TABLE dogeorders (
  id SERIAL PRIMARY KEY,
  dogeuser_id INTEGER NOT NULL,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  number VARCHAR(11) NOT NULL,
  method VARCHAR(100) NOT NULL,
  address VARCHAR(500) NOT NULL,
  total_products VARCHAR(1000) NOT NULL,
  total_price INTEGER NOT NULL,
  placed_on DATE NOT NULL DEFAULT CURRENT_DATE,
  payment_status VARCHAR(20) NOT NULL DEFAULT 'pending'
);