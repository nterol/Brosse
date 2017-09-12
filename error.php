<?php
session_start();
include "install.php"
?>
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
            <h1 class="connexion" id="mabite" style="text-align: center; margin-bottom: 10%;">Error</h1><br />
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