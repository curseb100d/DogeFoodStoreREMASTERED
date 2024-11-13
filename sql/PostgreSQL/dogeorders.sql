CREATE TABLE dogeorders (
    id INTEGER NOT NULL,
    dogeuser_id INTEGER NOT NULL,
    name VARCHAR(20) NOT NULL,
    number VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    method VARCHAR(50) NOT NULL,
    address VARCHAR(500) NOT NULL,
    total_products TEXT NOT NULL,
    total_price INTEGER NOT NULL,
    placed_on DATE NOT NULL DEFAULT CURRENT_DATE,
    payment_status VARCHAR(20) NOT NULL DEFAULT 'pending'
);