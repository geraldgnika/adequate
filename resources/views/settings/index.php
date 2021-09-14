<!-- Name updation -->
<div class="rowsettings">
  <?= Form::init("settings/saveName/" . $this->data['id'] . "", "get", ["class" => "settingsform"]); ?>
    <div class="col-3" id="settingsleftcol">Name: </div>
    <div class="col-6">
      <?= Form::csrf_input(); ?>
      <?= Form::input('text', 'name', '', ['class' => 'form-control form-control-sm', 'placeholder' => '' . $this->data['name'] . '']); ?>
    </div>
    <div class="col-3" id="settingsrightcol">
      <?= Form::submit('Update', '', ['class' => 'btn btn-sm btn-success']); ?>
    </div>
  <?= Form::end(); ?>
</div>

<!-- Email updation -->
<div class="rowsettings">
  <?= Form::init("settings/saveEmail/" . $this->data['id'] . "", "get", ["class" => "settingsform"]); ?>
    <div class="col-3" id="settingsleftcol">Email: </div>
    <div class="col-6">
      <?= Form::csrf_input(); ?>
      <?= Form::input('email', 'email', '', ['class' => 'form-control form-control-sm', 'placeholder' => '' . $this->data['email'] . '']); ?>
    </div>
    <div class="col-3" id="settingsrightcol">
      <?= Form::submit('Update', '', ['class' => 'btn btn-sm btn-success']); ?>
    </div>
  <?= Form::end(); ?>
</div>

<!-- Username updation -->
<div class="rowsettings">
  <?= Form::init("settings/saveUsername/" . $this->data['id'] . "", "get", ["class" => "settingsform"]); ?>
    <div class="col-3" id="settingsleftcol">Username: </div>
    <div class="col-6">
      <?= Form::csrf_input(); ?>
      <?= Form::input('text', 'username', '', ['class' => 'form-control form-control-sm', 'placeholder' => '' . $this->data['username'] . '']); ?>
    </div>
    <div class="col-3" id="settingsrightcol">
      <?= Form::submit('Update', '', ['class' => 'btn btn-sm btn-success']); ?>
    </div>
  <?= Form::end(); ?>
</div>

<!-- Password updation -->
<div class="rowsettings">
  <?= Form::init("settings/savePassword/" . $this->data['id'] . "", "post", ["class" => "settingsform"]); ?>
    <div class="col-3" id="settingsleftcol">Password: </div>
    <div class="col-6">
      <?= Form::csrf_input(); ?>
      <?= Form::input('password', 'password', '', ['class' => 'form-control form-control-sm', 'placeholder' => '********']); ?>
    </div>
    <div class="col-3" id="settingsrightcol">
      <?= Form::submit('Update', '', ['class' => 'btn btn-sm btn-success']); ?>
    </div>
  <?= Form::end(); ?>
</div>

<!-- Account deletion -->
<div class="rowsettings">
  <div class="col-3" id="settingsleftcol"></div>
  <div class="col-5"></div>
  <div class="col-2" id="settingsrightcol">
    <a href="<?php echo BASE; ?>settings/delete/<?= $this->data['id']; ?>">
      <input type="submit" value="Delete account" name="delete" class="btn btn-sm btn-danger" id="deleteaccbtn">
    </a>
  </div>
</div>