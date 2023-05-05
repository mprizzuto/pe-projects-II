<h2>bread recipe <mark>create</mark></h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<legend>bread recipe</legend>
	
	<label for="flour">flour</label>
	<input type="text" name="flour" id="flour" placeholder="flour type" required>

	<label for="salt">salt(grams)</label>
	<input type="number" name="salt" id="salt" inputmode="numeric" placeholder="amount of salt" min="1" max="1000" required>

	<label for="water">water</label>
	<select name="water" id="water" required>
		<option value="choose an option" disabled>choose an option</option>
		<option value="filtered">filtered</option>
		<option value="tap">tap(from the sink)</option>
	</select>

	<label for="levening-agent">levening agent (how your dough rises)</label>
	<select name="levening agent" id="levening-agent" required>
		<option value="choose an agent" disabled></option>
		<option value="instant yeast">instant yeast</option>
		<option value="sourdough">sourdough</option>
		<option value="yeast water">yeast water</option>
	</select>
	<input type="submit" name="submit" value="submit">
</form>

