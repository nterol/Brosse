<?PHP
header('Location: index.php');
session_start();
    function auth($login, $passwd)
    {
    if ($login !== '' && $passwd !== '')
    {
        $file = unserialize(file_get_contents("./data_base/user"));
        $pw_h = hash("whirlpool", $passwd);
        $j = 0;
        foreach ($file as $elem)
        {
            if ($elem['login'] === $login && $pw_h === $elem['passwd'])
                $j++;
            if ($elem['login'] === $login && $pw_h === $elem['passwd'] && $elem['admin'] === 1)
                $j++;
        }
        return $j;
    }
    else
        header('Location: error.php');
    }
    if (auth($_POST['login'], $_POST['passwd']) === 1)
    {
        $_SESSION['logged_on_user'] = $_POST['login'];
        echo "OK\n";
    }
    else if (auth($_POST['login'], $_POST['passwd']) === 2)
    {
        $_SESSION['logged_on_user'] = $_POST['login'];
        $_SESSION['admin'] = 'YES';
        echo "OK\n";
    }
    else
    {
        $_SESSION['logged_on_user'] = '';
        header('Location: error.php');
    }
?>