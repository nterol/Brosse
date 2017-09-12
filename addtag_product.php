<?PHP
session_start();
header('Location: admin.php');
if ($_POST['submit'] === 'Taguer produit' && $_POST['name'] !== '' && $_POST['tag'] !== '' && $_SESSION['admin'] === 'YES')
{
    echo "<h1>test</h1>";
    if (file_exists("./data_base/product"))
    {
        $fd = fopen('./data_base/product', 'r+');
        $fd2 = fopen('./data_base/product_tag', 'r+');
	    if (flock($fd, LOCK_EX) && flock($fd2, LOCK_EX))
	    {
            $file = unserialize(file_get_contents("./data_base/product"));
            $file2 = unserialize(file_get_contents("./data_base/product_tag"));
            print_r($file2);
            $j = 0;
            foreach ($file as $elem)
            {
                if ($elem['name'] == $_POST['name'])
                    $j++;
            }
            if ($j > 0)
            {
                $j = 0;
                foreach ($file2 as $key => $elem)
                {
                    if ($key == $_POST['tag'])
                        $j++;
                }
                if ($j == 0)
                {
                    $file2[$_POST['tag']] = array($_POST['name']);
                }
                else
                {
                    $j = 0;
                    foreach ($file2[$_POST['tag']] as $elem2)
                    {
                        if ($elem2 == $_POST['name'])
                            $j++;
                    }
                    if ($j == 0)
                        $file2[$_POST['tag']][] = $_POST['name'];
                }
                print_r($file2);
                file_put_contents("./data_base/product", serialize($file));
                file_put_contents("./data_base/product_tag", serialize($file2));
                echo "OK\n";
            }
            else
                echo "ERROR\n";
            flock($fd, LOCK_UN);
            flock($fd2, LOCK_UN);
        }
        fclose($fd);
        fclose($fd2);
    }
}
else
    header('Location: error.php');
?>