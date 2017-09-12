<?PHP
header('Location: index.php');
if ($_POST['submit'] === 'Créer le compte' && $_POST['login'] !== '' && $_POST['passwd'] !== '')
{
    if (file_exists("./data_base/user"))
    {
        $file = unserialize(file_get_contents("./data_base/user"));
        $new_acc = array("login" => $_POST['login'], "passwd" => hash("whirlpool", $_POST['passwd']), 'admin' => 0);
        $j = 0;
        foreach ($file as $elem)
        {
            if ($elem['login'] == $_POST['login'])
                $j++;
        }
        if ($j == 0)
        {
            $file[] = $new_acc;
            file_put_contents("./data_base/user", serialize($file));
            echo "OK\n";
        }
        else
            header('Location: error.php');
    }
}
else
    header('Location: error.php');
?>