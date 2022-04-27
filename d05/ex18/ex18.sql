SELECT name
FROM distrib
WHERE id_distrib BETWEEN '62' AND '69'
OR id_distrib BETWEEN '88' AND '90'
OR id_distrib LIKE '42'
OR id_distrib LIKE '71'
OR LOWER(name) REGEXP '^[^y]*y[^y]*y[^y]$'
LIMIT 5 OFFSET 2;