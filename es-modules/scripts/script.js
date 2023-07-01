console.clear();

let shoppingCart = new getPricesAndQuantities();

let shoppingList = document.querySelector("#shopping-item-list");

let shoppingListData = document.querySelector(".shopping-list-prices");

const TAX_RATE = 5.5 / 100;

function getPricesAndQuantities() {
  this.priceQuantityArr = [];
}

getPricesAndQuantities.prototype.addItem = function(item) {
  this.priceQuantityArr.unshift(item);
}

function getCartFromLs() {
	return JSON.parse(localStorage.getItem("shoppingCart"));
}

function calculateOrder(itemPrice,itemQuantity) {
	shoppingList?.insertAdjacentHTML("afterBegin", `<li>price: ${itemPrice} quantity: ${itemQuantity}</li>`);

 	let subtotal = getCartFromLs().reduce((accumulator, current) => {
 		return accumulator + current.reduce((innerAccumulator, newCurrent) => {
 			return innerAccumulator + (newCurrent.itemPrice * newCurrent.itemQuantity);
 		}, 0);
  }, 0);

  let total = (TAX_RATE * subtotal) + subtotal;
  shoppingListData.textContent =  `your subtotal is ${USDollar.format(subtotal)} the tax is ${USDollar.format(TAX_RATE * subtotal)} the total is ${USDollar.format(total)}`;
}

let USDollar = new Intl.NumberFormat("en-US", {
	style: "currency",
	currency: "USD",
});

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

window.addEventListener("load", (event) => {

	let cartLs = getCartFromLs() ?? null;

  cartLs.forEach(item => {
    item.forEach(subItem => {
      let listItem = `<li>price: ${subItem.itemPrice} quantity: ${subItem.itemQuantity}</li>`;
      shoppingList?.insertAdjacentHTML("beforeEnd", listItem);
      calculateOrder(subItem.itemPrice, subItem.itemQuantity);
    });
  });
});




