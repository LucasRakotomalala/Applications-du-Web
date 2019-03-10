// teste si les champs du formulaire sont corrects et :
// - si ils le sont, retourne 'true'
// - sinon, affiche le message d'erreur adéquat dans
//   l'emplacement prévu à cet effet, et retourne 'false'
function checkform() {
	let log = document.getElementById("log").value;
	let pass1 = document.getElementById("pass1").value;
	let pass2 = document.getElementById("pass2").value;

	let pattern = new RegExp("[0-9]+", "g");
	if (!pattern.test(log) & log.length>=3) {
		if (pass1.length>=4) {
			if (pass1==pass2) {
				return true;
			} else {
				errormsg("La vérification du mot de passe n'est pas bonne.");
				return false;
			}
		} else {
			errormsg("Veuillez saisir un mot de passe d'au moins 4 caractères.");
			return false;
		}
	} else {
		errormsg("Veuillez saisir un nom d'utilisateur d'au moins 3 caractères sans chiffre.");
		return false;
	}
}

// efface le contenu de l'élément où on affiche
// les messages d'erreur et cache cet élément
function resetform() {
	let resetErrorMessage = document.getElementById("erreur")
	resetErrorMessage.style.visibility = "hidden";
	resetErrorMessage.innerHTML = "";
}

// écrit 'msg' dans l'élément où on affiche
// les messages d'erreur et montre cet élément
function errormsg(msg) {
	let errorMessage = document.getElementById("erreur")
	errorMessage.style.visibility = "visible";
	errorMessage.innerHTML = msg;
}