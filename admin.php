<?PHP
    session_start();
    if ($_SESSION['admin'] !== 'YES')
    {
        header("HTTP/1.1 401 Unauthorized");
        header('Location: error.php');
    }
?>
    <html>

    <head>
        <link rel="stylesheet" href="menu.css">
        <link rel="stylesheet" href="admin.css">
        <meta charset='UTF-8'>
    </head>

    <body>
        <title>brosse.</title>
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
                <div class="connexion">
                    <h3>
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
                    <h1 class="connexion" id="mabite" style="text-align: center">Administration</h1><br />
     
                       <form action="create_product.php" method="post">
                         <input name='name' placeholder='Produit..'value=''>
                        <br />  <input type="number" placeholder='Prix..' name='price' value=''>
                        <br />  <input name='url' type='url' 
                        placeholder="Url de l'image.." value=''>
                        <input type='submit' name='submit' value='Créer le produit'>
                    </form>
                    <form action="addtag_product.php" method="post">
                         <input name='name'placeholder='Produit à taguer..' value=''>
                        <br />  <input name='tag' placeholder='Tag..' value=''>
                        <input type='submit' name='submit' value='Taguer produit'>
                    </form>
  
   
                    <form action="deltag_product.php" method="post">
                         <input name='tag' placeholder='Nom du tag..' value=''>
                        <input type='submit' name='submit' value='Supprimer tag'>
                    </form>
  
                    <form action="del_product.php" method="post">
                         <input name='name' placeholder='Nom du produit..' value=''>
                        <input type='submit' name='submit' value='Supprimer produit'>
                    </form>
 
   
                    <form action="set_usr_admin.php" method="post">
                         <input name='login' placeholder="Login de l'utilisateur.." value=''>
                        <br />
                        <input type='submit' name='submit' value='Mettre utilisateur admin'>
                        <input type='submit' name='submit' value='Mettre utilisateur en non-admin'>
                    </form>
  
   
                    <form action="del_usr.php" method="post">
                         <input name='login' placeholder="Login de l'utilisateur.." value=''>
                        <br />
                        <input type='submit' name='submit' value='Supprimer utilisateur'>
                    </form>
   
                    <form action="admin_order.php" method="post">
                        <input type='submit' name='submit' value='Gestion des commandes'>
                    </form>
                    </div>
                     </div>
    </div>
         <div class="footer">
     <span class="footer">Un site fait avec </span>
     <div class="love_img">
     <img src="img/love.png" id="love"><span>Afanneau et Nterol</span>
     </div>
     </div>
    </body>

    </html>