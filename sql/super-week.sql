CREATE DATABASE IF NOT EXISTS super_week;
USE super_week;

CREATE TABLE IF NOT EXISTS user (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
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
INSERT INTO user (email, first_name, last_name, password)
VALUES
    ('john.doe@gmail.com', 'John', 'Doe', '$2y$10$7CfSZyjKv2X68egR8j5.LOBP5zZc3m3HTjKpTw35Jk6vpLsmmKjmu'),
    ('jane.doe@hotmail.com', 'Jane', 'Doe', '$2y$10$v2n1kAFNkwFeU6XZU1B0l.zBZJLp7/N/iUG0fHLI2Q0nbzhAMJrQ2'),
    ('bob.smith@sfr.fr', 'Bob', 'Smith', '$2y$10$8Jg6xIMyMKf7tLqWlZTEAOzZgERryZn2vJOhhR8juFVxIHZtKjYF6'),
    ('alice.smith@gmail.com', 'Alice', 'Smith', '$2y$10$pzsKjG.mSvdSxWb6jJU6buZGYlFZLJmIcUR.Vsj/ZBtkyUPr41oi2'),
    ('peter.johnson@hotmail.com', 'Peter', 'Johnson', '$2y$10$kq3jDnAG/FlgMLOxhLJMC.m3l9B1ZGvjzVLjWJ8R7vBaQZYtK0Fzm'),
    ('julia.brown@sfr.fr', 'Julia', 'Brown', '$2y$10$NZrA2h1.SgtXzX9Zlr01VOH1LlZaFhzyEBgAd6jJy6SjU6GzNT7Ha'),
    ('mark.taylor@gmail.com', 'Mark', 'Taylor', '$2y$10$liiixldjpupvPHMKIUXW8.cpsnmZDhqVZebd57LlLO0igzQvQeW7m'),
    ('lisa.garcia@hotmail.com', 'Lisa', 'Garcia', '$2y$10$Nl6TquVKhEKNy6GRS7JpveDwUgV7U1Zm4cnV3JUnKGgkLE28OFzX2'),
    ('robert.wilson@sfr.fr', 'Robert', 'Wilson', '$2y$10$jFRJl0MWllydIHDKtPTPUe5GDEQJUXAQi5DC5jFOon5c5NNNCK1nW'),
    ('sarah.anderson@gmail.com', 'Sarah', 'Anderson', '$2y$10$xl5c5Fr5Gm/lPH7zX9yQxum3qPmLdPmFsvlLZvxRfrHlmjCvOeqT6'),
    ('david.lee@sfr.fr', 'David', 'Lee', '$2y$10$i4saxs3QIgF7W8zH/Zx60uzMC0/sEY0kiBMLRWUMsjfi/fL0lbiFe'),
    ('john.smith@gmail.com', 'John', 'Smith', '$2y$10$6PpG/IXyC6UbzQr1r3qf3.OvGfmWbzInO2O4.d3q3kzvF5Wguy8lS'),
    ('jane.doe@hotmail.com', 'Jane', 'Doe', '$2y$10$RYnmWzX8uzA0wdY38AYFi.pBZtWyWxrsn0AeLOEJxBvQF1nWzXimK'),
    ('bob.johnson@sfr.fr', 'Bob', 'Johnson', '$2y$10$bdzN/ROX5S5S5N5P6.qJU.TFhU6HdRdSHpUyJsbBMrC9XO2r/yq3a'),
    ('alice.brown@gmail.com', 'Alice', 'Brown', '$2y$10$y9J07s.ZdYsYsRJ5kf5p5.zdyF5J5H5DXl4QXai3DqY.BKknYDfzW'),
    ('peter.taylor@hotmail.com', 'Peter', 'Taylor', '$2y$10$kkwbzmm0p.7gZETn1ZwnsOZkFm7NY03cln9uV7/jjYrtTcV7FegbW'),
    ('julia.anderson@sfr.fr', 'Julia', 'Anderson', '$2y$10$pl8YYvGk4jMw2F3MliS5OeFl5oh5DJ/u.tB6jXUk.nbr2vFJZ7VwG'),
    ('mark.smith@gmail.com', 'Mark', 'Smith', '$2y$10$tCGgZPugjwTWwEQmG.KCWeDmIjMvT.Q1xQk9/RRKj8oGZIzxBJwR6'),
    ('lisa.johnson@hotmail.com', 'Lisa', 'Johnson', '$2y$10$ymZ81FWL.hEzAbLwdYrK8eKcLb7iG0X9AVRU81ecZIvCZLsEwajbu'),
    ('robert.brown@sfr.fr', 'Robert', 'Brown', '$2y$10$zJmfi/w.PahbxKjV7L8yv.EuLIqbRz9HXo4W4NzVTv4hKjQw3q5BW');

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