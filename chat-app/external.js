
		function isValidR(Registration) {
			const username = Registration.username.value;
			const password = Registration.password.value;
			const email = Registration.email.value;


			if (username === "" || password === "" || email === "") {
				document.getElementById("message").innerHTML = "Please fill up the form properly (JS)";
				return false;
			}

			return true;
		}

		function isValidL(Login) {
			const username = Login.username.value;
			const password = Login.password.value;

			if (username === "" || password === "" ) {
				document.getElementById("message").innerHTML = "Please fill up the form properly (JS)";
				return false;
			}

			return true;
		}