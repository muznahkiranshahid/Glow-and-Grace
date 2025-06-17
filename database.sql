-- CREATE database makehub;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    username VARCHAR(100) UNIQUE,
    email VARCHAR(150) UNIQUE,
    password VARCHAR(255)
);
CREATE TABLE contact_messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  subject VARCHAR(255),
  message TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  brand VARCHAR(255),
  category VARCHAR(255),
  price VARCHAR(50),
  image1 VARCHAR(255),
  image2 VARCHAR(255),
  description TEXT
);
CREATE TABLE purchases (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_name VARCHAR(255),
  product_price DECIMAL(10,2),
  quantity INT,
  total DECIMAL(10,2),
  purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cart_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_name VARCHAR(255) NOT NULL,
  product_price DECIMAL(10,2) NOT NULL,
  added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);



