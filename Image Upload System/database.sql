CREATE DATABASE IF NOT EXISTS php_basic_projects;
use php_basic_projects;



CREATE TABLE uploads (
  id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(50) NOT NULL,
  file_path varchar(255) NOT NULL,
  reg_date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)