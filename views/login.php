<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Westud" />
        <meta charset="utf-8">
        <title>Login | Westud'</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Henintsoa ANDRIAMAHADIMBY">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="h-100 d-flex align-items-center justify-content-center">
        <main class="col-md-4">
            <form action="index.php?action=login-check" method="POST" class="form-card">
                <h1>Connexion</h1>
                <div class="form-group">
                    <label>Nom:</label>
                    <input type="text" name="nom" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label>Num&eacute;ro d'&eacute;tudiant:</label>
                    <input type="int" name="numero" class="form-control" required>
                </div>
                <br>
                <input type="submit" name="submit" value="Connexion" class="btn btn-primary">
            </form>
        </main>
    </body>
</html>