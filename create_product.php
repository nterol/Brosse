<?PHP
session_start();
header('Location: admin.php');
if ($_POST['submit'] === 'Créer le produit' && $_POST['name'] !== '' && $_POST['url'] !== '' && $_POST['price'] !== '' && $_POST['price'] > 0 && $_SESSION['admin'] === 'YES')
{
    if (file_exists("./data_base/product"))
    {
        $fd = fopen('./data_base/product', 'r+');
	    if (flock($fd, LOCK_EX))
	    {
            $file = unserialize(file_get_contents("./data_base/product"));
            $new_prod = array("name" => $_POST['name'], "prix" => $_POST['price'], "url" => $_POST['url']);
            $j = 0;
            foreach ($file as $elem)
            {
                if ($elem['name'] == $_POST['name'])
                    $j++;
            }
            if ($j == 0)
            {
                $file[] = $new_prod;
                file_put_contents("./data_base/product", serialize($file));
                echo "OK\n";
            }
            else
                header('Location: error.php');
            flock($fd, LOCK_UN);
        }
        fclose($fd);
    }
}
else
    header('Location: error.php');
?>