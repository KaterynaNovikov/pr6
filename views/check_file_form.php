<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Перевірка файлу</title>
</head>
<body>
    <h1>Перевірити файл</h1>
    <form action="/index.php/FileController/checkFile" method="post">
        <label for="filename">Ім'я файлу (без розширення):</label>
        <input type="text" name="filename" id="filename" required>
        
        <label for="extension">Формат файлу:</label>
        <input type="text" name="extension" id="extension" required>
        
        <button type="submit">Перевірити</button>
    </form>
</body>
</html>
