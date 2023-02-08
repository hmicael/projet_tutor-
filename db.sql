CREATE TABLE tache(
	id INT,
	CONSTRAINT pk_tache PRIMARY KEY (id),
	titre VARCHAR(15) NOT NULL,
	matiere VARCHAR(15) NOT NULL,
	description VARCHAR(50),
	date_d DATE NOT NULL,
	statut TINYINT DEFAULT(0),
	CHECK check_statut(statut in (0, 1))
);