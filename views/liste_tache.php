<?php $title = 'Taches'; ?>

<?php ob_start(); ?>
<h1>Listes des taches: </h1>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Matiere</th>
            <th>Description</th>
            <th>Date</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($taches as $tache): ?>
            <tr>
                <td> <?= $tache->getId() ?> </td>
                <td> <?= $tache->getTitre() ?> </td>
                <td> <?= $tache->getMatiere() ?> </td>
                <td> <?= $tache->getDescription() ?> </td>
                <td> <?= $tache->getDate_d() ?> </td>
                <td> <?= $tache->getStatut() ?> </td>
                <td>
                    <?= '<a href="edit-' . $tache->getId() . '"class="btn btn-warning">edit</a>' ?>
                    <?= '<a href="delete' . $tache->getId() . '"class="btn btn-danger">delete</a>' ?>
                </td>
            </tr>
        <?php endforeach; ?>    
    </tbody>
</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>