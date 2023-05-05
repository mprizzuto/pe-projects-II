# tip calculator Pseudocode

## problem statement
Create a simple tip calculator. The program should prompt for a bill amount and a tip rate. The program must compute the tip and then display both the tip and the total amount of the bill.

## inputs
- bill amount
- tip rate

## outputs
- tip 
- bill amount

## tests

## test one
- bill amount: 10.00
- tip: 15
- message: your tip is $1.50 your total is $11.50

- bill amount: 11.25
- tip: 15
- message: your tip is $1.69  your total is $12.94

## pseudocode
- **initialize** *billAmount* and set it equal to the result of grabbing it in the DOM
	- convert to number

- **initialize** *tipRate* and set it equal to the result of grabbing it in the DOM
	- convert to number and divide by 100 for %

- initialize *tipCalculated* and set it equal to tipRate * billAmount

- initialize *total* and set it equal to *billAmount* + *tipRate*
	- make sure number has 2 decimal places
		- round number to nearest cent

- output message with calculated *tipRate* and total.
	- your tip is $1.69 your total is $12.94

- set min amount on tip, 1%. max is 100%

- set min amount on bill. min is 1 and max is 5000

- format all numbers properly, i.e 15% and $100.00

## More things to consider	