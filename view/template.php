<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"   integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="public/css/style.css">
    </head>

    <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top" alt="logo">
                Le bon coin
            </a>
            <a class="navbar-brand" href="index.php?action=openNewAd">
                Ajouter une annonce
            </a>
            <a class="navbar-brand" href="index.php?action=openNewCatergory">
                Ajouter une catégorie (pour admin uniquement)
            </a>
            <form action="index.php" method="GET">
                <input type="submit" value="logout" name="action">
            </form>
        </div>
    </nav>
        <?= $content ?>
    </body>
</html>