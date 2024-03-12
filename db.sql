
-- USE THIS QUERY TO CREATE USER TABLE
CREATE TABLE users (
	user_id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
   	firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (user_id)
);

-- USE THIS QUERY TO CREATE BOOKS TABLE
CREATE TABLE books (
	isbn BIGINT(13) NOT NULL,
    author VARCHAR(100) NOT NULL,
    title VARCHAR (100) NOT NULL,
    publisher VARCHAR (50) NOT NULL,
    publish_year YEAR NOT NULL,
    synopsis TEXT NOT NULL,
    thumbnail VARCHAR(255),
    user_id INT(11),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (isbn),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

--USE THIS QUERY TO CREATE REVIEWS TABLE
CREATE TABLE reviews (
	review_id INT(11) NOT NULL AUTO_INCREMENT,
    book_id BIGINT(13),
    user_id INT(11),
    rating INT NOT NULL CHECK (rating >= 0 AND rating <= 5),
    review_text TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (review_id),
    FOREIGN KEY (book_id) REFERENCES books(isbn),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);