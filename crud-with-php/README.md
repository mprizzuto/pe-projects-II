# PE LESSON: PHP with crud

## goal
to create a CRUD app with php. It has a create, list(read), update, delete, and detail page. For the data in decided to create bread recipes

## pseudocode
- create
	- get POST data from form submission
		- make into json object
	- ensure valid entries, create database of array of JSON objects in recipe-data.json
	- push to recipe-data.json

- read
	- get recipe-data.json
	- loop over it
	- sanitize data and template out the data as list items.

	- detail
	- on the detail page, the template should have two links
		- link one is update
		- upon clicking. brings user to update page. when clicked, create detail and id query string
	- link two is delete. when clicked, create detail and id query string

- update
	- upon form submission from update.php, find id in $GET arr. associate it with id in recipe-data.json
	- update value based on from submission from update.php

- delete
	- get element by id from the database
	- match it with the id in $GET arr.
	- on detail page, if delete link is clicked. it brings user to delete page with text output "you have deleted $id"
	- if user uses back button to delete previously deleted item, text output says "you already deleted id"
		- check database for id. if not found output "you either deleted the item or it doesnt exist"