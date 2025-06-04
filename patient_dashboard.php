<?php

require_once 'config/database.php';
require_once 'includes/functions.php';
require_once 'includes/patient.php';

$Patient = new Patient();
$patients = $Patient->getAllPatient();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SKILSL TEST</title>
    <link rel="stylesheet" href="/helloworld/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/helloworld/assets/w3.css" />

    <style>
        .container-custom {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="w3-container container-custom">
        <div class="w3-card w3-white w3-padding-large w3-round-large">
            <h2 class="w3-center w3-text-blue">Patient Records</h2>

            <table class="w3-table-all w3-hoverable w3-centered">
                <thead>
                    <tr class="w3-blue">
                        <th>IDNO</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Lastname</th>
                        <th>Birthday</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>Registered Date</th>
                        <th>Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $patients->fetch_assoc()): ?>
                        <tr>
                            <td><?= sanitize($row['idno']) ?></td>
                            <td><?= sanitize($row['firstname']) ?></td>
                            <td><?= sanitize($row['middlename']) ?></td>
                            <td><?= sanitize($row['lastname']) ?></td>
                            <td><?= sanitize($row['birthday']) ?></td>
                            <td><?= sanitize($row['age']) ?></td>
                            <td><?= sanitize($row['city']) ?></td>
                            <td><?= sanitize($row['registered_date']) ?></td>
                            <
                            <td>
                                <a class = "w3-button w3-blue w3-margin-right" href = "edit_patient.php?idno=<?= sanitize($row['idno']) ?> ">EDIT</a>
                                <a class = "w3-button w3-red" href = "delete_patient.php?idno=<?= sanitize($row['idno']) ?> ">DELETE</a>

                              </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="/helloworld/assets/bootstrap/js/bootstrap.min.bundle.js"></script>

</body>
</html>
