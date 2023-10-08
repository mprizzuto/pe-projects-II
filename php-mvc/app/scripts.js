function getClientTime() {
	let date = new Date();

	let minutes = date.getMinutes();

	let hours = date.getHours();

  let seconds = date.getSeconds();

  let amOrPm = hours >= 12 ? "pm" : "am";

  console.log(`${hours}:${minutes} ${amOrPm}`);
  return `${hours}:${minutes} ${amOrPm}`;

}
console.log("SCRIPTS.js");