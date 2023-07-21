console.clear();


let passwordValidator = {
	credentialsMap: [],
  getPassWord: function() {
    return document.querySelector("#user-password").value;
  },
  getUserName: function () {
    return document.querySelector("#username").value;
  },
  isUserNameValid: function(str) {
    return /^(?=.*[a-zA-Z])[a-zA-Z0-9!@#$%^&*()]*$/gi.test(str);
  },
  saveCredentials: function() {
    let credentials = {
      userName: this.getUserName(),
      passWord: this.getPassWord(),
    }
    this.credentialsMap.push([credentials]);
  },
  getCredentials: function() {
    return this.credentialsMap;
  },
  areCredentialsValid: function({userName, passWord}) {
  
  },
  doesPassWordMatchMaster: function() {
    // console.log(this.getPassWord() === this.getMasterPassWord());
    return this.getPassWord() === this.getMasterPassWord();
  },
  getMasterPassWord: function() {
    return "HelloWorld";
  }
};


let results = document.querySelector("results");
// console.log(results);
let masterPw = passwordValidator.getMasterPassWord("helloWorld");

function generateMessage() {
  if ( checkEmptyString(passwordValidator.getUserName()) || checkEmptyString(passwordValidator.getPassWord()) ) {
    results.textContent = "required!";
  }
  
  if (passwordValidator.doesPassWordMatchMaster()) {
    results.textContent = "welcome back" + passwordValidator.getUserName();
  }
  else {
    results.textContent = "i don't know you!";
    // console.log();
  }
}

function checkEmptyString(str) {
  return str.trim().length === 0;
}

passwordValidator.getMasterPassWord("dogsRule");
window.addEventListener("submit", (event) => {
  event.preventDefault();
  
  // console.log(passwordValidator.getPassWord());
  
  generateMessage();
});


