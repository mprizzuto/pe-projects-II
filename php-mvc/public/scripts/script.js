function getClientTime() {
  let date = new Date();

  let minutes = date.getMinutes();

	let hours = date.getHours();

  let seconds = date.getSeconds();

  let amOrPm = hours >= 12 ? "pm" : "am";

  // console.log(`${hours}:${minutes} ${amOrPm}`);
  return `${hours}:${minutes} ${amOrPm}`;
}

let guestData = document.querySelectorAll("#guestbook-form [id*='guest']");

const [name, comment] = guestData;

let isUnValid = isUserNameValid(name);

let form = document.querySelector("button");

let userMessage = document.querySelector(".user-message");

function isUserNameValid($name) {
	let validName = /[^a-zA-Z_0-9]/;

	if ( validName.test($name) ) {
		return false;
	}
	return true;
}



form?.addEventListener("submit", (event) => {

	if ( event.target.id === "guest-name" ) {
		if ( isUserNameValid(event.target.value) === false ) {
			event.preventDefault();
		}
		else {
			console.log("SUBI")
		}
	}

});

let submitButton = document.querySelector("button");

name?.addEventListener("input", (event) => {
	console.log(event.target.value);

	if (isUserNameValid(event.target.value) === false
    && event.target.value.length > 0) {

		event.target.style.border = "3px solid red";
		userMessage.textContent = "username must follow the password policy";
    submitButton.disabled = true;
    event.preventDefault();

	}
	else {
		userMessage.textContent = "";
		event.target.style.border = "";
    submitButton.disabled = false;
	}
});

comment?.addEventListener("input", (event) => {
  // console.log(event.target.value);

  if (event.target.value.trim().length === 0
    && event.target.value.length > 0) {

    event.target.style.border = "3px solid red";
    // userMessage.textContent = "no emoty spaces allowed";
    event.currentTarget.parentElement.querySelector(".user-message").textContent = "invalid: whitespace only";
    console.log();
    submitButton.disabled = true;
    event.preventDefault();

  }
  else {
    event.currentTarget.parentElement.querySelector(".user-message").textContent = "";
    submitButton.disabled = false;
  }
});




