console.clear();
// localStorage.clear();

function getPricesAndQuantities() {
  this.priceQuantityArr = [];
}

function getCartFromLs() {
	return JSON.parse(localStorage.getItem("shoppingCart"));
}

function calculateSubtotal(price, quantity) {
	return price * quantity;
}

function generateMessage(price, quantity) {
	return `your subtotal is ${USDollar.format(calculateSubtotal(price, quantity))} your tax is ${USDollar.format(calculateTax(price, quantity))} your total is ${USDollar.format(calculateTotal(price, quantity))}`;
}

function calculateTax(price, quantity) {
	return calculateSubtotal(price, quantity) * TAX_RATE;
}

function calculateTotal(price, quantity) {
	return calculateSubtotal(price, quantity) + calculateTax(price, quantity);
}

getPricesAndQuantities.prototype.addItem = function(item) {
  this.priceQuantityArr.unshift(item);
}

const TAX_RATE = 5.5 / 100;

let USDollar = new Intl.NumberFormat("en-US", {
	style: "currency",
	currency: "USD",
});

let shoppingCart = new getPricesAndQuantities();

let shoppingList = document.querySelector("#shopping-item-list");

let shoppingListData = document.querySelector(".shopping-list-prices");

function calculateOrder(itemPrice,itemQuantity) {
	shoppingList?.insertAdjacentHTML("afterBegin", `<li>price: ${itemPrice} quantity: ${itemQuantity}</li>`);

 // calculateOrder();
 	let subtotal = getCartFromLs().reduce((accumulator, current) => {
 		return accumulator + current.reduce((innerAccumulator, newCurrent) => {
 		// console.log( accumulator + (calculateSubtotal(newCurrent.itemPrice, newCurrent.itemQuantity)) );
 		// return innerAccumulator + calculateSubtotal(newCurrent.itemPrice , newCurrent.itemQuantity);
 			return innerAccumulator + (newCurrent.itemPrice * newCurrent.itemQuantity);
 		}, 0);
  }, 0);
   // console.log(subtotal);
  let total = (TAX_RATE * subtotal) + subtotal;
  shoppingListData.textContent =  `your subtotal is ${USDollar.format(subtotal)} the tax is ${USDollar.format(TAX_RATE * subtotal)} the total is ${USDollar.format(total)}`;
}

window.addEventListener("click", (event) => {
  event.preventDefault();

  if (event.target.matches("input[type='submit']")) {
   let itemPrice = +document.querySelector("input[id$='price']").value;
   let itemQuantity = +document.querySelector("input[id$='quantity']").value;

   if (itemPrice === 0 || itemQuantity === 0) {
   	alert("required! Enter a price and quantity");
   }

   if (!localStorage.getItem("shoppingCart")) {
   	shoppingCart.addItem([{itemPrice, itemQuantity}]);
   	localStorage.setItem("shoppingCart", JSON.stringify(shoppingCart.priceQuantityArr));
   }
   else {
   	if (itemPrice > 0 && itemQuantity > 0) {
   		// console.log(itemPrice, itemQuantity);
   		let cartLs = getCartFromLs();
	   	console.log("else, cartLs", cartLs);
	   	cartLs.unshift([{itemPrice, itemQuantity}]);
	   	localStorage.setItem("shoppingCart", JSON.stringify(cartLs));
	   	calculateOrder(itemPrice, itemQuantity);
   	}
   }
   
   document.querySelector("input[id$='price']").value = "";
	 document.querySelector("input[id$='quantity']").value = "";
  }
});
// console.log(getCartFromLs());
window.addEventListener("load", (event) => {
	// console.log("onLoad, cartLs", getCartFromLs());

	let cartLs = getCartFromLs() ?? null;
  cartLs.forEach(item => {
  	console.log(item)
    item.forEach(subItem => {
      let listItem = `<li>price: ${subItem.itemPrice} quantity: ${subItem.itemQuantity}</li>`;
      shoppingList?.insertAdjacentHTML("beforeEnd", listItem);
    });
  });
});




