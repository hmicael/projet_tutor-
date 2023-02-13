DROP TABLE tache;

CREATE TABLE tache(
	id INT,
	CONSTRAINT pk_tache PRIMARY KEY (id),
	titre VARCHAR(25) NOT NULL,
	matiere VARCHAR(25) NOT NULL,
	description VARCHAR(100),
	date_d VARCHAR(10) NOT NULL,
	statut SMALLINT DEFAULT 0 CHECK (statut IN (0, 1))
);

DROP SEQUENCE seq_tache;
CREATE SEQUENCE seq_tache START WITH 1;
