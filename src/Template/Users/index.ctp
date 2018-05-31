<?= $this->Html->css(['template/users.css']) ?>
<?= $this->Html->script(['template/users.js']) ?>
<div class="content-container">
	<div class="row content-titles-row align-bottom">
		<span class="content-title">Users</span>
		<span class="content-subtitle">List</span>
	</div>
	<div class="content-mainblock block">
		<div class='content-mainblock-top'>
			<?=$this->element('Users/addUser')?>
		</div>
		<div class="users-list">
			<table class="table">
			  <thead class='softgrey'>
			    <tr>
			      <th scope="col">Name</th>
			      <th scope="col">Client</th>
			      <th scope="col">Role</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
					foreach($users as $u){
						$id = $u['id'];
						$name = $u['username'];
						$client = $u['client'];
						$role = $u['role'];
				?>
			    <tr>
			      <td><?=$name?></td>
			      <td class="grey-element"><?=$client?></td>
			      <td class="grey-element"><div class="green-element"><?=$role?></div></td>
			      <td class="icons-element">
			      	<?php /*$this->Html->link("<span class='ti-eye'></span>",
											["controller"=>"users","action"=>"view",$id],
											["escape"=>false, "class"=>"grey-icon"])*/?>

						<?=$this->Html->link("<span class='ti-pencil-alt'></span>",
											["controller"=>"users","action"=>"edit",$id],
											["escape"=>false, "class"=>"grey-icon"])?>		

						<?=$this->Html->link("<span class='ti-trash'></span>",
											["controller"=>"users","action"=>"delete",$id],
											["escape"=>false,"class"=>"grey-icon", "onclick"=>"return confirm('Are you sure?')"])?>
			      </td>
			    </tr>

			    <?php
					}
				?>

			  </tbody>
			</table>
		</div>
	</div>
</div>