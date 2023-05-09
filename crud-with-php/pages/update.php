<section>
	<inner-column>
		<h2><mark>update TODO</mark></h2>
		<!-- <p>todo: <?=sanitizeInput(getToDo())?> </p> -->
		<?=(sanitizeInput(returnCurrentToDo(getId(), decodeJSONAsArray()) ))?>
		<!-- <?php formatInput( updateToDoDb(getId()) )?> -->
	<?php include "components/todo-form.php";?>
	</inner-column>
</section>