<?php


require_once 'config/database.php';
require_once 'includes/functions.php';
require_once 'includes/patient.php';

$Patient = new Patient();
$data = $Patient->getOnePatient($_GET['idno'])->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Patient->updatePatient($_POST['idno'], $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['birthday'], $_POST['age'], $_POST['city']);
    header ('Location: patient_dashboard.php');

}



?>
    <link rel="stylesheet" href="/helloworld/assets/w3.css" />

<form method="post" class = "w3-container w3-card">
  <label>ID No:</label>
  <input class="w3-input w3-border" type="text" name="idno" value="<?= sanitize($data['idno']) ?>" readonly><br>

  <label>First Name:</label>
  <input class="w3-input w3-border" type="text" name="firstname" value="<?= sanitize($data['firstname']) ?>"><br>

  <label>Middle Name:</label>
  <input class="w3-input w3-border" type="text" name="middlename" value="<?= sanitize($data['middlename']) ?>"><br>

  <label>Last Name:</label>
  <input class="w3-input w3-border" type="text" name="lastname" value="<?= sanitize($data['lastname']) ?>"><br>

  <label>Birthday:</label>
  <input class="w3-input w3-border" type="date" name="birthday" value="<?= sanitize($data['birthday']) ?>"><br>

  <label>Age:</label>
  <input class="w3-input w3-border" type="number" name="age" value="<?= sanitize($data['age']) ?>"><br>

  <label>City:</label>
  <select class="w3-select w3-border" name="city">
    <option value="Cebu" <?= $data['city'] === 'Cebu' ? 'selected' : '' ?>>CEBU</option>
    <option value="Mandaue" <?= $data['city'] === 'Mandaue' ? 'selected' : '' ?>>Mandaue</option>
    <option value="Talisay" <?= $data['city'] === 'Talisay' ? 'selected' : '' ?>>Talisay</option>
  </select><br>

  <input type="submit" class="w3-button w3-green" value="Update">
</form>

 
