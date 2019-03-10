<?php

    // pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
	function makeRadio($info,$name) {
 		$display="		<div>\n";
		foreach($info as $key => $value) {
			$display.="			<fieldset>
				<input type='radio' name='".$name."' value='".$key."'> ".$value[0]."
			</fieldset>\n";
		}
 		$display.="		</div>\n";
 		return $display;
	}
	
	// retourne le nom du pays de clef '$key'
	// '$key' est la clef dp nt la valeur est
	// l'information dans le tableau associatif '$info'
	function getCountryName($key,$info) {
		$countryName=$info[$key][0];
		return $countryName;
	}
	
	// retourne le nom de la capitale de clef '$key'
	// '$key' est la clef dp nt la valeur est
	// l'information dans le tableau associatif '$info'	
	function getCapitalName($key,$info) {
		$capitalName=$info[$key][2];
		return $capitalName;

	}
	
	// retourne l'élément HTML IMG qui est l'image
	// du pays de clef '$key'
	// '$key' est la clef dp nt la valeur est
	// l'information dans le tableau associatif '$info'	
	function getCountryImage($key,$info) {
		$countryImage=$info[$key][1];
		$display="		<img class='exo2-3' src='exo2-3/".$countryImage."' alt='".getCountryName($key,$info)."' title='".getCountryName($key,$info)."'>";
		return $display;
	}
	
	// retourne l'élément HTML IMG qui est l'image
	// de la capitale de clef '$key'
	// '$key' est la clef dp nt la valeur est
	// l'information dans le tableau associatif '$info'
	function getCapitalImage($key,$info) {
		$capitalImage=$info[$key][3];
		$display="		<img class='exo2-3' src='exo2-3/".$capitalImage."' alt='".getCapitalName($key,$info)."' title='".getCapitalName($key,$info)."'>";
		return $display;
	}

	$INFO = [];
	$token = [];
	foreach (file("exo2-3/data.csv") as $line) {
		array_push($token, explode(",", $line));
	}

	for ($indice=0; $indice<count($token);$indice++) {
		$indicePays=$indice+1;
		$INFO["pays".$indicePays] = $token[$indice];
	}

	//// ici on doit remplir le tableau $INFO à partir des données contenues dans le fichier 'exo2-3/data.csv'

	
?>

