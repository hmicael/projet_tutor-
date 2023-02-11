DROP TABLE tache;

CREATE TABLE tache(
	id INT,
	CONSTRAINT pk_tache PRIMARY KEY (id),
	titre VARCHAR(15) NOT NULL,
	matiere VARCHAR(15) NOT NULL,
	description VARCHAR(50),
	date_d DATE NOT NULL,
	statut SMALLINT DEFAULT 0 CHECK (statut IN (0, 1))
);

DROP SEQUENCE seq_tache;
CREATE SEQUENCE seq_tache START WITH 1;
