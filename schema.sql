CREATE DATABASE 82397_doingsdone
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE 82397_doingsdone;

CREATE TABLE IF NOT EXISTS projects (
  project_id INT AUTO_INCREMENT PRIMARY KEY,
  project_name VARCHAR(128) NOT NULL,
  user_id INT NOT NULL
) ENGINE = INNODB CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(128),
  password CHAR (128) NOT NULL,
  user_email VARCHAR (128) UNIQUE NOT NULL,
  created_date DATETIME,
  user_contacts VARCHAR(128)
) ENGINE = INNODB CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS tasks (
  task_id INT AUTO_INCREMENT PRIMARY KEY,
  task_name VARCHAR(128) NOT NULL,
  start_date DATETIME,
  finish_date DATETIME,
  deadline_data DATETIME,
  file_path VARCHAR (256),
  user_id INT NOT NULL,
  project_id INT NOT NULL
) ENGINE = INNODB CHARACTER SET = utf8;

CREATE INDEX emails ON users(user_email);
