<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Westud' application page" />
        <meta charset="utf-8">
        <title><?= $title ?> | Westud'</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= ROOT ?>">
                    <!-- <img src="<?= ROOT . '/westud.png' ?>" alt="Logo Westud'" width="150" height="75" class="d-inline-block align-text-top"> -->
                        Westud'
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="navbarsExample01" style="">
                        <ul class="navbar-nav me-auto mb-2">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= ROOT ?>">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT . '?action=param' ?>">Param&egrave;tre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT . '?action=deconnect' ?>">Deconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container mt-3">
            <?= $content ?>
        </main>
        <footer>
            <!-- Footer -->
            <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-instagram"></i
                ></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-linkedin-in"></i
                ></a>
                </section>
                <!-- Section: Social media -->                
                <!-- Section: Text -->
                <section class="mb-4">
                <p>
                    Nous résolvons des problèmes d’organisation des étudiants pour leurs activités scolaires en leur
                    proposant une plateforme de gestion des tâches qui le relancera pour les achever
                </p>
                <p>
                    <a href="https://forms.gle/7EgJBztQU7LBTXuJA">Aidez-nous à améliorer notre application</a>
                </p>
                </section>
                
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright: Westud'
            </div>
            <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </footer>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"
            ></script>
        <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" 
            integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>    
        <script src="script.js"></script>
    </body>
</html>