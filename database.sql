CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(50) NOT NULL, 
  email VARCHAR(50) NOT NULL, 
  password VARCHAR(60) NOT NULL,
  course VARCHAR(50),
  linkedin VARCHAR(50),
  github VARCHAR(50)
);

