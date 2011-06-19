<?php
//****************************************************************
//
// Createur : Julien PIERRE
// Date de creation : 17/11/2010
// Fichier : ListeAdherentCommandeReservationViewManager.php
//
// Description : Classe de gestion des ListeAdherentCommande
//
//****************************************************************
// Inclusion des classes
include_once(CHEMIN_CLASSES_UTILS . "DbUtils.php");
include_once(CHEMIN_CLASSES_UTILS . "StringUtils.php");
include_once(CHEMIN_CLASSES_VIEW_VO . "ListeAdherentCommandeReservationViewVO.php");
include_once(CHEMIN_CLASSES_MANAGERS . "CommandeManager.php");
include_once(CHEMIN_CLASSES_MANAGERS . "AdherentManager.php");
include_once(CHEMIN_CLASSES_MANAGERS . "CompteManager.php");

/**
 * @name ListeAdherentCommandeReservationViewManager
 * @author Julien PIERRE
 * @since 17/11/2010
 * 
 * @desc Classe permettant l'accès aux données des ListeAdherentCommande
 */
class ListeAdherentCommandeReservationViewManager
{
	const VUE_LISTEADHERENTCOMMANDE_RESERVATION = "view_liste_adherent_commande_reservation";

	/**
	* @name select($pId)
	* @param integer
	* @return ListeAdherentCommandeReservationViewVO
	* @desc Récupère la ligne correspondant à l'id en paramètre, créé une ListeAdherentCommandeReservationViewVO contenant les informations et la renvoie
	*/
	public static function select($pId) {
		// Initialisation du Logger
		$lLogger = &Log::singleton('file', CHEMIN_FICHIER_LOGS);
		$lLogger->setMask(Log::MAX(LOG_LEVEL));

		$lRequete =
			"SELECT "
			    . CommandeManager::CHAMP_COMMANDE_ID . 
			"," . CommandeManager::CHAMP_COMMANDE_NUMERO . 
			"," . AdherentManager::CHAMP_ADHERENT_ID . 
			"," . AdherentManager::CHAMP_ADHERENT_NUMERO . 
			"," . CompteManager::CHAMP_COMPTE_LABEL . 
			"," . AdherentManager::CHAMP_ADHERENT_NOM . 
			"," . AdherentManager::CHAMP_ADHERENT_PRENOM . "
			FROM " . ListeAdherentCommandeReservationViewManager::VUE_LISTEADHERENTCOMMANDE_RESERVATION . " 
			WHERE " . CommandeManager::CHAMP_COMMANDE_ID . " = '" . StringUtils::securiser($pId) . "'";

		$lLogger->log("Execution de la requete : " . $lRequete,PEAR_LOG_DEBUG); // Maj des logs
		$lSql = Dbutils::executerRequete($lRequete);

		$lListeAdherentCommandeReservation = array();
		if( mysql_num_rows($lSql) > 0 ) {
			while ($lLigne = mysql_fetch_assoc($lSql)) {
				array_push($lListeAdherentCommandeReservation,
					ListeAdherentCommandeReservationViewManager::remplir(
					$lLigne[CommandeManager::CHAMP_COMMANDE_ID],
					$lLigne[CommandeManager::CHAMP_COMMANDE_NUMERO],
					$lLigne[AdherentManager::CHAMP_ADHERENT_ID],
					$lLigne[AdherentManager::CHAMP_ADHERENT_NUMERO],
					$lLigne[CompteManager::CHAMP_COMPTE_LABEL],
					$lLigne[AdherentManager::CHAMP_ADHERENT_NOM],
					$lLigne[AdherentManager::CHAMP_ADHERENT_PRENOM]));
			}
		} else {
			$lListeAdherentCommandeReservation[0] = new ListeAdherentCommandeReservationViewVO();
		}
		return $lListeAdherentCommandeReservation;
	}

	/**
	* @name selectAll()
	* @return array(ListeAdherentCommandeReservationViewVO)
	* @desc Récupères toutes les lignes de la table et les renvoie sous forme d'une collection de ListeAdherentCommandeReservationViewVO
	*/
	public static function selectAll() {
		// Initialisation du Logger
		$lLogger = &Log::singleton('file', CHEMIN_FICHIER_LOGS);
		$lLogger->setMask(Log::MAX(LOG_LEVEL));
		$lRequete =
			"SELECT "
			    . CommandeManager::CHAMP_COMMANDE_ID .  
			"," . CommandeManager::CHAMP_COMMANDE_NUMERO . 
			"," . AdherentManager::CHAMP_ADHERENT_ID . 
			"," . AdherentManager::CHAMP_ADHERENT_NUMERO . 
			"," . CompteManager::CHAMP_COMPTE_LABEL . 
			"," . AdherentManager::CHAMP_ADHERENT_NOM . 
			"," . AdherentManager::CHAMP_ADHERENT_PRENOM . "
			FROM " . ListeAdherentCommandeReservationViewManager::VUE_LISTEADHERENTCOMMANDE_RESERVATION;

		$lLogger->log("Execution de la requete : " . $lRequete,PEAR_LOG_DEBUG); // Maj des logs
		$lSql = Dbutils::executerRequete($lRequete);

		$lListeAdherentCommandeReservation = array();
		if( mysql_num_rows($lSql) > 0 ) {
			while ($lLigne = mysql_fetch_assoc($lSql)) {
				array_push($lListeAdherentCommandeReservation,
					ListeAdherentCommandeReservationViewManager::remplir(
					$lLigne[CommandeManager::CHAMP_COMMANDE_ID],
					$lLigne[CommandeManager::CHAMP_COMMANDE_NUMERO],
					$lLigne[AdherentManager::CHAMP_ADHERENT_ID],
					$lLigne[AdherentManager::CHAMP_ADHERENT_NUMERO],
					$lLigne[CompteManager::CHAMP_COMPTE_LABEL],
					$lLigne[AdherentManager::CHAMP_ADHERENT_NOM],
					$lLigne[AdherentManager::CHAMP_ADHERENT_PRENOM]));
			}
		} else {
			$lListeAdherentCommandeReservation[0] = new ListeAdherentCommandeReservationViewVO();
		}
		return $lListeAdherentCommandeReservation;
	}

