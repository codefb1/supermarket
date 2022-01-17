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

	list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));
	return $nom_jour_fr[$nom_jour].' '.($jour*1).' '.$mois_fr[$mois].' '.$annee; 
  
}
function date_fr_lettre(){
	$nom_jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");

	list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));
	return $nom_jour_fr[$nom_jour].' '.($jour*1).' '.$mois_fr[$mois].' '.$annee; 
 
 
}
