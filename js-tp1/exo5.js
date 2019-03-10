// le nombre d'essais dans la partie courante
var essais = 0;
// le nombre total d'essais de toutes les parties
var nbEssais = 0;
// le nombre de paties jouées et terminées
var nbParties = 0;
// indique si on est en train de jouer une partie
var partieEnCours = true;
// le nombre à deviner
var secret = generer();
// le nombre d'essais du meilleur jeu
// Number.MAX_SAFE_INTEGER est la plus grande valeur
// entière possible
var meilleurJeu = Number.MAX_SAFE_INTEGER;

// vérifie la proposition de l'utilisateur et :
// - si la proposition est incorrecte, affiche la bonne
//   indication (trop petit ou trop grand)
// - sinon affiche le nombre d'essais qui ont été nécessaires
//   et mets à jour les statistiques
function verifier() {
	let proposition = document.getElementById("proposition").value;
	let message = document.getElementById("message");
	console.log(secret);
	if (isNaN(proposition) || proposition == '') {
		afficher("Veuillez saisir un nombre !","red");
	} else {
		if (proposition < secret) {
				afficher("C'est plus grand que "+proposition+".<br>Réessaie !","red");
				nbEssais += 1;
				essais += 1;
		}
		else if (proposition > secret) {
			afficher("C'est plus petit que "+proposition+".<br>Réessaie !","red");
			nbEssais += 1;
			essais += 1;
		} else {
			afficher("Bravo, c'était "+proposition+" !<br>Nombre d'essais : "+essais+".", "green");
			nbParties += 1;
			if (essais < meilleurJeu) {
				meilleurJeu = essais;
			}
			afficherStat();
			essais=0;
			partieEnCours = false;
		}
	}
	document.getElementById("proposition").value = '';
	if (!partieEnCours) {
		document.getElementById("question").style.visibility = "visible";
	}
}

// si 'encore' est vrai, démarre une nouvelle partie
// sinon termine le jeu en affichant le message adéquat
function jouerEncore(encore) {
	if (encore) {
		secret = generer();
		afficher("C'est parti pour une nouvelle manche !","blue");
		document.getElementById("proposition").value = '';
		partieEnCours = true;
	} else {
		afficher("Recharge la page pour jouer à nouveau ou clique <a href='javascript:location.reload()'>ici</a> !","red");
	}
	document.getElementById("question").style.visibility = "hidden";

}

// affiche un message dans une couleur donnée
// dans l'élément prévu à cet effet
function afficher(message, couleur) {
	let msg = document.getElementById("message");
	msg.innerHTML = message;
	msg.style.color = couleur;

}

// met à jour les statistiques
function afficherStat() {
	document.getElementById("nbParties").innerHTML = nbParties;
	document.getElementById("nbMoyenEssais").innerHTML = (nbEssais/nbParties).toFixed(1);
	document.getElementById("meilleurJeu").innerHTML = meilleurJeu;
}

// retourne un nombre aléatoire dans l'intervalle [1, 100]
function generer() {
	return Math.floor((Math.random() * 100) + 1);
}
