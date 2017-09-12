<?PHP
function install()
{
    if (!file_exists("./data_base"))
        mkdir("./data_base");
    if (!file_exists("./data_base/user"))
    {
        file_put_contents("./data_base/user", 'a:9:{i:0;a:3:{s:5:"login";s:5:"admin";s:6:"passwd";s:128:"8b1bcbffc7fe37c032da653b8c595debbbdf35b3d9971cf1a05c113686f8206f4f5d5926bea308545c6c32add212ab66852823cbe73f57d693ee5c5f85900817";s:5:"admin";i:1;}i:1;a:3:{s:5:"login";s:6:"julfou";s:6:"passwd";s:128:"22fb46e1955a8aeb31c59d79d887d02af2d1bc4524e85aafa2455cc78bc0147b10dd477201d147e2f5ca910bb43d982320478b9d179ddde85f4806497fe2ee68";s:5:"admin";i:0;}i:2;a:3:{s:5:"login";s:6:"nterol";s:6:"passwd";s:128:"959bcd75889792ebe92202f95384ec300fbc59f6189e86f2175c5ce27832a5bcabbd9c5593c0227d947bd379d517a743d887bea9ebf264b1dd889982d3a57825";s:5:"admin";i:1;}i:3;a:3:{s:5:"login";s:6:"gerard";s:6:"passwd";s:128:"a164ef65b73a9cec4f99ddd4d80c74748a59b83397590c5d6875e52e208c6a1066f8317e05132f9de12bad7badeeb1ff4e122bc1182f5ebaa7bdded1fb3939a8";s:5:"admin";i:0;}i:4;a:3:{s:5:"login";s:12:"jean-jacques";s:6:"passwd";s:128:"ab3c176f79f28bf7c1651f693c183f1f863e2b39f61365a68526fc615c9baed6115e44dcc7465518ea3bbab30db0afcf20983d04cfa1da1d52ef6cd75c3b2260";s:5:"admin";i:0;}i:5;a:3:{s:5:"login";s:5:"Julie";s:6:"passwd";s:128:"65bea32e3aedfa50ae493f9e9ab58c281630516c257959bf5e2157ac4854dc9c60854cf0564a06823403cb9c59506b7105cd80ae4ab8b744e8c5ed01c00001bf";s:5:"admin";i:0;}i:6;a:3:{s:5:"login";s:6:"Martin";s:6:"passwd";s:128:"a7014bfd63204895e30c27cab3a7c9759baa255554432a33b0c1f27c6e293c2bf8214d5f58465b4d49f31212adcb9b9475df0a5f5221d2a3e8757f144c632301";s:5:"admin";i:0;}i:7;a:3:{s:5:"login";s:8:"michelle";s:6:"passwd";s:128:"2662a3c71dbf902fbec15d46139bd6d725991789c570f598743eb2d06ae02e6c79e7187487da2fd5cf69f90551110b16c46a2314960fc2386b340732bf931ad7";s:5:"admin";i:0;}i:8;a:3:{s:5:"login";s:5:"miche";s:6:"passwd";s:128:"53d39a99397698c93e67b02cdefe799d24dcfb4eab0ba343a556791c940fb9996feb59a5d0107ca3ae01b1dd0bc1c2f511a578c56aac9bd14915fc902921af4b";s:5:"admin";i:0;}}');
    }
    if (!file_exists("./data_base/product"))
    {
        file_put_contents("./data_base/product", serialize(array(array('name' => 'Balai yet', 'prix' => 2, 'url' => 'http://st2.setin.fr/upload/image/ensemble-pelle---balayette-image-83693-grande.jpg')
        , array('name' => 'Balais jardinage', 'prix' => 52, 'url' => 'http://www.bricorama.fr/media/catalog/product/5/6/566296-1.jpg')
        , array('name' => 'Machine dans les rues', 'prix' => 45, 'url' => 'http://www.ausa.com/wp-content/uploads/2013/02/AUSA-in-jordania2.jpg')
        , array('name' => 'Balais à chiotte', 'prix' => 2, 'url' => 'https://www.leroymerlin.fr/multimedia/174397010/produits/pot-a-balai-wc-sweet-blanc.jpg')
        , array('name' => 'Balais brosse', 'prix' => 78, 'url' => 'http://www.canac.ca/upload/public/ImageCatalogue/5453202022/103807-1-BALAI-BROSSE.jpg')
        , array('name' => 'Brosse à dents', 'prix' => 96, 'url' => 'http://sarakha63-domotique.fr/wp-content/uploads/2017/04/5195_fluocaril_complete_brosse_a_dents_souple.jpg')
        , array('name' => 'Brosse à cheveux', 'prix' => 1, 'url' => 'http://scrat.hellocoton.fr/img/classic/tu-te-laverais-les-dents-avec-une-brosse-a-dents-sale-pour-les-cheveux-c-est-pareil-4152170.jpg')
        , array('name' => 'Coupe en brosse', 'prix' => 1, 'url' => 'http://images.pausecafein.fr/images/cafein/2016/02/coupes-cheveux/desireless2.jpg')
        , array('name' => 'Super smash brosse', 'prix' => 32, 'url' => 'http://www.culture-games.com/wp-content/uploads/critiques/super-smash-bros-wiiu-critique-003.jpg')
        , array('name' => 'Balais couilles', 'prix' => 250, 'url' => 'https://pbs.twimg.com/media/CEFuvmJWMAAFr7g.jpg')
        , array('name' => 'Balais voiture', 'prix' => 552, 'url' => 'http://sf1.viepratique.fr/wp-content/uploads/sites/9/2016/04/27-1.jpg')
        , array('name' => 'Papi Brosse-ard', 'prix' => 987, 'url' => 'https://upload.wikimedia.org/wikipedia/commons/8/89/Papy_Brossard.jpg')
        , array('name' => 'Un pitit geranium', 'prix' => 500, 'url' => 'http://jardinage.lemonde.fr/images/dossiers/historique/geranium-141220.jpg'))));
    }
    if (!file_exists("./data_base/product_tag"))
    {
        file_put_contents("./data_base/product_tag", serialize(array('Automatique' => array('Machine dans les rues', 'Balais voiture', 'Super smash brosse')
        , 'Manuel' => array('Balais jardinage', 'Balai yet', 'Balais à chiotte', 'Balais brosse', 'Brosse à dents', 'Brosse à cheveux')
        , 'Brosse' => array('Balais brosse', 'Brosse à dents', 'Brosse à cheveux', 'Papi Brosse-ard', 'Super smash brosse', 'Coupe en brosse')
        , 'Balais' => array('Balais jardinage', 'Balai yet', 'Balais à chiotte', 'Balais brosse', 'Balais voiture', 'Balais couilles'))));
    }
    if (!file_exists("./data_base/order"))
    {
        file_put_contents("./data_base/order", 'a:5:{i:2;a:2:{s:5:"login";s:6:"gerard";s:6:"panier";a:2:{i:0;a:3:{s:4:"name";s:13:"Balais brosse";s:4:"prix";s:2:"78";s:8:"quantity";s:1:"2";}i:1;a:3:{s:4:"name";s:14:"Balais voiture";s:4:"prix";s:3:"552";s:8:"quantity";s:1:"5";}}}i:3;a:2:{s:5:"login";s:5:"Julie";s:6:"panier";a:1:{i:0;a:3:{s:4:"name";s:17:"Un pitit geranium";s:4:"prix";s:3:"500";s:8:"quantity";s:1:"5";}}}i:4;a:2:{s:5:"login";s:12:"jean-jacques";s:6:"panier";a:3:{i:0;a:3:{s:4:"name";s:16:"Balais jardinage";s:4:"prix";s:2:"52";s:8:"quantity";s:1:"5";}i:1;a:3:{s:4:"name";s:17:"Un pitit geranium";s:4:"prix";s:3:"500";s:8:"quantity";s:1:"4";}i:2;a:3:{s:4:"name";s:15:"Brosse à dents";s:4:"prix";s:2:"96";s:8:"quantity";s:1:"8";}}}i:5;a:2:{s:5:"login";s:6:"Martin";s:6:"panier";a:1:{i:0;a:3:{s:4:"name";s:17:"Un pitit geranium";s:4:"prix";s:3:"500";s:8:"quantity";s:1:"4";}}}i:6;a:2:{s:5:"login";s:5:"miche";s:6:"panier";a:2:{i:0;a:3:{s:4:"name";s:17:"Balais à chiotte";s:4:"prix";s:1:"2";s:8:"quantity";s:1:"5";}i:1;a:3:{s:4:"name";s:13:"Balais brosse";s:4:"prix";s:2:"78";s:8:"quantity";s:1:"1";}}}}');
    }
}
?>