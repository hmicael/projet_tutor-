<?php ob_start(); ?>
<form class="form-card" action="<?= $actualLink ?>" method="post">
   <div class="form-group mb-3">
      <label class="form-label" for="titre">Titre</label>
      <input type="text" class="form-control" id="titre" name="titre"
         value="<?= isset($tache) ? $tache->getTitre() : '' ?>" required>
   </div>
   <div class="form-group mb-3">
      <label class="form-label" for="matiere">Matiere</label>
      <input type="text" class="form-control" id="matiere" name="matiere"
         value="<?= isset($tache) ? $tache->getMatiere() : '' ?>" required>
   </div>
   <div class="form-group mb-3">
      <label class="form-label" for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description"
         value="<?= isset($tache) ? $tache->getDescription() : '' ?>">
   </div>
   <div class="form-group mb-3">
      <label class="form-label" for="date_d">Date</label>
      <input type="date" class="form-control" id="date_d" name="date_d"
         value="<?= isset($tache) ? $tache->getDate_d() : '' ?>" required>
   </div>
   <input type="hidden" name="id"
      value="<?= isset($tache) ? $tache->getId() : '' ?>">
   <input type="hidden" name="statut"
      value="<?= isset($tache) ? $tache->getStatut() : 0 ?>">
   <button type="submit" name="submit" class="btn btn-primary" value="<?= $title ?>">Envoyer</button>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>