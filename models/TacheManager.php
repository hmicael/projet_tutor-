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
        $query = "SELECT * FROM tache ORDER BY statut, date_d";
        $stid = oci_parse($this->conn, $query);
        oci_execute($stid);

        $taches = array();
        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            array_push($taches, new Tache($row));
        }
        
        return $taches;
    }

    public function getTacheById(int $id) {
        $query = 'SELECT * FROM tache WHERE id = :id';
        $stid = oci_parse($this->conn, $query);
        oci_bind_by_name($stid, ':id', $id);
        oci_execute($stid);

        $data = oci_fetch_assoc($stid);
        
        if(! $data)
            throw new Exception("Tache not found");
        
        oci_free_statement($stid);

        return new Tache($data);
    }

    public function add(Tache $tache) {
        $query = "INSERT INTO tache VALUES (seq_tache.nextval, :titre, :matiere, :description, 
            :date_d, :statut)";
        $stid = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stid, ':titre', $tache->getTitre());
        oci_bind_by_name($stid, ':matiere', $tache->getMatiere());
        oci_bind_by_name($stid, ':description', $tache->getDescription());
        oci_bind_by_name($stid, ':date_d', $tache->getDate_d());
        oci_bind_by_name($stid, ':statut', $tache->getStatut());

        oci_execute($stid);

        return true;
    }

    public function update(Tache $tache) {
        $query = "UPDATE tache SET titre = :titre, matiere = :matiere, description = :description, 
            date_d = :date_d, statut = :statut WHERE id = :id";
        $stid = oci_parse($this->conn, $query);

        oci_bind_by_name($stid, ':id', $tache->getId());
        oci_bind_by_name($stid, ':titre', $tache->getTitre());
        oci_bind_by_name($stid, ':matiere', $tache->getMatiere());
        oci_bind_by_name($stid, ':description', $tache->getDescription());
        oci_bind_by_name($stid, ':date_d', $tache->getDate_d());
        oci_bind_by_name($stid, ':statut', $tache->getStatut());

        oci_execute($stid);

        return true;
    }

    public function delete(int $id) {
        $query = "DELETE FROM tache WHERE id = :id";
        $stid = oci_parse($this->conn, $query);

        oci_bind_by_name($stid, ':id', $id);

        oci_execute($stid);

        return true;
    }
}
