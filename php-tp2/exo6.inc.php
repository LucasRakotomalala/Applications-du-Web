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
    // les trois notes, la moyenne de ces notes et le lien
    // pour pouvoir modifier les informations de l'étudiant
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
			<td><a href='exo6-mod-formulaire.php?id=".$ids."'>Modifier</a></td>
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
    	foreach (student_array($students) as $ids => $tabs) {
    		if (normalize($name) == $tabs[0] || normalize($name) == $tabs[1] || normalize($name) == "") {
    			$table.= student_score($ids,student_array($students), score_array($scores));
    		}
		}
		return $table;
    }

	// retourne le contenu de l'élément HTML FORM
	// pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
    function form_content($id,$students,$scores) {
       $final="";
       foreach (student_array($students) as $ids => $tabs) {
       	if ($ids==$id) {
       		$final.='				<td>'.$id.'</td>
				<td>
					<input type="text" name="prenom" value="'.$tabs[0].'">
				</td>
				<td>
					<input type="text" name="nom" value="'.$tabs[1].'">
				</td>'."\n";
       	}
       }
       foreach (score_array($scores) as $ids => $tabnotes) {
       	if ($ids==$id) {
       		$final.='				<td>
					<input type="text" name="score1" value="'.$tabnotes[0].'">
				</td>
				<td>
					<input type="text" name="score2" value="'.$tabnotes[1].'">
				</td>
				<td>
					<input type="text" name="score3" value="'.$tabnotes[2].'">
				</td>
				<td>'.average($tabnotes).'</td>
				<td>
					<input type="submit" value="Valider">
				</td>
				<input type="hidden" name="id" value="'.$id.'">';
       	}
       }
       return $final;
    }

    // sauve le tableau associatif '$array' dans le
	// fichier '$file' au format CSV. Le tableau est de
	// la forme [ ID => INFO ] où INFO est un tableau de
	// valeurs (associatif ou pas)
	function save_array($array, $file) {
		$oldFile=fopen($file, 'r');
		$newFile=fopen($file, 'w');
		//fputcsv($newFile, $array, ";");
		foreach ($array as $fields) {
			fputcsv($newFile, string(key($array)), ";");
			fputcsv($newFile, $fields, ";");
		}
		fclose($oldFile);
		fclose($newFile);
		
	}

	// modifie le contenu du tableau '$students' en associant les
	// valeurs '$firstnme' et '$lastname' aux clefs 'prenom' et 'nom'
	// pour la clef '$id'
    function update_student_array(&$students,$id,$firstname,$lastname) {
    	$newStudents=$students;
      foreach (student_array($newStudents) as $ids => $tabs) {
    		if ($id==$ids) {
    			$tabs[0] = $firstname;
    			$tabs[1] = $lastname;
    		}
    	}
    	save_array(student_array($newStudents), $students);
    }

	// modifie le contenu du tableau '$scores' en associant les
	// valeurs '$score1', '$score2' et '$score3' à la clef '$id'	
    function update_score_array(&$scores,$id,$score1,$score2,$score3) {
    	$newScores=$scores;
    	foreach (score_array($newScores) as $ids => $tabnotes) {
    		if ($id==$ids) {
    			$tabnotes[0] = $score1;
    			$tabnotes[1] = $score2;
    			$tabnotes[2] = $score3;
    		}
    	}
    	//print_r(score_array($scores));
    	save_array(score_array($newScores), $scores);
    	//print_r(score_array($newScoresArray));
    }
    
    $STUDENT_FILE = "exo5-6/students.csv";
    $SCORE_FILE = "exo5-6/scores.csv";

?>
