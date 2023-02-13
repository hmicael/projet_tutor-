<?php ob_start(); ?>
<!-- BEGIN: Notification -->
<section id="alert_notif" class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Il vous reste <?= count($undoneTasks) ?> t&acirc;ches non faites !
    <article id="alert_notif_msg"></article>
    <button id="alert_notif_close" type="button" class="btn-close" aria-label="Close"></button>
</section>
<!-- END: Notification -->
<h1 class="mt-4 mb-2 col-sm-12">
    <span class="mt-1 text-muted btn-align">Listes des taches</span>
    <div class="float-sm-end">
      <a href="?action=add" class="btn btn-outline-secondary align-middle mt-1"><i class="fa-solid fa-plus"></i></a>
    </div>
</h1>
<!-- END: Section -->
<section>
    <?php foreach ($taches as $tache): ?>
        <article class="mb-3 card">
            <div class="card-body <?= $tache->getStatut() == 1 ? 'tdone' : '' ?>">
                <!-- BEGIN: Dropdown button -->
                <?php
                $toggleItem = '<i class="fa-solid fa-check"></i>';
                $toggleClass = 'success';
                if ($tache->getStatut() == 1) {
                    $toggleItem = '<i class="fa-solid fa-xmark"></i>';
                    $toggleClass = 'secondary';
                }
                ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <div class="btn-group btn-group-sm">
                        <?= '<a href="?action=toggle&id=' . $tache->getId() .
                            '"class="btn btn-sm btn-outline-' . $toggleClass . '">' .
                            $toggleItem .'</a>' ?>
                        <?= '<button type="button" class="btn btn-outline-' .  $toggleClass .' dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>' ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="mb-2">
                                <?= '<a href="?action=edit&id=' . $tache->getId() . '"class="btn btn-sm btn-outline-warning">
                                    <i class="fa-solid fa-pen-to-square"></i></a>' ?>
                            </li>
                            <li class="mb-2">
                                <?= '<a href="?action=delete&id=' . $tache->getId() . '"class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i></a>' ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Dropdown button -->
                <hr>
                <h2 class="card-title">
                    <?= $tache->getTitre() ?>
                </h2>
                <h3 class="card-subtitle mb-2 text-muted"><?= $tache->getMatiere() ?><br></h3>
                <p class="card-text">
                    <?= $tache->getDescription() ?><br>
                    <time><?= $tache->getDate_d() ?></time>
                </p>
            </div>
        </article>
    <?php endforeach; ?>   
    <aside id="notif_msg" class="text-center bg-danger rounded">
        <p>
            <i class="fa-solid fa-triangle-exclamation"></i>
            Il vous reste <?= count($undoneTasks) ?> t&acirc;ches non faites !  
        </p>
        <div class="d-none" id="undoneTasks">
            <?php foreach ($undoneTasks as $tache) {
                echo nl2br('- '. $tache->getTitre() . " pour le " . $tache->getDate_d() . "\n");
            }?>
        </div>
    </aside> 
</section>
<!-- END: Section -->
<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>