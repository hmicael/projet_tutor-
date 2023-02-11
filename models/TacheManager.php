<?php
require('Tache.php');

class TacheManager {
    private $conn;

    public function __construct(string $username = 'handri5_a', string $password = 'handri5_a') {
        $this->connect($username, $password);
    }

    public function connect(string $username, string $password) {
        $this->conn = oci_connect("c##$username", $password, 'dbinfo');
        if (! $this->conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    }

    public function getTaches() {
        $query = "SELECT * FROM tache";
        $cursor = oci_parse($this->conn, $query);
        oci_execute($cursor);

        $taches = array();
        while ($row = oci_fetch_array($cursor, OCI_ASSOC+OCI_RETURN_NULLS)) {
            array_push($taches, new Tache($row));
        }

        return $taches;
    }

    public function getTacheById(int $id) {
        $query = 'SELECT * FROM tache WHERE id = :id ORDER BY date_d';
        $cursor = oci_parse($this->conn, $query);
        oci_bind_by_name($cursor, ':id', $id);
        oci_execute($cursor);

        $tache = oci_fetch_assoc($cursor);

        oci_free_statement($cursor);
        oci_close($this->conn);

        return $tache;
    }

    public function add(Tache $tache) {
        $query = "INSERT INTO tache VALUES (seq_tache.netxval, :titre, :matiere, :description, DATE ':date_d', :statut)";
        $cursor = oci_parse($this->conn, $query);

        oci_bind_by_name($cursor, ':titre', $tache->getTitre());
        oci_bind_by_name($cursor, ':matiere', $tache->getMatière());
        oci_bind_by_name($cursor, ':description', $tache->getDescription());
        oci_bind_by_name($cursor, ':date_d', $tache->getDate_d());
        oci_bind_by_name($cursor, ':statut', $tache->getStatut());

        oci_execute($cursor);

        return true;
    }

    public function update(Tache $tache) {
        $query = "UPDATE tache SET titre = :titre, matiere = :matiere, description = :description, date_d = DATE ':date_d', statut = :statut WHERE id = :id";
        $cursor = oci_parse($this->conn, $query);

        oci_bind_by_name($cursor, ':id', $tache->getId());
        oci_bind_by_name($cursor, ':titre', $tache->getTitre());
        oci_bind_by_name($cursor, ':matiere', $tache->getMatière());
        oci_bind_by_name($cursor, ':description', $tache->getDescription());
        oci_bind_by_name($cursor, ':date_d', $tache->getDate_d());
        oci_bind_by_name($cursor, ':statut', $tache->getStatut());

        oci_execute($cursor);

        return true;
    }

    public function delete(int $id) {
        $query = "DELETE FROM tache WHERE id = :id";
        $cursor = oci_parse($this->conn, $query);

        oci_bind_by_name($cursor, ':id', $id);

        oci_execute($cursor);

        return true;
    }
}
