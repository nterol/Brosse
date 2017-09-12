<?PHP
session_start();
header('Location: admin.php');
if ($_POST['submit'] === 'Supprimer tag' && $_POST['tag'] !== '' && $_SESSION['admin'] === 'YES')
{
    if (file_exists("./data_base/product"))
    {
        $fd = fopen('./data_base/product_tag', 'r+');
	    if (flock($fd, LOCK_EX))
	    {
            $file = unserialize(file_get_contents("./data_base/product_tag"));
            $j = 0;
            foreach ($file as $key => $elem)
            {
                if ($key == $_POST['tag'])
                {
                    unset($file[$key]);
                    $j++;
                }
            }
            if ($j <= 0)
                file_put_contents("./data_base/product_tag", serialize($file));
            flock($fd, LOCK_UN);
        }
        fclose($fd);
    }
}
else
    header('Location: error.php');
?>