<?php
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    session_start();
    if ($_POST['quantity'] > 0)
     {
        if ($_SESSION['panier'])
        {
            $i = 0;
            foreach ($_SESSION['panier'] as $key => $elem)
            {
                if ($elem['name'] == $_POST['name'])
                {
                    $_SESSION['panier'][$key]['quantity'] += $_POST['quantity'];
                    $i++;
                }
            }
            if ($i == 0)
                $_SESSION['panier'][] = array('name' => $_POST['name'], 'prix' => $_POST['prix'], 'quantity' => $_POST['quantity']);
        }
        else
            $_SESSION['panier'][] = array('name' => $_POST['name'], 'prix' => $_POST['prix'], 'quantity' => $_POST['quantity']);
    }
    else
       header('Location: error.php');
?>