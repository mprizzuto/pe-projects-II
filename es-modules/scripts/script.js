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

let shoppingCart = new getPricesAndQuantities();

let shoppingList = document.querySelector("#shopping-item-list");
// console.log(shoppingList);
let shoppingListData = document.querySelector(".shopping-list-prices");
const TAX_RATE = 5.5 / 100;

let USDollar = new Intl.NumberFormat("en-US", {
	style: "currency",
	currency: "USD",
});

window.addEventListener("click", (event) => {
  event.preventDefault();

  if (event.target.matches("input[type='submit']")) {
   let itemPrice = +document.querySelector("input[id$='price']").value;
   let itemQuantity = +document.querySelector("input[id$='quantity']").value;

   if (!localStorage.getItem("shoppingCart")) {
   	// console.log("empty");
   	shoppingCart.addItem([{itemPrice, itemQuantity}]);
   	localStorage.setItem("shoppingCart", JSON.stringify(shoppingCart.priceQuantityArr));

   }
   else {
   	// let cartArray = 
   	let cartLs = getCartFromLs();
   	// console.log(cartLs);
   	cartLs.unshift([{itemPrice, itemQuantity}]);
   	localStorage.setItem("shoppingCart", JSON.stringify(cartLs));
   }
   
   shoppingList?.insertAdjacentHTML("afterBegin", `<li>price: ${itemPrice} quantity: ${itemQuantity}</li>`);

   let subtotal = getCartFromLs().reduce((accumulator, current) => {
   	 return accumulator + current.reduce((innerAccumulator, newCurrent) => {
   		// console.log( accumulator + (calculateSubtotal(newCurrent.itemPrice, newCurrent.itemQuantity)) );
   		// return innerAccumulator + calculateSubtotal(newCurrent.itemPrice , newCurrent.itemQuantity);
   			return innerAccumulator + (newCurrent.itemPrice * newCurrent.itemQuantity);
   	}, 0);
   }, 0);
   console.log(subtotal);
   shoppingListData.textContent =  `your subtotal is ${subtotal}`;
  }
});

window.addEventListener("load", (event) => {
  getCartFromLs().forEach(item => {
    item.forEach(subItem => {
      let listItem = `<li>price: ${subItem.itemPrice} quantity: ${subItem.itemQuantity}</li>`;
      shoppingList?.insertAdjacentHTML("beforeEnd", listItem);
    });
  });
});




