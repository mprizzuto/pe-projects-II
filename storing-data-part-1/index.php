<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>storing data 1</title>
		<style>
			inner-column {
				display: block;
				max-width: 600px;
				margin-right: auto;
				margin-left: auto;
				padding-bottom: 20vh;
			}
		</style>
	</head>
	<body>
		<?php 
		@require "team-database.php";
		@require "functions.php";
	

		// CRUD basics. I tried doing it with forms but I dont fully understand the process of reading and writing to files yet. so I thought I'd take a user-defined function-based approach
		

// formatVar($teamMembers);

// formatVar(readTeamMember($teamMembers, "d734"));
updateTeamMember($teamMembers, "v324", "barooj", "barooj.js");

formatVar($teamMembers);

?>
		<!-- <section>
			<inner-column>
				<h1>storing data</h1>

				<form method="POST" action="./pages/formula-results.php">
					<legend>bread recipe</legend>
					
					<label for="flour">flour</label>
					<input type="text" name="flour" id="flour" placeholder="flour type">

					<label for="salt">salt(grams)</label>
					<input type="number" name="salt" id="salt" inputmode="numeric" placeholder="amount of salt" min="1" max="1000">

					<label for="water">water</label>
					<select name="water" id="water">
						<option value="choose an option" disabled>choose an option</option>
						<option value="filtered">filtered</option>
						<option value="tap">tap(from the sink)</option>
					</select>

					<label for="levening-agent">levening agent (how your dough rises)</label>
					<input type="text" name="levening agent" id="levening-agent">
					<select name="levening agent" id="levening-agent">
						<option value="choose an agent" disabled></option>
						<option value="instant yeast">instant yeast</option>
						<option value="sourdough">sourdough</option>
						<option value="yeast water">yeast water</option>
					</select>
					<input type="submit" name="submit" value="submit">
				</form>
			</inner-column>
		</section> -->

		<section>
			<inner-column>
				<h2><abbr title="Create Read Update Delete">CRUD</abbr> and data</h2>

				<section class="creating-data">
					<h2>creating the data</h2>

					<p>I created a <code>createTeamMember(&$teamMembers, $id, $name, $slug)</code> function to generate a new team member. The code adds an associative array to an existing associative array. The value of the array key is an associatve array of team member data. I used bracket notation to add the associatve array to the <code>$teamMembers</code> array</p>

					<?php highlight_file("createTeamMember.php")?>


				</section>

				<section class="creating-data">
					<h2>reading the data</h2>

					<p>I created a <code>readTeamMember($teamMembers, $id)</code> function to access the key in the <code>$teamMembers array</code>.</p>

					<?php highlight_file("readTeamMember.php")?>


				</section>

				<section class="updating-data">
					<h2>updating the data</h2>

					<p>I created a <code>updateTeamMember(&$teamMembers, $id, $name, $slug)</code> function to update the <code>$id, $name, $slug</code> info in the <code>$teammembers</code> array.</p>

					<?php highlight_file("updateTeamMembers.php")?>


				</section>

				<section class="deleting-data">
					<h2>deleting the data</h2>

					<p>I created a <code>removeTeamMember(&$teamMembers, $id)</code> (because deleteTeamMember sounded <em>too extreme</em>) function to remove an item in the <code>$teamMembers</code> array based on the $id</p>

					<?php highlight_file("updateTeamMembers.php")?>


				</section>


			</inner-column>
		</section>
	</body>
</html>