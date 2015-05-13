<h2>Add Contact</h2>
<form method="post">
	<div>
		<label for="i_id">Info Name</label>
		<select name="i_id">
			<?php 
			foreach($info_form_options as $i_id => $i_name) {
				echo '<option value="'.html_escape($i_id).'">' .html_escape($i_name). '</option>';
			}
			?>
		</select>
	</div>
	<div>
		<label for="c_number">Contact Number</label>
		<input type="text" name="c_number">
	</div>
	<div>
		<input type="submit" value="Save">
	</div>
</form>