	/**
	* @name recherche( $pTypeRecherche, $pTypeCritere, $pCritereRecherche, $pTypeTri, $pCritereTri )
	* @param string nom de la table
	* @param string Le type de critère de recherche
	* @param array(string) champs à récupérer dans la table
	* @param array(array(string, object)) Dictionnaire(champ, valeur)) contenant les champs à filtrer ainsi que la valeur du filtre
	* @param array(array(string, string)) Dictionnaire(champ, sens) contenant les tris à appliquer
	* @return array(ListeAdherentCommandeReservationViewVO)
	* @desc Récupères les lignes de la table selon le critère de recherche puis trie et renvoie la liste de résultat sous forme d'une collection de ListeAdherentCommandeReservationViewVO
	*/
	public static function recherche( $pTypeRecherche, $pTypeCritere, $pCritereRecherche, $pTypeTri, $pCritereTri ) {
		// Initialisation du Logger
		$lLogger = &Log::singleton('file', CHEMIN_FICHIER_LOGS);
		$lLogger->setMask(Log::MAX(LOG_LEVEL));

		// Préparation de la requète
		$lChamps = array( 
			    CommandeManager::CHAMP_COMMANDE_ID . 
			"," . CommandeManager::CHAMP_COMMANDE_NUMERO . 
			"," . AdherentManager::CHAMP_ADHERENT_ID .
			"," . AdherentManager::CHAMP_ADHERENT_NUMERO .
			"," . CompteManager::CHAMP_COMPTE_LABEL .
			"," . AdherentManager::CHAMP_ADHERENT_NOM .
			"," . AdherentManager::CHAMP_ADHERENT_PRENOM		);

		// Préparation de la requète de recherche
		$lRequete = DbUtils::prepareRequeteRecherche(ListeAdherentCommandeReservationViewManager::VUE_LISTEADHERENTCOMMANDE_RESERVATION, $lChamps, $pTypeRecherche, $pTypeCritere, $pCritereRecherche, $pTypeTri, $pCritereTri);

		$lListeAdherentCommandeReservation = array();
		
		if($lRequete !== false) {
			$lLogger->log("Execution de la requete : " . $lRequete,PEAR_LOG_DEBUG); // Maj des logs
			$lSql = Dbutils::executerRequete($lRequete);
	
			
			if( mysql_num_rows($lSql) > 0 ) {
	
				while ( $lLigne = mysql_fetch_assoc($lSql) ) {
	
					array_push($lListeAdherentCommandeReservation,
						ListeAdherentCommandeReservationViewManager::remplir(
						$lLigne[CommandeManager::CHAMP_COMMANDE_ID],
						$lLigne[CommandeManager::CHAMP_COMMANDE_NUMERO],
						$lLigne[AdherentManager::CHAMP_ADHERENT_ID],
						$lLigne[AdherentManager::CHAMP_ADHERENT_NUMERO],
						$lLigne[CompteManager::CHAMP_COMPTE_LABEL],
						$lLigne[AdherentManager::CHAMP_ADHERENT_NOM],
						$lLigne[AdherentManager::CHAMP_ADHERENT_PRENOM]));
				}
			} else {
				$lListeAdherentCommandeReservation[0] = new ListeAdherentCommandeReservationViewVO();
			}
	
			return $lListeAdherentCommandeReservation;
		}

		$lListeAdherentCommandeReservation[0] = new ListeAdherentCommandeReservationViewVO();
		return $lListeAdherentCommandeReservation;
	}

	/**
	* @name remplir($pComId, $pComNumero, $pAdhId, $pAdhNumero, $pAdhLabelCompte, $pAdhNom, $pAdhPrenom)
	* @param int(11)
	* @param int(11)
	* @param int(11)
	* @param varchar(5)
	* @param int(11)
	* @param varchar(50)
	* @param varchar(50)
	* @return ListeAdherentCommandeReservationViewVO
	* @desc Retourne une ListeAdherentCommandeReservationViewVO remplie
	*/
	private static function remplir($pComId, $pComNumero, $pAdhId, $pAdhNumero, $pAdhLabelCompte, $pAdhNom, $pAdhPrenom) {
		$lListeAdherentCommandeReservation = new ListeAdherentCommandeReservationViewVO();
		$lListeAdherentCommandeReservation->setComId($pComId);
		$lListeAdherentCommandeReservation->setComNumero($pComNumero);
		$lListeAdherentCommandeReservation->setAdhId($pAdhId);
		$lListeAdherentCommandeReservation->setAdhNumero($pAdhNumero);
		$lListeAdherentCommandeReservation->setAdhLabelCompte($pAdhLabelCompte);
		$lListeAdherentCommandeReservation->setAdhNom($pAdhNom);
		$lListeAdherentCommandeReservation->setAdhPrenom($pAdhPrenom);
		return $lListeAdherentCommandeReservation;
	}
}
?>