<?php
session_start();
	include_once('class/autoload.php');
	if(isset($_SESSION['id'])){
			$site = new page_base_securisee_patient('Temoignage');
			$site->js='jquery.tooltipster.min';
			$site->js='jquery.validate.min';
			$site->js='messages_fr';
			$site->css='tooltipster';
	}
	else 
	{
		$site = new page_base('Temoignage');
	}
	$controleur = new controleur();
	$site-> left_sidebar=$controleur->optionPatient();
	$site-> right_sidebar=$controleur->retourne_formulaire_ajoutTemoignage();
	$site->affiche();
?>