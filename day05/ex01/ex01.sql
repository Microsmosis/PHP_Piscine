/*SQL code to create a new table*/
CREATE TABLE `ft_table` ( /* giving the name for the table !good practive to use apostrophe!*/
  `id` int NOT NULL AUTO_INCREMENT, /* one column called "id" type int and automaticly incrementing depending how many rows of data we have*/
  `login` varchar(8) DEFAULT 'toto' NOT NULL, /*column called login type char with the max lenght of 8, data set to toto as default, cannot be null value*/
  `group` ENUM ('staff', 'student', 'other') NOT NULL, /* be careful with " ' " and " ` " staff etc are strings "sub categories" for the columns group*/
  `creation_date` DATE NOT NULL, /* DATE function to specify this will be a date*/
  PRIMARY KEY (id) /* dont really know that much about this but apparently mandatory thing to have a KEY */
);