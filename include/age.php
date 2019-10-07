<select class="form-control" id="age" name="age" required="">
	<?php 
	echo '<option value disabled selected >0</option>';
	for($i=1; $i<=150; $i++)
	{

		echo "<option value=".$i.">".$i."</option>";
	}
	?> 
</select>