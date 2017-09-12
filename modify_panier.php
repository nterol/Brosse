<?php
session_start();
header('Location: panier_page.php');
if ($_SESSION['panier'] != '' && $_POST['name']!= '' && ($_POST['submit'] === '+' || $_POST['submit'] === '-' || $_POST['submit'] === 'x'))
{
    $i = 0;
    foreach ($_SESSION['panier'] as $key1 => $elem1)
    {
        if ($elem1['name'] == $_POST['name'])
        {
            if ($_POST['submit'] === 'x' || ($elem1['quantity'] == 1 && $_POST['submit'] === '-'))
            {
                unset($_SESSION['panier'][$key1]);
                $i--;
            }
            else if ($_POST['submit'] === '+')
            {
                $_SESSION['panier'][$key1]['quantity'] += 1;
            }
            else if ($_POST['submit'] === '-')
                $_SESSION['panier'][$key1]['quantity'] -= 1;
        }
        $i++;
    }
    if ($i <= 0)
        $_SESSION['panier'] = '';
}
else
    header('Location: error.php');
?>