<center><h2>Denotational Semantics</h2></center>
<form name="denoteform" method="post" action="<?php base_url(); ?>Denotational/calculate_denotational_semantic" enctype="multipart/form-data">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<label>Enter expression below</label>
				<input type="text" name="DenoteInput" class="form-control"/> 
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-success" value="Submit Button">
			</div>
		</div>
	</div>
</form>

<div class="container" id="DenoteResult">
	<?php
		if( isset($input) )
		{
			echo $input;
		}
	?>
</div>
