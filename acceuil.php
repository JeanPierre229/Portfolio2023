<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon PortFolio !</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="images/identite.png"/>
</head>
<style>
    li a{
        color: whitesmoke;
        text-decoration: none;
        font-size: 1.1em;
    }
    li a:active{
        color:black;
        text-decoration: underline;
    }
    #st-t{
        color: brown;
    }
</style>
<body class="bg-danger">
    <div class="navbar navbar-expand-lg mx-auto">
        <div class="container text-end">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="acceuil.php" class="nav-link text-white">ACCEUIL</a></li>
                    <li class="nav-item"><a href="reseaux.php" class="nav-link text-white">RESEAUX</a></li>
                    <li class="nav-item"><a href="quisuisje.php" class="nav-link text-white">QUI SUIS-JE ?</a></li>
                    <li class="nav-item"><a href="contacts.php" class="nav-link text-white">CONTACTS</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid col-12 col-md-6 ">
            <div class="row">
                <div>
                    <img class="mt-3" src="images/identite.png" alt="Ma photo en moitié">
                    <div class="col-12 text-center float-end col-md-6 col-lg-3">
                        <h1 class="text-white mt-5 display-1">PORTFOLIO</h1>
                        <p class="text-white mb-5 h1">SPECIALISTE EN DEVELOPPEMENT WEB ET MOBILE</p>
                        <img src="images/img-6-removebg-preview.png" alt="Un ornement simplement"/>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</body>
  <script src="js/bootstrap.js"></script>
</html>