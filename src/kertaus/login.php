<?php

session_start();

$error = [];
$username = "";
$opiskelijaryhma = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"] ?? '');
    $opiskelijaryhma = trim($_POST["opiskelijaryhma"] ?? '');
    $password = $_POST["password"];

    if ($username === '')
        {
            $error[] = "Käyttäjänimi ei voi olla tyhjä.";
        }
    if ($opiskelijaryhma === '')
        {
            $error[] = "Opiskelijaryhmä ei voi olla tyhjä.";
        }
    if ($password !== 'php123')
        {
            $error[] = "Salasana on virheellinen.";
        }
    
    if (empty($error)) {
        $_SESSION['username'] = $username;
        $_SESSION['opiskelijaryhma'] = $opiskelijaryhma;
        header("Location: index.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php if (!empty($error)): ?>
        <div style="color: red;">
            <?php foreach ($error as $msg): ?>
            <p><?php echo htmlspecialchars($msg); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <form action="login.php" method="post">
        <label>Käyttäjänimi:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br><br>

        <label>Opiskelijaryhmä:</label>
        <input type="text" name="opiskelijaryhma" value="<?php echo htmlspecialchars($opiskelijaryhma); ?>" required><br><br>

        <label for="password">Salasana:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Kirjaudu sisään">
    </form>
</body>
</html>