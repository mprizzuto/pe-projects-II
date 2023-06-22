console.clear();

let itemPrices = [...document.querySelectorAll("input[id$='price']")];
const [price1, price2, price3] = itemPrices;

let itemQuantities = [...document.querySelectorAll("input[id$='quantity']")];
const [quantity1, quantity2, quantity3] = itemQuantities;

window.addEventListener("click", (event) => {
	if (event.target.matches("input[type='submit']")) {
		// getSubtotal();
		console.log(generateMessage());
	}
});

const TAX_RATE = 5.5 / 100;

function convertToNum(input) {
	return +input;
}

function getSubtotal() {
	let subtotal = 0;
	itemPrices.forEach((item, index) => {
		
		const price = convertToNum(item.value);
		const quantity = convertToNum(itemQuantities[index].value);
		subtotal += calculateSubtotal(price, quantity);
		// console.log(subtotal);
		
	});
	return subtotal;
}

function calculateSubtotal(price, quantity) {
	return price * quantity;
}

function calculateTax(num) {
	// console.log("calcTxNum: ", num);
	return num * TAX_RATE;
}


const formatAsUsDollar = new Intl.NumberFormat("en-US", {
	style: "currency",
	currency: "usd",
});

function calculateTotal() {
	return calculateTax(getSubtotal()) + getSubtotal();
}


function generateMessage() {
	if (false) {
		return "somethings werong, check all info and try again";
	}
	`
		
	`
	return `
	Enter the price of item 1: ${price1.value}
	Enter the quantity of item 1: ${quantity1.value}
	Enter the price of item 2: ${price2.value}
	Enter the quantity of item 2: ${quantity2.value}
	Enter the price of item 3: ${price3.value}
	Enter the quantity of item 3: ${quantity3.value}
	your subtotal is ${formatAsUsDollar.format(getSubtotal())} 
	your tax is ${formatAsUsDollar.format(calculateTax(getSubtotal()))} 
	yor total is ${formatAsUsDollar.format(calculateTotal())}
	`;
}


