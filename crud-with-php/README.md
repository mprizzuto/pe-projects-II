# PE LESSON:  PHP with crud

## goal
to create a CRUD app with php. It has a create, list, and detail page. For the data i decided to create bread recipes

## pseudocode
create form to get the bread recipes. the fields are
- levain
- salt
- water 
- flour type

- check request method for form

- get items from $POST array, filter out submit value. encode as JSON and write to formula-data.json. 
- get reference to formula-data.json file
- on submit, if $POST is greater than 0 and isset, push to formula-data.json
- create generateRecipe function to template out the data from JSON as HTML. make sure to
- on list page, loop over $POST array
- for each item, add a query string for the detail and unique hexadecimal id

- 