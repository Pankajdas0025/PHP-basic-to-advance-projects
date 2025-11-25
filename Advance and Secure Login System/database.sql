CREATE DATABASE IF NOT EXISTS php_basic_projects;
use php_basic_projects;

CREATE TABLE signup_data

(

    ID int(100) AUTO_INCREMENT PRIMARY KEY ,
    NAME VARCHAR(20) NOT NULL ,
    EMAIL VARCHAR(20) NOT NULL ,
    PASSWORD VARCHAR(10) NOT NULL

)

INSERT INTO signup_data
VLAUES ('admin' , 'admin@gmail.com' , '$2y$10$Nf5bo4ugk8VtvixDjgiTFebGUz7i4ixrtvZJB/cUioDpzmf1Eboje');
-- Password: admin12345
