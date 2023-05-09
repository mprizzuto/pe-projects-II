<form method="POST">
	<label for="to-do">to-do</label>
	<input type="text" name="to-do" id="to-do" value="<?=sanitizeInput(getToDo())?>">
	<input type="submit" name="submit" value="submit">
</form>