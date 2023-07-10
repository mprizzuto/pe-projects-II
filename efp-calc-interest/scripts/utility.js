function getElement(element) {
	return document.querySelector(element);
}

let USDollar = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
});

export {
	getElement,
	USDollar
}
