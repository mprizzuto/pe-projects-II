console.clear();

function getPricesAndQuantities() {
	this.priceQuantityArr = [];
	// return this.priceQuantityArr;
}

getPricesAndQuantities.prototype.addItem = function(item) {
	this.priceQuantityArr.push(item);
}

let shoppingCart = new getPricesAndQuantities();
let shoppingList = document.querySelector("#shopping-item-list");

function getLastItem(shoppingList) {
	return shoppingList[shoppingList.length - 1];
}

window.addEventListener("click", (event) => {
	event.preventDefault();
	// localStorage.clear();
	if (event.target.matches("input[type='submit']")) {
		let itemPrice = +document.querySelector("input[id$='price']").value;

		let itemQuantity = +document.querySelector("input[id$='quantity']").value;
		shoppingCart.addItem({itemPrice,itemQuantity});
		
		localStorage.setItem("shoppingCart", JSON.stringify(shoppingCart));

		let listItem = `<li>price: ${shoppingCart.priceQuantityArr[shoppingCart.priceQuantityArr.length - 1].itemPrice} quantity: ${shoppingCart.priceQuantityArr[shoppingCart.priceQuantityArr.length - 1].itemQuantity}</li>`;
			shoppingList.insertAdjacentHTML("beforeEnd", listItem);

		
	}
});
const TAX_RATE = 5.5 / 100;

function convertToNum(input) {
	return +input;
}

function getCartFromLs() {
	console.log("fuck!", JSON.parse(localStorage.getItem("shoppingCart")))
	return JSON.parse(localStorage.getItem("shoppingCart"));
}

window.addEventListener("load", (event) => {
	
	getCartFromLs().priceQuantityArr.forEach(item => {
		console.log(item.itemPrice, item.itemQuantity);

	})
	// console.log(getCartFromLs().priceQuantityArr);

});


