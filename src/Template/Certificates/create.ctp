<?= $this->Html->css(['template/content.css']) ?>
<?= $this->Html->script(['template/content.js']) ?>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=yes">
<script src="/cert-web-component/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

<link rel="import" href="/cert-web-component/bower_components/iron-demo-helpers/demo-pages-shared-styles.html">
<link rel="import" href="/cert-web-component/bower_components/iron-demo-helpers/demo-snippet.html">

<link rel="import" href="/cert-web-component/blockchain-certificate.html">
<link rel="import" href="/cert-web-component/validate-certificate.html">

<div class="content-container">
	<div>
		<div class="row content-titles-row align-bottom">
			<span class="content-title">Certificates</span>
			<span class="content-subtitle">Create</span>
		</div>
		<span class="create-text">
			Define the data and resources that will be uploaded for this batch of certficates.
		</span>



<form class='form-inline' method='post' action="/Certificates/create" enctype="multipart/form-data">

<div class="block">
	<!-- TIME SELECTION -->
	<div class="blue-title">
		<span class='ti-layout option-icon'></span>
		<span class="option-text"> Data</span>
		<span id="add-image-toggleicon" class='ti-angle-down toggleicon'></span>
	</div>
	<div style="color: #535353; padding-bottom: 20px;">
		Upload a CSV with the data to be included in the batch.
	</div>
	<div class="row pad-container" style="text-align: center; padding: 20px;">
		<div style='margin:0 auto; width:auto'>
		  <div class="form-group mx-sm-3 mb-2">
		    <input type="file" class="form-control" name="csv" placeholder="CSV File">
		  </div>
		</div>
	</div>
</div>

<div class="block">
	<!-- ZONE SELECTION -->
	<div class="blue-title">
		<span class='ti-layers option-icon'></span>
		<span class="option-text"> Resources</span>
		<span id="add-image-toggleicon" class='ti-angle-down toggleicon'></span>
	</div>
	<div style="color: #535353; padding-bottom: 20px;">
		Choose the resources that will be used when displaying the certificates.
	</div>
	<div class="row pad-container integration">
		
		<div class="integration-container">
	      <div class="blockchain-certificate">
	          <blockchain-certificate href="/cert-web-component/JSON/verify.json"></blockchain-certificate>
	      </div>
	    </div>

	</div>
	<div style="text-align: center; margin-top: 20px;">
		<?=$this->Form->button("<span class='ti-check'></span> Continue", ['class'=>'btn btn-default blue-button disabled', 'id'=>'continue-define-button', 'disabled'=>true],
								["escape"=>false])?>
	</div>
</div>

<input type="text" class="hidden" id="sections-form" name="sections">

</form>



		<div class="content-titles-row">
			<?=$this->Html->link("<span class='ti-arrow-left'></span> Back",
										["controller"=>"certificates","action"=>"index"],
										["escape"=>false, "class"=>"back-button"])?>
		</div>
	</div>
</div>