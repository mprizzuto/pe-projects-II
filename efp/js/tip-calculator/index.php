<section>
	<inner-column>
		<h2>tip calculator</h2>

		<p>input a tip rate and bill amount, and I will calculate your tip and total bill</p>

		<form class="bill-form" method="post">
			<label for="bill-amount">bill amount
				<input type="number" name="bill-amount" id="bill-amount" required>
			</label>

			<label for="tip-rate">tip rate
				<input type="number" name="tip-rate" id="tip-rate" min="1" max="100" required>
			</label>

			<input type="submit" value="submit">
		</form>
	</inner-column>
</section>