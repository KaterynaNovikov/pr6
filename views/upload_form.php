<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завантаження файлу</title>
</head>
<body>
    <h1>Завантажити файл</h1>
    <form action="/index.php/FileController/uploadFile" method="post" enctype="multipart/form-data">
        <label for="file">Виберіть файл:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Завантажити</button>
    </form>
</body>
</html>
