console.clear();

let submitButton = document.querySelector("#efp-employee-form button");

function isValidEmployeeName($employee) {
	return /^[a-zA-Z\s]+$/.test($employee);
}

let employeeName = document.querySelector("#employee-name");

let validationError = document.querySelector("#validation-error");

function styleError() {
    // let employeeName = document.querySelector("#employee-name");
    employeeName.style.border = "3px solid red";
    event.target.parentElement.querySelector("#error-message").textContent = " error: letters only";
    submitButton.disabled = true;
    validationError.textContent = "";
}

employeeName.addEventListener("input", (event) => {
	if ( isValidEmployeeName(event.target.value) === false && 
    event.target.value.length !== 0
) {
    styleError();
	}
  if (event.target.value.trim().length === 0 && event.target.value.length !== 0 ) {
    styleError();
  }
  else {
    employeeName.style.border = "";
    event.target.parentElement.querySelector("#error-message").textContent = "";
    submitButton.disabled = false;
  }
  // console.log(isValidEmployeeName(event.target.value));
});
