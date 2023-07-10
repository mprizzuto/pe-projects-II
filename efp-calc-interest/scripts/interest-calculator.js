import {getElement, USDollar} from "./utility.js";

function generateMessage() {
	let principal = +getElement("#principal").value;
		
	let interestRate = +getElement("#interest-rate").value / 100;

	let years = +getElement("#years").value;

	let results = getElement("#results");

	results.textContent = `After ${years} ${years > 1 ? "years" : "year"} at ${interestRate}% the investment will be worth ${ USDollar.format(calculateInterest(principal, interestRate, years))}`;
     
}

function calculateInterest(thePrincipal, interestRate, time) {
	let amount = thePrincipal * ( 1 + ((interestRate)*(time)) );
	return amount;
}

export {
	generateMessage,
	calculateInterest
}