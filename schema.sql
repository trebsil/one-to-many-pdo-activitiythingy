CREATE TABLE developers (
  developer_id INT AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(100),
  lastName VARCHAR (100)
  email VARCHAR(100)
);

CREATE TABLE games (
  game_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100),
  genre VARCHAR(50),
  developer_id INT,
  FOREIGN KEY (developer_id) REFERENCES developers(developer_id)
);

INSERT INTO developers (
  firstName, lastName, email)
VALUES 
  ('Remielle', 'Dan', 'remidan@gmail.com');

INSERT INTO games (
  title, genre, developer_id)
VALUES
  ('Five Nights at Remis', 'Horror', 1);
