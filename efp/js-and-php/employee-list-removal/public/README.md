## Goal
Create a small program that contains a list of employee names. Print out the list of names when the program runs the first time. Prompt for an employee name and remove that specific name from the list of names. Display the remaining employees, each on its own line

# inputs
employee to remove

# outputs
the list of employees minus the one removed

# constraints

## tests
- prompt for employee to remove
  - valid name
- output list of names - employee

- prompt for employee to rremove
  - invalid name
  - output error message "invalid name"
  
  *There are 5 employees:*
   John Smith
   Jackie Jackson
   Chris Jones
   Amanda Cullen
   Jeremy Goodwin
   
   **Enter an employee name to remove: Chris Jones**
   
   *There are 4 employees:*
   John Smith
   Jackie Jackson
   Amanda Cullen
   Jeremy Goodwin
  

## pseudocode
- explain the rules of employee names
- initialie an array of employees

- using a form prompt for the name of the employee to remove
  - if input contains anything other than letters, output an error
  
  - if input isnt found in list of employees, output "employee not found"
  - trim spaces at beginning and end of input
  
-   
