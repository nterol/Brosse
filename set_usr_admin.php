<?PHP
session_start();
if ($_POST['login'] !== '' && $_SESSION['admin']==='YES')
{
    if (file_exists("./data_base/user"))
    {
        $file = unserialize(file_get_contents("./data_base/user"));
        $j = 0;
        foreach ($file as $i => $elem)
        {
            if ($elem['login'] == $_POST['login'])
            {
                if ($_POST['submit'] === 'Mettre utilisateur admin' && $file[$i]['admin'] == 0)
                    $file[$i]['admin'] = 1;
                else if ($_POST['submit'] === 'Mettre utilisateur en non-admin' && $file[$i]['admin'] == 1)
                    $file[$i]['admin'] = 0;
            }
        }
        file_put_contents("./data_base/user", serialize($file));
        header('Location: admin.php');
    }
}
else
    header('Location: error.php');
?>