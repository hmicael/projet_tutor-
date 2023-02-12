<?php ob_start(); ?>
<h1>Listes des taches: </h1>
<a class="btn btn-outline-primary" href="?action=add"><i class="fa-solid fa-plus"></i></a>
<div class="">
    <table class="mt-2 table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taches as $tache): ?>
                <tr>
                    <th scope="row"> <?= $tache->getId() ?> </th>
                    <td>
                        <?= $tache->getTitre() ?>
                        <?= $tache->getMatiere() ?>
                        <?= $tache->getDescription() ?>
                        <time><?= date('Y-m-d', strtotime($tache->getDate_d())) ?></time>
                        <?php
                        $toggleItem = '<i class="fa-solid fa-check"></i>';
                        $toggleClass = 'success';
                        if ($tache->getStatut() == 1) {
                            $toggleItem = '<i class="fa-solid fa-xmark"></i>';
                            $toggleClass = 'secondary';
                        }
                        ?>
                        <?= '<a href="?action=toggle&id=' . $tache->getId() .
                            '"class="btn btn-outline-' . $toggleClass . '">' .
                            $toggleItem .'</a>' ?>
                        <?= '<a href="?action=edit&id=' . $tache->getId() . '"class="btn btn-outline-warning">
                            <i class="fa-solid fa-pen-to-square"></i></a>' ?>
                        <?= '<a href="?action=delete&id=' . $tache->getId() . '"class="btn btn-outline-danger">
                            <i class="fa-solid fa-trash"></i></a>' ?>
                    </td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>