DROP TABLE tache;
DROP TABLE log;

CREATE TABLE tache(
	id INT,
	CONSTRAINT pk_tache PRIMARY KEY (id),
	titre VARCHAR(25) NOT NULL,
	matiere VARCHAR(25) NOT NULL,
	description VARCHAR(100),
	date_d VARCHAR(10) NOT NULL,
	statut SMALLINT DEFAULT 0 CHECK (statut IN (0, 1)),
	nomEtudiant VARCHAR(25),
	numeroEtudiant INT
);

CREATE TABLE log(
	id INT,
	CONSTRAINT pk_log PRIMARY KEY (id),
	nomEtudiant VARCHAR(25),
	numeroEtudiant INT,
	date_action VARCHAR(10) NOT NULL,
	action VARCHAR(25)
);

DROP SEQUENCE seq_tache;
DROP SEQUENCE seq_log;
CREATE SEQUENCE seq_tache START WITH 1;
CREATE SEQUENCE seq_log START WITH 1;
