<?php

class FileController {
    public function filesList() {

    echo "<h1>Список файлів:</h1>";
    echo "<a href='/index.php/FileController/uploadForm'>Завантажити файл</a><br>";
    echo "<a href='/index.php/FileController/checkFileForm'>Перевірити файл</a><br><br>";


    $uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/files/";


    $files = scandir($uploadDir);


    echo "<table border='1'>";
    echo "<tr><th>Назва файлу</th><th>Дії</th></tr>";

    foreach ($files as $file) {

        if ($file !== '.' && $file !== '..') {
            echo "<tr>";

            echo "<td>$file</td>";

            echo "<td><a href='/index.php/FileController/deleteFile?name=$file'>Видалити</a></td>";
            echo "</tr>";
        }
    }

    echo "</table>";
}


    public function uploadForm() {
        require_once 'views/upload_form.php';
    }

    public function uploadFile() {
        $uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/files/";

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (isset($_FILES['file'])) {
            $fileName = basename($_FILES['file']['name']);
            $uploadFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                echo "Файл успішно завантажений!";
            } else {
                echo "Помилка завантаження файлу.";
            }
        }
    }

    public function checkFileForm() {
        require_once 'views/check_file_form.php';
    }

    public function checkFile() {
        $uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/files/";
        $filename = $_POST['filename'];
        $extension = $_POST['extension'];
        $fullPath = $uploadDir . $filename . '.' . $extension;

        if (file_exists($fullPath)) {
            echo "Файл $filename.$extension існує на сервері.";
        } else {
            echo "Файл $filename.$extension не знайдено на сервері.";
        }
    }

    public function deleteFile() {
        $uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/files/";
        $fileName = $_GET['name'];
        $fullPath = $uploadDir . $fileName;

        if (file_exists($fullPath)) {
            unlink($fullPath);
            echo "Файл $fileName успішно видалено.";
        } else {
            echo "Файл $fileName не знайдено.";
        }

        header("Location: /index.php/FileController/filesList");
        exit;
    }
}
