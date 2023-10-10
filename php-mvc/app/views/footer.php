				
				</inner-column>
			</section>
		</main>
		
		<footer>
			<inner-column>
				<h2>footer</h2>
			</inner-column>
		</footer>
		<script>
			function getClientTime() {
				let date = new Date();

				let minutes = date.getMinutes();

				let hours = date.getHours();

			  let seconds = date.getSeconds();

			  let amOrPm = hours >= 12 ? "pm" : "am";

			  console.log(`${hours}:${minutes} ${amOrPm}`);
			  return `${hours}:${minutes} ${amOrPm}`;

			}

			let guestData = document.querySelectorAll("#guestbook-form [id*='guest']");

			const [name, comment] = guestData;

			function isUserNameValid($name) {
				let validName = /[^a-zA-Z_0-9]/;

				if ( validName.test($name) ) {
					return false;
				}
				return true;
			}

			let isUnValid = isUserNameValid(name);
			let form = document.querySelector("button");
			let userMessage = document.querySelector(".user-message");

			form?.addEventListener("submit", (event) => {
				// console.log(event);
				// event.preventDefault();

				if ( event.target.id === "guest-name" ) {
					// event.preventDefault();

					if ( isUserNameValid(event.target.value) === false ) {
						alert("bad un");
						event.preventDefault();
					}
					else {
						console.log("SUBI")
					}
				}

			});



			name?.addEventListener("input", (event) => {
				// console.log(event.target.value);

				if (isUserNameValid(event.target.value) === false && event.target.value.length > 0) {
					// console.log("bbad name", isUserNameValid(name.value));
					// console.log(name);
					// name.insertAdjacentHTML("afterbegin", "<span>invalid name</span>");
					// event.target.border.style = "3px solid red";
					event.target.style.border = "3px solid red";
					userMessage.textContent = "username must follow the password policy";
				}
				else {
					userMessage.textContent = "";
					event.target.style.border = "";
				}
			});

			comment?.addEventListener("input", (event) => {
				console.log(event.target);
			});
			console.log(comment)



		</script>
	</body>
</html>