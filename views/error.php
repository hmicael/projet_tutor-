<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Westud' application page" />
        <meta charset="utf-8">
        <title>Westud' | Error</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body class="row justify-content-center align-middle text-muted display-1">
        <?= $e->getMessage() ?>
    </body>
</html>