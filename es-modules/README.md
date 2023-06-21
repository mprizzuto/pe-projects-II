# exercises for programmers *with ES modules*

my first time using ES modules to split up my code. I wanted to practice multiple skills at once like
- breaking down a problem with pseudocode
- breaking up code with ES modules
- GIT workflow

## pseudocode

**Problem statement**
Create a simple self-checkout system. *Prompt* for the **prices** and **quantities** *three items*. *Calculate* the **subtotal** of the items. 
Then *calculate* the **tax** using a **tax rate** of 5.5%. *Print* out the line items with the **quantity** and **total**, and then *print* out the **subtotal**, **tax amount**, and **total**.

**Inputs**
- price
- quantity

**Constraints**
- Separate the input, processing, and output. 
	- get the input
	- do the math operations and build the string
	- print out the output
- convert input to numerical data before doing any calculations

**Tests**
- Enter the price of item 1: 25
- Enter the quantity of item 1: 2
- Enter the price of item 2: 10
- Enter the quantity of item 2: 1
- Enter the price of item 3: 4
- Enter the quantity of item 3: 1
- Subtotal: $64.00
- Tax: $3.52
- Total: $67.52

**Challenges**
- only allow numbers as input
- allow for an indeterminate amount of items to be entered. te total is calculated only when no more items are entered


**PSEUDOCODE**
- create form
- create labels and inputs 
	- for price and quantity

- prevent form default behavior
- with attached event listener on window:
	- listen for when input type=submit is pressed
	- get values of form elements
	- convert to numbers
	- do calculations
		- call the various functions
	- generate message

	- to implement the no more than 3 item rule
		- if array of items/quantities is a length of 3 items. disable the submit button and output a message showing the subtotal, applied tax and total

variables/functions to implement
- get the inputs of quantity and price
	- convert to numbers
	- require only positive, non-zero values

- function subTotal
	- returns price * quantity rounded to nearest hundreth and formatted in $ dollar amount

- assign TAX_RATE to the result of (5.5 / 100)

- function calculateTax
	- returns subtotal * TAX_RATE rounded to nearest hundreth and formatted in $ dollar amount

- function calculateTotal 
	- returns subTotal + calculateTax

- function generateMessage
	- returns the string from **Tests** with the above functions interpolated in list items
- function shoppingList gets an array of inputs of quantity and price (separately?) and adds event listeners to them. perhaps it even live updates
- save shoppingList as key in local storage. 
- generate items and HTML upon page load from local storage
- limit numbers for price and quantity to rational numbers, or an arbitrary number (i.e no orders over 1,000,000).
	- if a user enters an irrational order with too large numbers, check for it and output "order too large, enter a smaller quantity and price"
	
<!-- - function calculateSubtotal
	- for each price * quantity, run subTotal function. 
		- return subtotal

- function getAppliedTax
	- multiply calculateTax() * calculateSubtotal() -->


