</main>
<section class="jumbotron text-center">
    <img src="<?= Assets::get("images/profile.png"); ?>" draggable="false" class="profileimage m-auto">
    <h2 class="pt-4"><?= $this->data['name']; ?></h2>
    <p class="text-muted mb-0"><?= $this->data['email']; ?></p>
    <p class="text-muted"><?= $this->data['username']; ?></p>
    <p>
      <a href="<?php echo BASE; ?>settings/index/<?= $this->data['id']; ?>" class="btn btn-secondary my-2">Settings</a>
      <a href="<?php echo BASE; ?>profile/logout" class="btn btn-primary my-2">Logout</a>
    </p>
</section>