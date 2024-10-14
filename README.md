# LAS_user
``lab appointment system: mobile web app``
## Database
>* 1st table:
>```Mysql
>CREATE DATABASE las_db;
>
>USE las_db;
>
>CREATE TABLE users (
>    id VARCHAR(10) PRIMARY KEY,     -- use student ID:2022123456
>    username VARCHAR(50) NOT NULL UNIQUE,
>    password VARCHAR(255) NOT NULL
>);
>```


>* 2st table:
>```Mysql
>CREATE TABLE user_info (
>   id VARCHAR(10),                     -- FK
>   username VARCHAR(50),               -- FK
>   phonenumber VARCHAR(20),           
>   email VARCHAR(100),                
>   photo_path VARCHAR(255),           
>   PRIMARY KEY (id),         			 -- PK
>   FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE,  
>   FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE
>);
>```