CREATE DATABASE job_portal;

USE job_portal;

CREATE TABLE applications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(100),
  email VARCHAR(100),
  gender VARCHAR(10),
  position VARCHAR(50),
  cv_filename VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- new

CREATE TABLE applications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(100),
  email VARCHAR(100),
  gender VARCHAR(10),
  position VARCHAR(50),
  cv_filename VARCHAR(255),
  profile_picture VARCHAR(255),  -- New column for profile picture
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
