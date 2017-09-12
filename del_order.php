<?php
    header('Location: admin_order.php');
    $fd = fopen('./data_base/order', 'r+');
    if (flock($fd, LOCK_EX))
    {
       $file = unserialize(file_get_contents("./data_base/order"));
       $i = 0;
       foreach($file as $key => $elem)
       {
           if ($elem['login'] === $_POST['login'])
                unset($file[$key]);
       }
       file_put_contents("./data_base/order", serialize($file));
        flock($fd, LOCK_UN);
    }
    fclose($fd);
?>