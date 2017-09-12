<?PHP
session_start();
if ($_POST['submit'] === 'Modifier le mot de passe' && $_POST['login'] !== 'admin' && $_POST['newpw'] !== '' && $_POST['oldpw'] !== '')
{
    $file = unserialize(file_get_contents("./data_base/user"));
    $newpw_h = hash("whirlpool", $_POST['newpw']);
    $oldpw_h = hash("whirlpool", $_POST['oldpw']);
    $j = 0;
    foreach ($file as &$elem)
    {
        if ($_SESSION['logged_on_user'] === $elem['login'] && $oldpw_h === $elem['passwd'])
        {
            $j++;
            $elem['passwd'] = $newpw_h;
        }
    }
    if ($j === 1)
    {
        file_put_contents("./data_base/user", serialize($file));
        header('Location: modif_profile.php');
    }
    else
        header('Location: error.php');
}
else
    header('Location: error.php');
?>