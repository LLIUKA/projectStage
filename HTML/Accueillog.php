<?php

session_start();


require("../backend/config/commandes.php");
require("../backend/config/connexion.php");
//redirection des utilisateur selon si il sont admin ou pas 0 = user 1= admin
if(isset($_SESSION['email']))
{
  if($_SESSION['type'] == '0'){
    echo "bien connecté";
  }else{
    echo "ereur de connection ";
  }
  if($_SESSION['type'] == '1'){
    header("location:admin/index.php");
  
}
}

//variable produit qui apelle la fonction afficher
$Produits=afficher();



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/styleaccueil.css">
    <script src="https://kit.fontawesome.com/259f41835c.js" crossorigin="anonymous"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    <title>Accueil</title>
    <p>Bonjour <?php echo $_SESSION['nom']?>!</p>
</head>
<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <section id="navbar ">

      <div class="container ">
        <nav id="navbarotop" class="navbar fixed-top navbar-expand-lg navbar-expand-md navbar-expand-sm">
          <div class="navbar-nav">
            <ul class="navbar-nav"  id="navbarnav">
              <li class="nav-item" id="navitem">
                <a class="nav-link active" aria-current="page" href="#" id="accueilbouton"><h5>Accueil</h5></a>
              </li>
              <li class="nav-item dropdown;" id="navitem">
                <a class="nav-link dropdown" id="nav-linkdropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><h5>
                  Textiles</h5></a>
                <ul class="dropdown-menu" id="dropdownmenu">
                  <h2>NOTRE OFFRE TEXTILE</h2>
                  <li>
                    <div class="col-lg-2">
                      <div class="card shadow-sm" id="cardshadow1">
                        <img src="image3.jpeg" class="card-img-top" alt="...">
                        <div class="card-body text-bg">
                          <a href="#"><h5 class="card-title"><i class="fa-solid fa-shirt"></i> Nouveautés</h5></a>
                        </div>
                      </div>
                    </div>         
                    <div class="col-lg-2">
                      <div class="card shadow-sm"  id="cardshadow2">
                        <img src="image4.jpeg" class="card-img-top" alt="...">
                        <div class="card-body text-bg"> 
                          <a href="#"><h5 class="card-title"><i class="fa-solid fa-shirt"></i> Déstockage</h5></a>
                        </div>
                      </div>
                    </div>         
                    <div class="col-lg-2">
                      <div class="card shadow-sm" id="cardshadow3">
                        <img src="image5.jpeg" class="card-img-top" alt="...">
                        <div class="card-body text-bg">
                          <a href="#"><h5 class="card-title"><i class="fa-solid fa-shirt"></i> Promotions</h5></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="card shadow-sm"  id="cardshadow4">
                        <img src="image10.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <ul>
                            <a href="#"><li><p>T-Shirts Enfants</p></li></a>
                            <a href="#"><li><p>Polos Enfants</p></li></a>
                            <a href="#"><li><p>Sweat-Shirts Enfants</p></li></a>
                            <a href="#"><li><p>Vestes Enfants</p></li></a>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="card shadow-sm" id="cardshadow5">
                        <img src="image11.png" class="card-img-top" alt="...">
                        <div class="card-body" >
                          <ul>
                            <a href="#"><li><p>T-Shirts Femmes</p></li></a>
                            <a href="#"><li><p>Polos Femmes</p></li></a>
                            <a href="#"><li><p>Sweat-Shirts Femmes</p></li></a>
                            <a href="#"><li><p>Vestes Femmes</p></li></a>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card shadow-sm" id="cardshadow6">
                          <img src="image12.png" class="card-img-top" alt="...">
                          <div class="card-body">
                            <ul>
                              <a href="#"><li><p>T-Shirts Hommes</p></li></a>
                              <a href="#"><li><p>Polos Hommes</p></li></a>
                              <a href="#"><li><p>Sweat-Shirts Hommes</p></li></a>
                              <a href="#"><li><p>Vestes Hommes</p></li></a>
                            </ul>
                          </div>
                        </div>
                    </div>
                  </li>
                  <li id="descriptif">
                    <div class="card-body col-lg-6">
                      <h6><p>Vous êtes un club de sport, une association, découvrez notre gamme, composés<br> de gammes complètes avec des offres groupés pour des opérations réussies !</p></h6>
                    </div>
                    <div class="col-lg-6" id="cardshadow7">
                      <div class="card shadow-sm">
                        <a href="#" id="survolcard7" alt="..."><img src="image15.jpg"  class="card-img-top" alt="..."></a>
                        <div class="card-body">
                          <h4>Offre clubs de sport</h4>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
             </li>
             <li class="nav-item" id="navitem">
                <div class="dropdown">
                  <a class="nav-link  btn btn dropdown" id="moncompte" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <h5><i class="fa-regular fa-user"></i> Mon Compte<p>Bonjour <?php echo $_SESSION['nom']?>!</p></h5>
                  </a>
                  <ul id="menumoncompte" class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Se Connecter</a></li>
                    <li><a class="dropdown-item" href="formulaireinscription.php">Inscription</a></li>
                    <li><a href="deco.php"><button method="post" class=btn-danger name="deconnexion">deconnexion</button</a></li>
                  </ul>
                </div>
              <li class="nav-item" id="navitem">
                <a href="#" id="monpanier" class="nav-link">
                  <h5>
                    <i class="fa-solid fa-bag-shopping"></i>
                  </h5>
                </a>
              </li>
              <li class="nav-item nav-item-expand-lg nav-item-expand-md nav-item-expand-sm">
                <div class="input-group mb-3" id="searchbar">
                  <span class="input-group-text" id="basic-addon1"><a href="#"><h4><i id="loupe" class="fa-solid fa-magnifying-glass"></i></h4></a>
                  <input type="text" class="form-control" placeholder="Rechercher..." aria-label="Username" aria-describedby="basic-addon1">
                  </span>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <section>
      <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" id="carouselitem" data-bs-interval="10000">
            <img src="image1.jpeg" class="img1" alt="...">
            <div class="carousel-caption d-none d-md-block" id="carousel-caption">
              <h1>DONNEZ VIE À<br> VOS IDÉES EN<br> QUELQUES<br> MINUTES</h1><br>
              <h5>Imprimez vos T-Shirts pour vous ou votre entreprise</h5><br>
              <a href="#"><button type="button" id="boutoncarousel" class="btn btn-lg"><strong><h5>ACHETEZ DÈS MAINTENANT <i class="fa-solid fa-arrow-right"></i></h5></strong></button></a>
            </div>
          </div>  
          <div class="carousel-item" id="carouselitem2" data-bs-interval="2000">
            <img src="image2.jpeg" class="img2" alt="...">
            <div class="carousel-caption d-none d-md-block" id="carousel-caption">
              <h1>DES T-SHIRTS<br> IMPRIMÉS<br> POUR<br> TOUS</h1><br>
              <h5>Imprimez vos T-Shirts pour vous ou votre entreprise</h5><br>
              <a href="#"></a><button type="button" id="boutoncarousel" class="btn btn-lg"><strong><h5>ACHETEZ DÈS MAINTENANT <i class="fa-solid fa-arrow-right"></i></h5></strong></button></a>
            </div>
          </div>
        </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section><br>
    <section>
      <div  id="categoriebouton" class="container">
            <div>
              <h1>Trouvez votre tenue OTOP</h1>
              <a href="#"><button type="button" class="btn btn-lg" id="bouton1">T-SHIRTS</button></a>
              <a href="#"><button type="button" class="btn btn-lg" id="bouton2">POLOS</button></a>
              <a href="#"><button type="button" class="btn btn-lg" id="bouton3">SWEAT-SHIRTS</button></a>
              <a href="#"><button type="button" class="btn btn-lg" id="bouton4">VESTES</button></a>
              <a href="#"><button type="button" class="btn btn-lg" id="bouton5">SOFTSELLS</button></a>
            </div>
      </div><br>
    </section>
    <section>
      <div class="container-fluid">
       <div   class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col">
            <div id="carddestockage" class="card shadow-sm">
              <img src="image3.jpeg" class="card-img-top" alt="...">
              <a href="#" class="btn btn-lg">DÉSTOCKAGE <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="col">
            <div id="carddestockage" class="card shadow-sm">
              <img src="image4.jpeg" class="card-img-top" alt="...">
              <a href="#" class="btn btn-lg">PROMOTIONS <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="col">
            <div id="carddestockage" class="card shadow-sm">
              <img src="image5.jpeg" class="card-img-top" alt="...">
              <a href="#" class="btn btn-lg">NOUVEAUTÉS <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
    </section><br><br>
    <section>
      <div class="container-fluid" id="icones">
        <h5><i class="fa-solid fa-earth-americas"></i> VENTE À TRAVERS LE MONDE</h5>
        <h5><i class="fa-solid fa-shirt"></i> TISSU QUALITÉ PREMIUM</h5>
        <h5><i class="fa-regular fa-heart"></i> SUPPORTER UNE BONNE CAUSE</h5>
        <h5><i class="fa-solid fa-credit-card"></i> SÉCURISÉ PAIEMENT EN LIGNE</h5>
      </div>
    </section>
    <section>
      <div>
        <div id="nouveau" class="col-lg-12">
          <img src="image20.png">
        </div>
        <div id="nouveaubouton">
          <a href="#"><button type="button" class="btn btn-lg"><strong>ACHETEZ DÈS MAINTENANT<i class="fa-solid fa-arrow-right"></i></strong></button></a>
        </div>
        <div class="col-lg-6">
          <div class="card shadow-sm" id="cardshadow8">
            <img src="" class="card-img-top" alt="...">
            <a href="#" class="btn btn-lg">NOUVEAUTÉS <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div id="titrepartenaire">
        <h2>ILS NOUS FONT CONFIANCE</h2>
      </div>
      <div id="partenaire">
        <h5><i class="fa-brands fa-spotify"></i> SPOTIFY</h5>
        <h5><i class="fa-brands fa-apple"></i> APPLE</h5>
        <h5><i class="fa-brands fa-amazon"></i> AMAZON</h5>
        <h5><i class="fa-brands fa-cc-visa"></i> VISA</h5>
        <h5><i class="fa-brands fa-paypal"></i> PAYPAL</h5><br>
      </div>
    </section>
    <section id="backgroundreseaux">
      <div id="titrereseaux">
        <h2>RETROUVEZ OTOP SUR LES RÉSEAUX</h2>
      </div>
      <div id="reseaux">
        <h5><i class="fa-brands fa-instagram"></i> INSTAGRAM</h5>
        <h5><i class="fa-brands fa-facebook"></i> FACEBOOK</h5>
        <h5><i class="fa-brands fa-tiktok"></i> TIKTOK</h5>
        <h5><i class="fa-brands fa-snapchat"></i> SNAPCHAT</h5>
        <h5><i class="fa-brands fa-threads"></i>THREADS</h5>
        <h5><i class="fa-brands fa-linkedin"></i> LINKEDIN</h5><br>
      </div>
    </section>

    
</body>
<footer id="footer">
  <div class="container text-center">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
      <div class="col" id="footer2">
        <a href="#"><img src="/HTML/OTOP-noir.png" id="logootop"></a><br><br>
        <ul>
          <li id="liste">contact@etre-otop.fr</li>
          <li id="liste">04 65 011 099</li>
          <li id="liste">Bât 9, Village des<br> solutions AFPA 60<br> Avenue Felix Gouin<br> 13800 ISTRES</li>
        </ul>
      </div>
      <div class="col" id="footer2">
        <h5>Navigation</h5>
        <ul>
          <a href="#"><li>Accueil</li></a>
          <a href="#"><li>Boutique</li></a>
          <a href="#"><li>Demande de devis</li></a>
          <a href="#"><li>Nous contacter</li></a>
        </ul>
      </div>
      <div class="col" id="footer2">
        <h5>Liens utiles</h5>
        <ul>
          <a href="#"><li>Mon compte</li></a>
          <a href="#"><li>Produits personnalisés</li></a>
          <a href="#"><li>Mention légales</li></a>
          <a href="#"><li>CGV</li></a>
        </ul>
      </div>
    </div>
  </div>
</footer>
</html>