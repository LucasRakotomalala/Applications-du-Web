// étant donnée la moyenne 'm'
// retourne l'appréciation correspondante
// (une chaîne de caractères)
function appreciation(m) {
	var res = document.getElementById("appreciation");
	if (m<6) {
		res.innerHTML = "Très insuffisant";
	}
	else if (m>=6 && m<10) {
		res.innerHTML = "Insuffisant";
	}
	else if (m>=10 && m<13) {
		res.innerHTML = "Moyen";
	}
	else if (m>=13 && m<16) {
		res.innerHTML = "Bien";
	}
	else if (m>=16 && m<19) {
		res.innerHTML = "Très bien";
	}
	else {
		res.innerHTML = "Excellent";
	}
}

// calcule la moyenne à partir des trois notes
// et affiche la mmoyenne et l'appréciation correspondante
function calculer() {
	let note1 = document.getElementById("note1").value;
	let note2 = document.getElementById("note2").value;
	let note3 = document.getElementById("note3").value;

	if (note1 == "" || note2 == "" || note3 == "") {
		alert("Veuillez remplir les 3 champs de note !");
	}
	else if (isNaN(note1) || isNaN(note2) || isNaN(note3)) {
		alert("Les valeurs saisies ne sont pas des nombres !");
	} else {
		let moyenne = (parseFloat(note1)+parseFloat(note2)+parseFloat(note3))/3;
		document.getElementById("moyenne").innerHTML = moyenne.toFixed(2);
		document.getElementById("resultat").style.visibility = "visible";
		appreciation(moyenne);	
	}
}
