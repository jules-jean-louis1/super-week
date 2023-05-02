CREATE DATABASE IF NOT EXISTS super_week;
USE super_week;

CREATE TABLE IF NOT EXISTS user (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL
    );

CREATE TABLE IF NOT EXISTS book (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    id_user INT(11) UNSIGNED NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id)
    );

-- Remplissage des tables avec 20 entrées

-- Table user
INSERT INTO user (email, first_name, last_name)
VALUES
    ('user1@example.com', 'John', 'Doe'),
    ('user2@example.com', 'Jane', 'Doe'),
    ('user3@example.com', 'Bob', 'Smith'),
    ('user4@example.com', 'Alice', 'Smith'),
    ('user5@example.com', 'Peter', 'Johnson'),
    ('user6@example.com', 'Julia', 'Brown'),
    ('user7@example.com', 'Mark', 'Taylor'),
    ('user8@example.com', 'Lisa', 'Garcia'),
    ('user9@example.com', 'Robert', 'Wilson'),
    ('user10@example.com', 'Sarah', 'Anderson'),
    ('user11@example.com', 'David', 'Lee'),
    ('user12@example.com', 'Emily', 'Young'),
    ('user13@example.com', 'Jason', 'Allen'),
    ('user14@example.com', 'Jennifer', 'Hall'),
    ('user15@example.com', 'Steven', 'King'),
    ('user16@example.com', 'Megan', 'Wright'),
    ('user17@example.com', 'Kevin', 'Scott'),
    ('user18@example.com', 'Lauren', 'Green'),
    ('user19@example.com', 'Richard', 'Baker'),
    ('user20@example.com', 'Samantha', 'Cruz');

-- Table book
INSERT INTO book (title, content, id_user)
VALUES
    ('Book 1', 'Content of book 1', 1),
    ('Book 2', 'Content of book 2', 1),
    ('Book 3', 'Content of book 3', 1),
    ('Book 4', 'Content of book 4', 2),
    ('Book 5', 'Content of book 5', 2),
    ('Book 6', 'Content of book 6', 2),
    ('Book 7', 'Content of book 7', 3),
    ('Book 8', 'Content of book 8', 3),
    ('Book 9', 'Content of book 9', 3),
    ('Book 10', 'Content of book 10', 2),
    ('Book 11', 'Content of book 11', 2),
    ('Book 12', 'Content of book 12', 2),
    ('Book 13', 'Content of book 13', 3),
    ('Book 14', 'Content of book 14', 3),
    ('Book 15', 'Content of book 15', 3),
    ('Book 16', 'Content of book 16', 4),
    ('Book 17', 'Content of book 17', 4),
    ('Book 18', 'Content of book 18', 6),
    ('Book 19', 'Content of book 19', 6);
