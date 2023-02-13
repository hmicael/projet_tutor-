<?php ob_start(); ?>
<h1>Param&egrave;tre</h1>

<form class="form-card" action="<?= $actualLink ?>" method="post">
    <div class="form-group mb-3">
      <label class="form-label" for="notif_time">Heure de notification</label>
      <input type="time" class="form-control" id="notif_time" name="notif_time"
         value="<?= isset($_COOKIE["notif_time"]) ? $_COOKIE["notif_time"] : '08:00' ?>" required>
   </div>
   <button type="submit" name="submit" class="btn btn-primary" value="<?= $title ?>">Envoyer</button>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>