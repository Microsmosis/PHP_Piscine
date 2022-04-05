/* SQL code to transfer data from one to another (usercard to ft_table) */
INSERT INTO ft_table(`login`, `group`, `creation_date`) /* where we are inserting data, the table and which columns*/
SELECT `last_name`, 'other', `birthdate` FROM usercard /* selecting the data from usercard we want to transfer, "other" is a string not a column, because we have "3 parameters in the line above*/
WHERE `last_name` LIKE '%a%' /* defining where are taking this from which column, LIKE is defining what kind of data so data has to have an "a"*/
AND char_length(`last_name`) < 9 /* more definition so every data that has less than 9 chars*/
ORDER BY `last_name` ASC /* setting the order of the data in the table we are transfering*/
LIMIT 10; /* defining a limit that only 10 "lines of data" 10 "logins"*/