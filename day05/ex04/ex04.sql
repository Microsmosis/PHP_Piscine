UPDATE ft_table /* choose the table where i want to update from */
SET `creation_date` = date_add(`creation_date`, INTERVAL 20 YEAR) /* SET : which where i want to make changes column, date_add is a sql function and INTERVAL is a function aswell*/
WHERE `id` > 5; /* the condition so only the "id's" that are bigger than 5*/