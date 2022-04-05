/* code to find Vincent from summary and display all title&summary rows with Vincent with ascending order defined by id_film*/
SELECT `title`, `summary`
FROM `film`
WHERE `summary`
LIKE "%Vincent%"
ORDER BY `id_film` ASC;