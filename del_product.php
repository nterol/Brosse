<?PHP
session_start();
header('Location: admin.php');
if ($_POST['submit'] === 'Supprimer produit' && $_POST['name'] !== '' && $_SESSION['admin'] === 'YES')
{
    if (file_exists("./data_base/product") && file_exists("./data_base/product_tag"))
    {
        $fd = fopen('./data_base/product', 'r+');
	    $fd2 = fopen('./data_base/product_tag', 'r+');
        if (flock($fd, LOCK_EX) && flock($fd2, LOCK_EX))
	    {
            $file = unserialize(file_get_contents("./data_base/product"));
            $file2 = unserialize(file_get_contents("./data_base/product_tag"));
            $j = 0;
            foreach ($file as $i => $elem)
            {
                if ($elem['name'] == $_POST['name'])
                {
                    foreach ($file2 as $key => $elem2)
                    {
                        print_r($file2);
                        foreach ($file2[$key] as $d => $nom)
                        {
                            if ($nom == $_POST['name'])
                                unset ($file2[$key][$d]);
                        }
                    }
                    unset($file[$i]);
                    $j++;
                }
            }
            if ($j == 1)
            {
                file_put_contents("./data_base/product_tag", serialize($file2));
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