<?php ob_start(); ?>
<h1>Listes des taches: </h1>
<a class="btn btn-outline-primary" href="?action=add"><i class="fa-solid fa-plus"></i></a>

<div class="">
    <?php foreach ($taches as $tache): ?>
        <article class="mb-3 card">
            <div class="card-body">
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
                    <time><?= date('Y-m-d', strtotime($tache->getDate_d())) ?></time>
                </p>
            </div>
        </article>
    <?php endforeach; ?>    
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>