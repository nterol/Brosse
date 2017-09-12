<?php
session_start();
include 'install.php';
?>
<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="menu.css">
        <link rel="stylesheet" href="index.css">
    <meta charset="utf-8">
    <title>brosse.</title>
</head>
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
     <div  class="content">

 <?PHP            
            if (file_exists("./data_base/product"))
            {
                if ($_GET['categorie']=='')
                {
                    $fd = fopen('./data_base/product', 'r+');
                    if (flock($fd, LOCK_EX))
                    {
                        $file = unserialize(file_get_contents("./data_base/product"));
                                        $j = 0;
                        foreach ($file as $elem)
                        {
                                //$_POST['name'] = $elem['name'];
                                //$_POST['price'] = $elem['price'];
                            echo '<div class="card">
                                    <img src="'.$elem['url'].'" class="image">
                                    <div class="overlay">
                                        <div class="nom-produit">'.$elem['name'].'</div>
                                        <div class="line"></div>
                                        <br />
                                        <div class="price">'.$elem['prix'].'$</div>
                                        <br />
                                        <div class="panier">
                                            <form action="add_panier.php" method="post">
                                                <input type="number" name="quantity" value="">
                                                <input type="hidden" name="name" value="'.$elem['name'].'">
                                                <input type="hidden" name="prix" value="'.$elem['prix'].'">
                                                </br>
                                                <input type="submit" name="submit" value="Ajouter au panier">
                                            </form>
                                        </div>
                                        </div>
                                    </div>';
                                $j++;
                        }
                        if ($j == 0)
                        {
                            echo '<span style="text-align:center;"> No product</span>';
                        }
                        flock($fd, LOCK_UN);
                    }
                    fclose($fd);
                }
                else
                {
                    $fd = fopen('./data_base/product', 'r+');
                    $fd2 = fopen('./data_base/product_tag', 'r+');
                    if (flock($fd, LOCK_EX) && flock($fd, LOCK_EX))
                    {
                        $file = unserialize(file_get_contents("./data_base/product"));
                        $file2 = unserialize(file_get_contents("./data_base/product_tag"));
                        $j = 0;
                        foreach ($file2[$_GET['categorie']] as $elem)
                        {
                            foreach ($file as $elem2)
                            {
                                if ($elem2['name'] == $elem)
                                {
                                    echo '<div class="card">
                                    <img src="'.$elem2['url'].'" class="image">
                                    <div class="overlay">
                                        <div class="nom-produit">'.$elem2['name'].'</div>
                                        <div class="line"></div>
                                        <br />
                                        <div class="price">'.$elem2['prix'].'$</div>
                                        <br />
                                        <div class="panier">
                                            <form action="add_panier.php" method="post">
                                                <input type="number" name="quantity" value="">
                                                <input type="hidden" name="name" value="'.$elem2['name'].'">
                                                <input type="hidden" name="prix" value="'.$elem2['prix'].'">
                                                </br>
                                                <input type="submit" name="submit" value="Ajouter au panier">
                                            </form>
                                        </div>
                                        </div>
                                    </div>';
                                    $j++;
                                }
                            }
                        }
                        if ($j == 0)
                        {
                            echo '<div id="lastchiasse"><span style="text-align:center;"> No product</span></div>';
                        }
                        flock($fd, LOCK_UN);
                        flock($fd2, LOCK_UN);
                    }
                    fclose($fd);
                    fclose($fd2);
                }
            }
         ?>
     </div>

 </div>
 <div class="footer">
     <span class="footer">Un site fait avec </span>
     <div class="love_img">
     <img src="img/love.png" id="love"><span>Afanneau et Nterol</span>
     </div>
     </div>
</html>
