<div class="login-box">
	<div class="general-title">
		<img src="/webroot/img/logo.png" class="icon-3d" alt="3D">
	</div>
	<div class="general-subtitle">
		BLOCKCERTS BACKOFFICE
	</div>
	<div class="form-group">
		<?php
			echo $this->Form->create("Users", array('url'=>'/users/login'));
			echo $this->Form->input('username', ['class'=>'form-control login-input']);
			echo $this->Form->input('password', ['class'=>'form-control login-input']);
			echo $this->Form->button('Login', ['class'=>'btn btn-default login-button']);
			echo $this->Form->end();
		?>
	</div>
</div>