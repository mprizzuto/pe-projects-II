<section>
	<inner-column>
		<h2><mark>update TODO</mark></h2>
		<!-- <?=returnCurrentToDo(getId(), decodeJSONAsArray())?> -->
		<!-- <p>todo: <?=sanitizeInput(getToDo())?> </p> -->
		<p>todo: <?=sanitizeInput( returnCurrentToDo(getId(), decodeJSONAsArray()) )?></p>
		<!-- <?=(sanitizeInput(returnCurrentToDo(getId(), decodeJSONAsArray()) ))?> -->
		<?=sanitizeInput(updateToDoDb(getId()))?>
	<?php include "components/todo-form.php";?>
	</inner-column>
</section>