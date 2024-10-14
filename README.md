# LAS_user
``lab appointment system: mobile web app``
### Database
>* 1st table:
>```Mysql
>CREATE DATABASE las_db;
>
>USE las_db;
>
>CREATE TABLE users (
>    id VARCHAR(10) PRIMARY KEY,     -- use student ID:2022123456
>    username VARCHAR(50) NOT NULL,
>    password VARCHAR(255) NOT NULL
>);
>```

