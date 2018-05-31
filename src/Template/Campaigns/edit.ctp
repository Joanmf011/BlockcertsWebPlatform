<?= $this->Html->css(['template/content.css']) ?>
<?= $this->Html->script(['template/content.js']) ?>
<div class="content-container">
	<div class="row content-titles-row align-bottom">
		<span class="content-title">Clients</span>
		<span class="content-subtitle">Edit</span>
	</div>
	<div class="content-mainblock block" style="padding: 20px">
		<div class="col-xs-12 col-md-12 col-lg-12 overwhite-input">
			<?=$this->Form->create("Clients", array('url'=>'/clients/editpost'))?>
			<div class="margin-bot">
				<?=$this->Form->input('Name', ['class'=>'form-control radius', 'default'=>$data['name']])?>
			</div>
			<div style="text-align: center;">
				<?=$this->Form->button("<span class='ti-save' style='margin-right: 8px;'></span> Save changes", 
									['class'=>'btn btn-default blue-button'],
									["escape"=>false])?>
			</div>
		<?=$this->Form->end()?>
		</div>
	</div>
	<div class="content-titles-row">
		<?=$this->Html->link("<span class='ti-arrow-left'></span> Back",
									["controller"=>"clients","action"=>"index"],
									["escape"=>false, "class"=>"back-button"])?>
	</div>
</div>