<?php

	// retourne une chaîne de caractères identique
	// à '$nom' mais avec tous les caractères en
	// minuscule et avec la première lettre en majuscule
	function normalize($nom) {
    	$nom = strtolower($nom); //Mets toute la chaîne en minuscule
    	$nom = ucfirst($nom); //Mets la 1ère lettre de la chaîne en majuscule
    	$nom = trim($nom); //Supprime les caractères invisibles en début et fin de chaîne

    	return $nom;
		
    }
    
	// lit le fichier '$student_file' et retourne un tableau
	// associatif de la forme [ ID => [ PRENOM , NOM ], ... ]
	// où ID est l'identifiant, PRENOM le prénom et
	// NOM le nom de l'étudiant
	function student_array($student_file) {
		$lines=[];
		$students=[];
		$final=[];
		foreach (file($student_file) as $line) {
			array_push($lines, explode(" ", $line));
		}
		foreach ($lines as $value) {
			for ($indice=0; $indice<1; $indice++) {
				array_push($students, explode(";", $value[$indice]));
			}
		}
		for ($indice=0; $indice<count($students); $indice++) {
			$final[$students[$indice][0]]=[normalize($students[$indice][1]), normalize($students[$indice][2])];
		}
		return $final;
	}
	
	// lit le fichier '$score_file' et retourne un tableau
	// associatif de la forme [ ID => [ NOTE1, NOTE2, NOTE3 ], ... ]
	// où ID est l'identifiant, et NOTE1, NOTE2 et NOTE3 les trois
	// notes obtenues par l'étudiant
	function score_array($score_file) {
		$lines=[];
		$students=[];
		$final=[];
		foreach (file($score_file) as $line) {
			array_push($lines, explode(" ", $line));
		}
		foreach ($lines as $value) {
			for ($indice=0; $indice<1; $indice++) {
				array_push($students, explode(";", $value[$indice]));
			}
		}
		for ($indice=0; $indice<count($students); $indice++) {
			$final[$students[$indice][0]]=[$students[$indice][1], $students[$indice][2], $students[$indice][3]];
		}
		return $final;
	}		

	// retourne la moyenne des valeurs
	// contenues dans le tableau '$tabnotes'
	function average($tabnotes) {
		$moyenne=array_sum($tabnotes)/count($tabnotes);
		$moyenne=round($moyenne, 2);
		return $moyenne;
    }
    
    // retourne le TR adéquat qui contient successivement dans
	// les sept TD successifs l'identifiant, le prénom, le nom,
	// les trois notes et la moyenne de ces notes
	function student_score($id,$info,$score) {
		$display = "		<tr>\n";
		foreach ($info as $ids => $infos) {
			if ($id==$ids) {
				$display.="			<td>$id</td>
			<td>$infos[0]</td>
			<td>".trim($infos[1])."</td>\n";
			}
		}
		foreach ($score as $ids => $notes) {
			if ($id==$ids) {
				$display.="			<td>$notes[0]</td>
			<td>$notes[1]</td>
			<td>".trim($notes[2])."</td>
			<td>".average($notes)."</td>
		</tr>\n";
			}
		}
		return $display;
    }
    
    // retourne les TR adéquats qui contiennent successivement
    // les informations des étudiants sélectionnés suivant la
    // valeur de '$name' :
    // - si '$name' est le prénom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est le nom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est la chaîne vide, l'étudiant est sélectionné
    function table_content($name,$students,$scores) {
    	$table="";
    	foreach (student_array($students) as $id => $tabs) {
    		if (normalize($name) == $tabs[0] || normalize($name) == $tabs[1] || normalize($name) == "") {
    			$table.= student_score($id,student_array($students), score_array($scores));
    		}
		}
		return $table;
    }
    
    $STUDENT_FILE = "exo5-6/students.csv";
    $SCORE_FILE = "exo5-6/scores.csv";
    //echo student_score("1012",student_array($STUDENT_FILE), score_array($SCORE_FILE));
    //print_r(student_array($STUDENT_FILE));
?>
