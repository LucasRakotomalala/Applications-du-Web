var x; // le premier nombre de la multiplication
var y; // le deuxième nombre de la multiplication

// donne le rôle du bouton :
// si 'verifier' est 'true' alors le prochain clic sur le bouton
// est destiné à vérifier la réponse de l'utilisateur, sinon,
// le clic est destiné à proposer une nouvelle multiplication
var verifier = true; 

// génére une nouvelle multiplication, autrement dit :
// - génère deux entiers au hasard dans l'intervalle [1,9]
// - les affiche dans les bons éléments HTML
function nouvelle() {
	x = Math.floor((Math.random() * 10) + 1);
	y = Math.floor((Math.random() * 10) + 1);
	document.getElementById("nombre1").innerHTML = x;
	document.getElementById("nombre2").innerHTML = y;
	document.getElementById("resultat").innerHTML = "";
}

// cette fonction est appelée quand l'utilisateur clique
// sur le bouton. La fonction a deux rôles alternatifs :
// - vérifier que la proposition de l'utilisateur est correcte
// - générer une nouvelle multiplication
// Cette alternance est gérée à l'aide de la variable 'verifier'
function valider() {
	let proposition = document.getElementById("proposition").value;
	let resultat = document.getElementById("resultat");
	resultat.innerHTML = "";
	if (proposition == '' || isNaN(proposition)) {
		alert("Veuillez saisir un nombre !");
	}
	else if (verifier) {
		resultat.style.visibility = "visible";
		if (x*y == proposition) {
			resultat.style.color = "green";
			resultat.innerHTML = "Bonne réponse !";
		}
		else {
			resultat.style.color = "red";
			resultat.innerHTML = "Mauvaise réponse : "+x+" x "+y+" = "+x*y+" !";
		}
		document.getElementById("bouton").value = "Nouvelle multiplication";
		verifier = false;
	}
	else {
		resultat.style.visibility = "hidden";
		//resultat.innerHTML = "Ici, on affiche 'Bonne' ou 'Mauvaise' réponse";
		document.getElementById("bouton").value = "Vérifier";
		document.getElementById("proposition").value = '';
		nouvelle();	
		verifier = true;
	}
}