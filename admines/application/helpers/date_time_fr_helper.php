<?php
function date_fr($date){
   $date= date_create($date);
    return date_format($date, 'd/m/Y');   
}

function date_fr_heur($date){
   $date= date_create($date);
    return date_format($date, 'H') .'h:'.date_format($date, 'i');   
}
function date_fr_dmy($date){
	$date= date_create($date);
    $date= date_format($date, 'w/d/n/Y');
   $nom_jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");

	list($nom_jour, $jour, $mois, $annee) = explode('/', $date);
	return $nom_jour_fr[$nom_jour].' '.($jour*1).' '.$mois_fr[$mois].' '.$annee; 
  
}
function date_fr_lettre(){
	$nom_jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");

	list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));
	return $nom_jour_fr[$nom_jour].' '.($jour*1).' '.$mois_fr[$mois].' '.$annee; 
 
 
}


function date_fr_day ($date){
	$date= date_create($date);
    $date= date_format($date, 'w/d/n/Y');
	$nom_jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");

	list($nom_jour, $jour, $mois, $annee) = explode('/', $date);
	return $nom_jour_fr[$nom_jour].' '.($jour*1); 
 
 
}

function date_fr_lettre_home(){

	$nom_jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");

	list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));
	return $nom_jour_fr[$nom_jour].' '.($jour*1).' '.$mois_fr[$mois].' '.$annee; 
 
 
}

	function date_check_day($day) {
			$message="";
			
			$date = date('Y-m-d', strtotime("+".$day."day"));
			$timestamp = strtotime($date);

			$weekday= date("l", $timestamp );
 
			if ($weekday =="Saturday" OR $weekday =="Sunday") {
						$message="(weekend)";
						return $message; 
			} else {
					$days = explode("-", $date);
					
					$JourFerie = checkJourFerie(mktime(0,0,0,$days[1],$days[2],$days[0]));
				
					if($JourFerie) {
					
					$message="(jours de fériée)";
					return $message; 				 
						  } else {

						 return $message;
					   }
					

			

			}
			return $message;
	}
		function checkJourFerie($timestamp)
		{
				$jour = date("d", $timestamp);
				$mois = date("m", $timestamp);
				$annee = date("Y", $timestamp);
				$EstFerie = 0;
				// dates fériées fixes
				if($jour == 1 && $mois == 1) $EstFerie = 1; // 1er janvier
				if($jour == 1 && $mois == 5) $EstFerie = 1; // 1er mai
				if($jour == 8 && $mois == 5) $EstFerie = 1; // 8 mai
				if($jour == 14 && $mois == 7) $EstFerie = 1; // 14 juillet
				if($jour == 15 && $mois == 8) $EstFerie = 1; // 15 aout
				if($jour == 1 && $mois == 11) $EstFerie = 1; // 1 novembre
				if($jour == 11 && $mois == 11) $EstFerie = 1; // 11 novembre
				if($jour == 25 && $mois == 12) $EstFerie = 1; // 25 décembre
				// fetes religieuses mobiles
				$pak = easter_date($annee);
				$jp = date("d", $pak);
				$mp = date("m", $pak);
				if($jp == $jour && $mp == $mois){ $EstFerie = 1;} // Pâques
				$lpk = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak)
				, date("d", $pak) +1, date("Y", $pak) );
				$jp = date("d", $lpk);
				$mp = date("m", $lpk);
				if($jp == $jour && $mp == $mois){ $EstFerie = 1; }// Lundi de Pâques
				$asc = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak)
				, date("d", $pak) + 39, date("Y", $pak) );
				$jp = date("d", $asc);
				$mp = date("m", $asc);
				if($jp == $jour && $mp == $mois){ $EstFerie = 1;}//ascension
				$pe = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak),
				date("d", $pak) + 49, date("Y", $pak) );
				$jp = date("d", $pe);
				$mp = date("m", $pe);
				if($jp == $jour && $mp == $mois) {$EstFerie = 1;}// Pentecôte
				$lp = mktime(date("H", $asc), date("i", $pak), date("s", $pak), date("m", $pak),
				date("d", $pak) + 50, date("Y", $pak) );
				$jp = date("d", $lp);
				$mp = date("m", $lp);
				if($jp == $jour && $mp == $mois) {$EstFerie = 1;}// lundi Pentecôte
				// Samedis et dimanches
				$jour_sem = jddayofweek(unixtojd($timestamp), 0);
				if($jour_sem == 0 || $jour_sem == 6) $EstFerie = 1;
				// ces deux lignes au dessus sont à retirer si vous ne désirez pas faire
				// apparaitre les
				// samedis et dimanches comme fériés.
				return $EstFerie;
		}
