<div id="adduser-block" class="block-blue">
	<button id="openAddUserButton" class="btn btn-default blue-button" onclick="openAddUser()">
		<span class='ti-plus'></span> Add user
	</button>
	<div class="adduser-container hidden">
		<button class="adduser-closebutton" onclick="closeAddUser()">
			<span class='ti-close'></span>
		</button>

		<?=$this->Form->create("Users", array('url'=>'/users/login'))?>
		<div class="row">
			<div class="col-xs-12 col-md-4 col-lg-4 adduser-input">
				<?=$this->Form->input('Name', ['class'=>'form-control radius'])?>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-4 adduser-input">
				<?=$this->Form->input('Client', ['class'=>'form-control radius'])?>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-4 adduser-input">
				<?=$this->Form->input('Role', ['class'=>'form-control radius'])?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4 col-lg-4 adduser-input">
				<?=$this->Form->input('Password', ['class'=>'form-control radius'])?>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-4 adduser-input">
				<?=$this->Form->input('Repeat password', ['class'=>'form-control radius'])?>
			</div>
		</div>
		<div style="text-align: center;">
			<?=$this->Form->button("<span class='ti-plus'></span> Create", ['class'=>'btn btn-default superblue-button'],
									["escape"=>false])?>
		</div>
		<?=$this->Form->end()?>
	</div>	
</div>