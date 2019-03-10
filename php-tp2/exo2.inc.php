<?php
	$INFO = [
		"pays1"  => [ "Afrique du Sud", "afrique-du-sud.jpg", "Prétoria", "pretoria.jpg" ],
		"pays2"  => [ "Allemagne", "allemagne.jpg", "Berlin", "berlin.jpg" ],
		"pays3"  => [ "Australie", "australie.jpg", "Canberra", "canberra.jpg" ],
		"pays4"  => [ "Etats-Unis", "usa.jpg", "Washington", "washington.jpg" ],
		"pays5"  => [ "Vietnam", "vietnam.jpg", "Hanoi", "hanoi.jpg" ]
	];

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
?>
