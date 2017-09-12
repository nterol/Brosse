<?PHP
header('Location: index.php');
session_start();
$_SESSION['logged_on_user'] = '';
$_SESSION['admin'] = '';
$_SESSION['panier'] = '';
?>