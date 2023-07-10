import {getElement, USDollar} from "./utility.js";

import {generateMessage, calculateInterest} from "./interest-calculator.js";

	
window.addEventListener("submit", (event) => {
	event.preventDefault();
	generateMessage();
});




