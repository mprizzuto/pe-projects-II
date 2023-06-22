console.clear();

let itemPrices = document.querySelectorAll("input[id$='price']");
// const [priceOne, priceTwo, priceThree] = itemPrices;

let itemQuantities = document.querySelectorAll("input[id$='quantity']");
// const [quantityOne, quantityTwo, quantityThree] = itemQuantities;

// let items = document.querySelectorAll("fieldset[class^='item']");
// const [itemOne, itemTwo, itemThree] = items;


window.addEventListener("click", (event) => {
	if (event.target.matches("input[type='submit']")) {
		// loop over both arrays
		// multiply price * quantity
		// return subtotal
	}
});

const TAX_RATE = 5.5 / 100;

function convertToNum(input) {
	if (typeof input !== "number") {
		return false;
	}
	return +input;
}

function calculateSubtotal(price, quantity) {
	return price * quantity;
}

function calculateTax(num) {
	return num * TAX_RATE;
}




