<?= Form::init('login/login', 'post', ['class' => 'form-login']); ?>
      <a href="<?php echo BASE; ?>">
            <img class="mb-4" src="<?= Assets::get("images/wlogo128.png"); ?>" draggable="false" alt="" id="logo-mini" height="72">
      </a>
      <?= Form::csrf_input(); ?>
      <?= Form::input('text', 'username', '', ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus' => '', 'required' => '']); ?>
      <br>
      <?= Form::input('password', 'password', '', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => '']); ?>
      <br><br>
      <?= Form::submit('Log in', 'login', ['class' => 'btn btn-lg btn-secondary btn-block', 'id' => 'getstartedbtn']); ?>
      <p class="mt-4 mb-3 text-muted">Don't have an account? <a href="<?php echo BASE; ?>register" class="pl-1 whitecoltext">Register.</a></p>
<?= Form::end(); ?>