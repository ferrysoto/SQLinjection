usuari bd = root
pass =
(pass en blanco)


Login inyectable:
ferran';CREATE TABLE qualsevolnomtaula ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP );


Dentro de Github hay 2 ramas:

- Master: contiene la BD protegida
- Broke: contiene la BD desprotegida de SQL Injection
