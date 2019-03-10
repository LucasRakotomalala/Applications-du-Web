<?php
    
    // remplit les tableaux '$day', '$month' et '$lang'
    // à partir des informations contenues dans les fichiers
    // '*.txt' contenus dans le répertoire '$folderpath'
    function fillArrays($folderpath,&$day,&$month,&$lang) {
        $indiceKey=1;
        $indiceLang=0;
        $indiceDay=1;
        $indiceMonth=2;
        $files=glob($folderpath."/*.csv");
        foreach ($files as $file) {
            $token = [];
            foreach (file($file) as $line) {
                array_push($token, explode(",", $line));
            }
            $lang["lang$indiceKey"]=$token[$indiceLang];
            $day["lang$indiceKey"]=$token[$indiceDay];
            $month["lang$indiceKey"]=$token[$indiceMonth];
            $indiceKey+=1;            
        }
    }
 

    // pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
	function makeRadio($keyval,$name) {
        $display="      <div>\n";
        foreach($keyval as $key => $value) {
            $display.="         <fieldset>
                <input type='radio' name='".$name."' value='".$key."'> ".$value[0]."
            </fieldset>\n";
        }
        $display.="     </div>\n";
        return $display;
    }

    // retourne une chaîne de caractères qui donne
    // la date dans la langue déterminée par le code '$langue'    
    function makeDate($langue,$jour,$mois) {
        $display="";
        foreach ($jour as $key => $value) {
            if ($key == $langue) {
                $display.=$value[(date("w"))]." ".date("j")." ";
            }
        }

        foreach ($mois as $key => $value) {
            if ($key == $langue) {
                $display.=$value[(date("n"))-1]." ".date("Y");
            }
        }

        return $display;
 
    }

    $LANGUE = [];
    $JOUR = [];
    $MOIS = [];

    fillArrays("exo4",$JOUR,$MOIS,$LANGUE);
?>
