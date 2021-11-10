<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="public/img/cactus.png" alt="Cailloux">
    <link rel="stylesheet" href="public/css/style.css">
    <meta name="author" content="PERNOT Francis, ELAJI Aleaddine">
    <meta name="title" content="Un site plein de surprise">
    <meta name="description" content="Venez cher Le bon coin pour ...">
    <meta name="keywords" content="leboncoin, achat, vente, voiture, immobilier, console, jeux-vidéo, informatique, occasion, bonnes affaires">
</head>

<body>
    <nav id="Nav" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="public/img/cactus.png" alt="" width="30" height="24" class="d-inline-block align-text-top" alt="logo">
                Le bon coin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul id="navFx" class="navbar-nav me-auto col-md-12">
                    <li class="nav-item active col-md-4">
                        <form action="Php/newAnnonce.php">
                            <a class="navbar-brand" href="index.php?action=openNewAd">
                                Ajouter une annonce
                            </a>
                        </form>
                    </li>
                    <li class="nav-item active col-md-4">
                        <a class="navbar-brand" href="index.php?action=openNewCatergory">
                            Ajouter une catégorie (pour admin uniquement)
                        </a>
                    </li>
                    <li class="nav-item active col-md-4">
                        <form action="index.php" method="GET" id="logOut" class="d-flex">
                            <!-- <input type="submit" value="logout" name="action"> -->
                            <button type="submit" value="logout" name="action" class="btn btn-secondary">Se Déconnecter</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?= $content ?>
</body>

</html>