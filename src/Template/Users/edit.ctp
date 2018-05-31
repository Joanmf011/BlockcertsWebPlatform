<?= $this->Html->css(['template/users.css']) ?>
<?= $this->Html->script(['template/users.js']) ?>
<div class="content-container">
	<div class="row content-titles-row align-bottom">
		<span class="content-title">Users</span>
		<span class="content-subtitle">Edit</span>
	</div>
	<div class="content-mainblock block" style="padding: 20px">
		<div class="col-xs-12 col-md-6 col-lg-6 overwhite-input">
			<?=$this->Form->create("Users", array('url'=>'/users/edit/'.$data['id']))?>
			<div class="margin-bot">
				<?=$this->Form->input('Name', ['class'=>'form-control radius', 'default'=>$data['username']])?>
			</div>
			<div class="margin-bot">
				<?=$this->Form->input('Client', ['class'=>'form-control radius', 'default'=>$data['client']])?>
			</div>
			<div class="margin-bot">
				<?=$this->Form->input('Role', ['class'=>'form-control radius', 'default'=>$data['role']])?>
			</div>
			<div style="text-align: center;">
				<?=$this->Form->button("<span class='ti-save' style='margin-right: 8px;'></span> Save changes", 
									['class'=>'btn btn-default blue-button'],
									["escape"=>false])?>
			</div>
		<?=$this->Form->end()?>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-6 overwhite-input">
			<?=$this->Form->create("Users", array('url'=>'/users/editpost'))?>
			<div class="margin-bot">
				<?=$this->Form->input('Old password', ['class'=>'form-control radius'])?>
			</div>
			<div class="margin-bot">
				<?=$this->Form->input('New password', ['class'=>'form-control radius'])?>
			</div>
			<div class="margin-bot">
				<?=$this->Form->input('Repeat new password', ['class'=>'form-control radius'])?>
			</div>
			<div style="text-align: center;">
				<?=$this->Form->button("<span class='ti-save' style='margin-right: 8px;'></span> Change password", 
									['class'=>'btn btn-default blue-button'],
									["escape"=>false])?>
			</div>
			<?=$this->Form->end()?>
		</div>
	</div>
	<div class="content-titles-row">
		<?=$this->Html->link("<span class='ti-arrow-left'></span> Back",
									["controller"=>"users","action"=>"index"],
									["escape"=>false, "class"=>"back-button"])?>
	</div>
</div>