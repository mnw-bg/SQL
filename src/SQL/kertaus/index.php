<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>palautesovellus</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Tervetuloa palautesovellukseen</h2>
        <p>hyvä sovellus</p>
        <input type="button" value="Kirjaudu sisään" onclick="window.location.href='login.php'">
        <input type="button" value="Kirjaudu ulos" onclick="window.location.href='logout.php'">
        <?php include 'feedback.php'; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>