// calcule le prix TTC à partir du prix hors-taxe
// et de la TVA
// affiche une alerte avec un message d'erreur si les
// valeurs fournies ne sont pas des nombres
function prixTTC() {
	let resultat = document.getElementById("resultat");
	let prixHorsTaxe = document.getElementById("pht").value;
	let TVA = document.getElementById("tva").value/100;

	if (prixHorsTaxe == "" || TVA == "") {
		alert("Veuillez remplir les 2 champs !");
	}

	else if (isNaN(prixHorsTaxe) || isNaN(TVA)) {
		alert("Les valeurs saisies ne sont pas des nombres !");
	} else {
		let calcul = parseFloat(prixHorsTaxe)+parseFloat(prixHorsTaxe)*parseFloat(TVA);
		document.getElementById("pttc").innerHTML = calcul.toFixed(2);
		document.getElementById("resultat").style.visibility = "visible";	
	}
}
