<center><h2>Axiomatic Semantics</h2></center>
<form class="form-horizontal" name="axiomaticInput" action="<?php base_url(); ?>axiomatic/AxiomaticGod" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
				<label for="AxiomaticSemantics">Select Programming Statement:</label>
				<select class="form-control" id="AxiomaticSemantics" name="AxiomaticSemanticsSelect" required>
					<option value="">Select an option below</option>
					<option value="a=b/2 {a<10}">a=b/2 {a<10}</option>
					<option value="x=x-3 {x>0}">x=x-3 {x>0}</option>
					<option value="a=b/2-1 {a<10}">a=b/2-1 {a<10}</option>
					<option value="b=c+10/3 {b>6}">b=c+10/3 {b>6}</option>
				</select>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-success" value="Submit Button">
		</div>
	</div>
</form>

<div class="container" id="AxiomaticSemanticsResult">
	<?php 	
		//echo $original_data. " ". $edited_data;
		if(isset($original_data) && isset($edited_data) && isset($first_half) && isset($last_half) )
		{
			//first line
			print_r($original_data);
			echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			print_r($edited_data[1]);

			echo "<br/>";

			//second line
			print_r($first_half);
			echo'&nbsp;&nbsp;';
			print_r($last_half);

			echo "<br/>";
			
			//third

		}		
	?>
</div>