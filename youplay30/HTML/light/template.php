
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>FLUX RSS</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googloeapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="<?= BASE_URL ?>/index">

                    <img src="<?= BASE_URL ?>/assets/img/logo.png" />
                </a>

            </div>

            <div class="right-div">
               <?php if(isset($_SESSION['connecte']) AND isset($_SESSION['id'])) 
                { ?>
                
                                
                <a href="<?= BASE_URL ?>/deconnexion" class='btn btn-info pull-right'>DECONNEXION</a>
                 <?php }else{?>
                <a href="<?= BASE_URL ?>/login" class='btn btn-info'>CONNEXION</a>
                <a href="<?= BASE_URL ?>/signIn" class='btn btn-info'>INSCRIPTION</a>
                <?php } ?>
                
                
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                           <?php if(isset($_SESSION['connecte']) AND isset($_SESSION['id'])) 
                            { ?>
                                
                                <li><a href='<?php echo BASE_URL; ?>/index' >Acceuil</a></li>  
                                <li><a href='<?php echo BASE_URL; ?>/flux' class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Les Flux<i class="fa fa-angle-down"></i></a>                     <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                   <?php 
                                        $requete = $bdd->query("SELECT * FROM flux");
//                                        $reponse = getFlux();
                                    while($reponse = $requete->fetch()){ ?>
                                    <li><a role="menuitem" tabindex="-1" href="index.php?p=flux&id=<?= $reponse['id_f']; ?>"><?= $reponse['titre'] ?></a></li>
                                     <?php } ?>
                                </ul>  
                            </li>

                                
                                
                                <li><a class='ppp' href='<?php echo BASE_URL; ?>/profil'>Profil</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
 <!-- fin du head -->
  <?php echo $content; ?>
     
           
   
  <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   &copy; Designed by : Chhuon Moni 
                </div>

            </div>
        </div>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-3.2.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>

 