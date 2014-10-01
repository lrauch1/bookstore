/*
* Creating users
*/
CREATE USER 'root'@'localhost' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES
ON `ITAS255_Assignment02_Lindsey_Rauch`.*
TO 'root'@'%';
FLUSH PRIVILEGES; 

/*
* Inseting values into database
*/
INSERT  INTO  `blog`  (`id`,  `title`,  `entry`,  `entry_date`)  
VALUES  (null, "Blog  Entry  #1", "Blog  Entry  #1 text",  now());
INSERT  INTO  `blog`  (`id`,  `title`,  `entry`,  `entry_date`)  
VALUES  (null, "Blog  Entry  #2", "Blog  Entry  #2 text",  now());
INSERT  INTO  `blog`  (`id`,  `title`,  `entry`,  `entry_date`)  
VALUES  (null, "Blog  Entry  #3", "Blog  Entry  #3 text",  now());

