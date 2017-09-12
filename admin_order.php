<html>

<head>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="admin.css">
    <meta charset="utf-8">
    <title>brosse.</title>
</head>
<body>
<div class="all">
    <div class="navbar">
        <a href='menu.php'>
            <div id="title">
                <h1>brosse.</h1>
            </div>
        </a>
        <a href="index.php">
            <div class="produit">
                <h3>Nos Produits</h3>
            </div>
        </a>

        <div class="categories">
            <h3>Catégories</h3>
            <div class="overlay_menu">
                <?php
                if (file_exists("./data_base/product_tag"))
                {
                        $fd = fopen('./data_base/product_tag', 'r+');
                        if (flock($fd, LOCK_EX))
                        {
                            $file = unserialize(file_get_contents("./data_base/product_tag"));
                                            $j = 0;
                            foreach ($file as $key => $elem)
                            {
                                echo '<div class="sous-cat">
                                            <a href="index.php?categorie='.$key.'">
                                                '.$key.'  
                                            </a>
                                    </div>';
                                    $j++;
                            }
                            if ($j == 0)
                            {
                                echo '<span style="text-align:center;"> No categorie</span>';
                            }
                            flock($fd, LOCK_UN);
                        }
                        fclose($fd);
                    }
                else
                    install();

                ?>
                
            </div>
        </div>
        <a href="panier_page.php">
            <div class="panier_menu">
                <h3>Panier</h3>
            </div>
        </a> 
        <div class="connexion"><h3>
            <?php
         if ($_SESSION['logged_on_user'] == '')
            echo '<a href="login_page.php">Connexion</a>';
         else {
             echo '<a href="modif_profile.php"><span class="login">'.$_SESSION['logged_on_user'].'</span></a><div class="overlay_user"><a href="logout.php"><div class="sous-user">Logout</div></a>';
             if ($_SESSION['admin'] == 'YES')
                 echo '<a href="admin.php"><div class="sous-user">Administration</div></a></div>';
         }
         ?>
            </h3>
        </div>
    </div>
    <div id="container">
        <div class="content">
<div class="admin_option">

   <?php
    $fd = fopen('./data_base/order', 'r+');
    if (flock($fd, LOCK_EX))
    {
       $file = unserialize(file_get_contents("./data_base/order"));
       $i = 0;
       foreach($file as $elem)
       {
           $total = 0;
           echo '<div id="commande"><span id="mabite">Commande de '.$elem['login'].'</span><br />';
           echo "<form action='del_order.php' method='post'><input type=hidden name=login value=".$elem['login']."><input type=submit name=submit value='x'></form><br />";
           foreach ($elem['panier'] as $elem2)
           {
                echo '<span id="mabite">
                <b>NOM: '.$elem2['name'].'</b>
                <br />Quantité: '.$elem2['quantity'].' x '.$elem2['prix'].'$            <b>'.$elem2['quantity']*$elem2['prix'].'$</b></span><br />';
                $total += $elem2['quantity']*$elem2['prix'];
           }
           echo '<span id="mabite"><b>'.$total.' $</b></span> </div>';
            $i++;
        }
       if ($i == 0)
            echo '<span id="mabite">Pas de commandes</span>';
        file_put_contents("./data_base/order", serialize($file));
        flock($fd, LOCK_UN);
    }
    fclose($fd);
?>
            </div>
</div>
    </div>
         <div class="footer">
     <span class="footer">Un site fait avec </span>
     <div class="love_img">
     <img src="img/love.png" id="love"><span>Afanneau et Nterol</span>
     </div>
     </div>
</html>