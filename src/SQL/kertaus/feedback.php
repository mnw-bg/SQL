<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    echo '<p>Kirjaudu ensin sisään.</p>';
    echo '<a href="login.php">Kirjaudu sisään</a>';
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $palaute = trim($_POST['palaute'] ?? '');

    if ($palaute !== '') {
        file_put_contents(
            __DIR__ . '/feedback.txt',
            $_SESSION['username'] . ' | ' . $palaute . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );

        echo '<p>lähetetty; Kiitos</p>';
    } else {
        echo '<p>Kirjoita palaute.</p>';
    }
}
?>

<h2>Anna palautetta</h2>

<form method="post">
    <textarea name="palaute" rows="6" cols="50" required></textarea>
    <br>
    <button type="submit">Lähetä palaute</button>
</form>