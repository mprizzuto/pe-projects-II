console.clear();
// localStorage.clear();

function getPricesAndQuantities() {
  this.priceQuantityArr = [];
}

getPricesAndQuantities.prototype.addItem = function(item) {
  this.priceQuantityArr.unshift(item);
}

let shoppingCart = new getPricesAndQuantities();

let shoppingList = document.querySelector("#shopping-item-list");

const TAX_RATE = 5.5 / 100;

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
   	let cartLs = JSON.parse(localStorage.getItem("shoppingCart"));
   	// console.log(cartLs);
   	cartLs.unshift([{itemPrice, itemQuantity}]);
   	localStorage.setItem("shoppingCart", JSON.stringify(cartLs));

   	// console.log(shoppingCart.priceQuantityArr)
   }
   // 
   shoppingList.insertAdjacentHTML("afterBegin", `<li>price: ${itemPrice} quantity: ${itemQuantity}</li>`)

   	// console.log(shoppingCart.priceQuantityArr);
  }
});

function getCartFromLs() {
  // console.log(JSON.parse(localStorage.getItem("shoppingCart")));
  return JSON.parse(localStorage.getItem("shoppingCart"));
}

window.addEventListener("load", (event) => {
  getCartFromLs().forEach(item => {
    item.forEach(subItem => {
      let listItem = `<li>price: ${subItem.itemPrice} quantity: ${subItem.itemQuantity}</li>`;
      shoppingList.insertAdjacentHTML("beforeEnd", listItem);
    });
  });
});

function calculateSubtotal(item, quantity) {
	return item * quantity;
}

function generateMessage() {
	return `your subtotal is ${calculateSubtotal()} your tax is ${calculateTax()} your total is ${calculateTotal()}`;
}

function calculateTax() {
	return calculateSubtotal() * TAX_RATE;
}

// getCartFromLs().forEach(item => {
// 	item.forEach(subItem => {
// 		console.log(subItem.itemPrices, subItem.itemQuantity);
// 	})
// });


