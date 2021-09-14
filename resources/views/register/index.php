<?= Form::init('register/register', 'post', ['class' => 'form-login']); ?>
      <a href="<?php echo BASE; ?>">
            <img class="mb-4" src="<?= Assets::get("images/wlogo128.png"); ?>" draggable="false" alt="" id="logo-mini" height="72">
      </a>
      <?= Form::csrf_input(); ?>
      <?= Form::input('text', 'name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'autofocus' => '', 'required' => '']); ?>
      <br>
      <?= Form::input('email', 'email', '', ['class' => 'form-control', 'placeholder' => 'Email', 'required' => '']); ?>
      <br>
      <?= Form::input('text', 'username', '', ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '']); ?>
      <br>
      <?= Form::input('password', 'password', '', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => '']); ?>
      <p class="mt-4 mb-4 text-muted">By clicking Register you agree to our <a href="<?php echo BASE; ?>policies/conds" class="whitecoltext">Terms and Conditions</a> and <a href="<?php echo BASE; ?>policies/cookies" class="whitecoltext">Cookies Policy.</a></p>
      <?= Form::submit('Register', 'register', ['class' => 'btn btn-lg btn-secondary btn-block', 'id' => 'getstartedbtn']); ?>
      <p class="mt-5 mb-3 text-muted">Already have an account? <a href="<?php echo BASE; ?>login" class="pl-1 whitecoltext">Login.</a></p>
<?= Form::end(); ?>