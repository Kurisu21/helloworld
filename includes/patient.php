<?php

require_once __DIR__ . '/../config/database.php'; 

class Patient {

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllPatient() {
        return $this->conn->query("SELECT * FROM patients");
    }

    public function getOnePatient($idno){
        return $this->conn->query("SELECT * FROM patients WHERE idno = '$idno'");
    }

    public function addPatient($idno, $firstname, $middlename, $lastname, $birthday, $age, $city, $registered_date){
        $stmt = $this->conn->prepare("INSERT INTO patients(idno, firstname, middlename, lastname, birthday, age, registered_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $idno, $firstname, $middlename, $lastname, $birthday, $age, $registered_date);
        return $stmt->execute();
    }

    public function updatePatient($idno, $firstname, $middlename, $lastname, $birthday, $age, $city){
        $stmt = $this->conn->prepare("UPDATE patients SET firstname = ?, middlename = ?, lastname = ?, birthday = ?, age = ?, city =? WHERE idno = ? ");
        $stmt->bind_param("sssssss", $firstname, $middlename, $lastname, $birthday, $age, $city, $idno);
        return $stmt->execute();
    }

    public function deletePatient($idno){
        return $this->conn->query("DELETE FROM patients WHERE idno = $idno");
    }

}

?>
