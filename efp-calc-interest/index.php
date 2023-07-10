<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>EFP interest calc</title>

		<style>
			/* form styles */
			form {
			/*   line-height: 1.5; */
			  margin-top: 20px;
			}

			:is(label, input) {
			  display: block;
			}

			label +  input, label + select {
			  margin-top: 5px;
			}


			:is(input + label, select + label, 
			fieldset + fieldset, [class$="results"]) {
			  margin-top: 20px;
			}

			label {
			  margin-top: 10px;
			  text-transform: capitalize;
			  font-weight: bolder;
			  letter-spacing: 0.03em;
			}

			input {
			  display: block;
			  width: 100%;
			  max-width: 150px;
			  margin-top: 5px;
			}

			:is(input, select) {
			  padding: .5em 1em;
			}

			input[type="submit"] {
			  margin-top: 20px;
			  max-width: 100px;
			  font-weight: bolder;
			}

			input:invalid {
			  border: 5px double maroon;
			}

			legend {
			  font-size: clamp(1.8em, 3vw, 4em)
			}

			fieldset {
			  max-width: 50ch;
			}
		</style>
	</head>
	<body>
		<form method="POST">
			<fieldset class="investment-info">
				<label for="principal">principal</label>	
				<input type="number" name="principal" id="principal" min="1" max="2000000000" step="0.01" required>

				<label for="interest-rate">interest-rate</label>	
				<input type="number" name="interest-rate" id="interest-rate" min="1" max="100" step="0.1" required>

				<label for="years">year(s)</label>	
				<input type="number" name="years" id="years" min="1" max="50" step="0.5" required>
			</fieldset>

			<input type="submit" name="submit">
		</form>

		<p id="results"></p>

		<script src="./scripts/script.js" type="module">

		</script>
	</body>
</html>