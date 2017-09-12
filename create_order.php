<?PHP
    session_start();
    header('Location: index.php');
    if ($_POST['submit'] === 'Valider la commande' && $_SESSION['panier'] && $_SESSION['logged_on_user'] != '')
    {
        if (file_exists("./data_base/order"))
        {
            $fd = fopen('./data_base/order', 'r+');
            if (flock($fd, LOCK_EX))
            {
                $file = unserialize(file_get_contents("./data_base/order"));
                $new_prod = array("login" => $_SESSION['logged_on_user'], "panier" => $_SESSION['panier']);
                $file[] = $new_prod;
                file_put_contents("./data_base/order", serialize($file));
                flock($fd, LOCK_UN);
            }
            fclose($fd);
        }
        $_SESSION['panier'] = '';
    }
    else
        header('Location: error.php');
?>