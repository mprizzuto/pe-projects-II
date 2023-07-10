	function getElement(element) {
		return document.querySelector(element);
	}
	
	let things = window.addEventListener("submit", (event) => {
		

function generateMessage() {
	let principal = +getElement("#principal").value;
		
	let interestRate = +getElement("#interest-rate").value / 100;

	let years = +getElement("#years").value;

	let results = getElement("#results");

	return `After ${years} ${years > 1 ? "years" : "year"} at ${interestRate} the investment will be worth ${calculateInterest(principal, interestRate, years)}`;
	/*After 4 years at 4.3%, the investment will
       be worth $1758.*/ 
       
}
		// console.log({principal}, {interestRate}, {years});
		// console.log( calculateInterest(principal, interestRate, years) );
		console.log(generateMessage());

});


function calculateInterest(thePrincipal, interestRate, time) {
	let amount = thePrincipal * ( 1 + ((interestRate)*(time)) );
	return amount;
}


