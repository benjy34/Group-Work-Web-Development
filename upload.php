<?php

require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $file = $_FILES['fileToUpload']['tmp_name'];


        if ($_FILES['fileToUpload']['type'] != 'text/csv') {
            echo "Please upload a valid CSV file.";
            exit();
        }


        $handle = fopen($file, "r");


        fgetcsv($handle);
        fgetcsv($handle);

        $stmt = $conn->prepare("INSERT INTO Data (Name, RegistrationNumber, Class, Marks) VALUES (:name, :regNumber, :class, :marks)");


        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $name = $data[0];
            $regNumber = $data[1];
            $class = $data[2];
            $marks = $data[3];

            $checkStmt = $conn->prepare("SELECT * FROM Data WHERE RegistrationNumber = :regNumber");
            $checkStmt->bindParam(':regNumber', $regNumber);
            $checkStmt->execute();

            if ($checkStmt->rowCount() == 0) {
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':regNumber', $regNumber);
                $stmt->bindParam(':class', $class);
                $stmt->bindParam(':marks', $marks);
                $stmt->execute();
            }
        }

        fclose($handle);
        echo "CSV data uploaded successfully!";
    }


 ?>
