<?php
//****************************************************************
//
// Createur : Julien PIERRE
// Date de creation : 27/10/2010
// Fichier : EditerCommandeControleur.php
//
// Description : Classe EditerCommandeControleur
//
//****************************************************************

// Inclusion des classes
include_once(CHEMIN_CLASSES_VIEW_MANAGER . "GestionCommandeListeReservationViewManager.php");
include_once(CHEMIN_CLASSES_RESPONSE . MOD_GESTION_COMMANDE . "/EditerCommandeResponse.php" );
include_once(CHEMIN_CLASSES_RESPONSE . MOD_GESTION_COMMANDE . "/ListeAchatEtReservationResponse.php" );
include_once(CHEMIN_CLASSES_SERVICE . "MarcheService.php");
include_once(CHEMIN_CLASSES_SERVICE . "AchatService.php");
include_once(CHEMIN_CLASSES_SERVICE . "ReservationService.php");
include_once(CHEMIN_CLASSES_VALIDATEUR . MOD_GESTION_COMMANDE . "/EditerCommandeValid.php" );
include_once(CHEMIN_CLASSES_VIEW_MANAGER . "ReservationViewManager.php");
include_once(CHEMIN_CLASSES_VIEW_MANAGER . "AdherentViewManager.php");
include_once(CHEMIN_CLASSES_VALIDATEUR . MOD_GESTION_COMMANDE . "/ExportListeReservationValid.php" );
include_once(CHEMIN_CLASSES_UTILS . "CSV.php");
include_once(CHEMIN_CLASSES_UTILS . "phpToPDF.php");

/**
 * @name EditerCommandeControleur
 * @author Julien PIERRE
 * @since 27/10/2010
 * @desc Classe controleur d'une EditerCommande
 */
class EditerCommandeControleur
{
	/**
	* @name getInfoCommande($pParam)
	* @return EditerCommandeResponse
	* @desc Retourne la liste des adhérents qui ont réservé sur cette commande et les infos sur la commande.
	*/
	public function getInfoCommande($pParam) {
		$lVr = EditerCommandeValid::validGetInfoCommande($pParam);
		if($lVr->getValid()) {
			$lIdMarche = $pParam["id_commande"];

			$lMarcheService = new MarcheService();
			$lMarche = $lMarcheService->get($lIdMarche);
			$lListeAdherent = GestionCommandeListeReservationViewManager::select($lIdMarche);

			$lResponse = new EditerCommandeResponse();
			$lResponse->setMarche($lMarche);
			$lResponse->setListeAdherentCommande($lListeAdherent);

			return $lResponse;
		}				
		return $lVr;
	}
	
	/**
	* @name getListeReservationExport($pParam)
	* @return array()
	* @desc Retourne la liste des réservations pour une commande et la liste de produits demandés
	*/
	private function getListeReservationExport($pParam) {
		$lIdCommande = $pParam['id_commande'];
		$lIdProduits = $pParam['id_produits'];
		
		$lReservations = ReservationViewManager::selectReservationProduit($lIdCommande, $lIdProduits);
		
		
		// Mise en forme des données par produit
		$lTableauReservation = array();
		foreach($lReservations as $lReservation) {			
			$lLigne = array();
			
			$lLigne['compte'] = $lReservation->getCptLabel();
			$lLigne['Adherent'] = array();
			
			$lAdh = array();
			$lAdh['prenom'] = $lReservation->getAdhPrenom();
			$lAdh['nom'] = $lReservation->getAdhNom();
			
			if(isset($lTableauReservation[$lLigne['compte']])) {				
				//$lTableauReservation[$lLigne['compte']]['Adherent'][$lReservation->getAdhId()] = $lAdh;
				
				foreach($lIdProduits as $lIdProduit) {
					if($lReservation->getProId() == $lIdProduit) {
						$lTableauReservation[$lLigne['compte']][$lIdProduit] = $lReservation->getStoQuantite() * -1 . " " . $lReservation->getProUniteMesure();
					}
				}				
			} else {				
				$lLigne['Adherent'][$lReservation->getAdhId()] = $lAdh;
				
				foreach($lIdProduits as $lIdProduit) {
					if($lReservation->getProId() == $lIdProduit) {
						$lLigne[$lIdProduit] = $lReservation->getStoQuantite() * -1 . " " . $lReservation->getProUniteMesure();
					} else $lLigne[$lIdProduit] = '';
				}
				$lTableauReservation[$lLigne['compte']] = $lLigne;
			}			
		}
		
		return $lTableauReservation;
	}
	
	
	/**
	* @name getListeReservationPdf($pParam)
	* @return Un Fichier Pdf
	* @desc Retourne la liste des réservations pour une commande et la liste de produits demandés
	*/
	public function getListeReservationPdf($pParam) {

		$lVr = ExportListeReservationValid::validAjout($pParam);
		
		if($lVr->getValid()) {
			$lIdProduits = $pParam['id_produits'];
			
			$lTableauReservation = $this->getListeReservationExport($pParam);
			
			// Préparation du Tableau pour l'export PDF		
			$contenuTableau = array();
			foreach($lTableauReservation as $lVal) {
				$i = 0;
				foreach($lVal['Adherent'] as $lAdh) {
					$lLigne = array();
					if($i == 0) {
						array_push($contenuTableau,utf8_decode($lVal['compte']));
					} else {
						array_push($contenuTableau,'');
					}
					array_push($contenuTableau,utf8_decode($lAdh['prenom']));
					array_push($contenuTableau,utf8_decode($lAdh['nom']));
					
					$j = 3;
					foreach($lIdProduits as $lIdProduit) {
						if($i == 0) {
							array_push($contenuTableau,utf8_decode($lVal[$lIdProduit]));
						} else {
							array_push($contenuTableau,'');
						}
						$j++;
					}
					$i++;
				}
			}
					
			// Contenu du header du tableau.	
			$contenuHeader = array(18, 30, 30);
			foreach($lIdProduits as $lIdProduit) {
				array_push($contenuHeader,20);
			}
			array_push($contenuHeader,"Compte", utf8_decode("Prénom"), "Nom");
			foreach($lIdProduits as $lIdProduit) {
				$lProduit = ProduitManager::select($lIdProduit);	
				$lNomProduit = NomProduitManager::select($lProduit->getIdNomProduit());
				array_push($contenuHeader,utf8_decode($lNomProduit->getNom()));
			}
			
			// Préparation du PDF
			$PDF=new phpToPDF();
			$PDF->AddPage();
			$PDF->SetFont('Arial','B',16);
			
			// Définition des propriétés du tableau.
			$proprietesTableau = array(
				'TB_ALIGN' => 'L',
				'L_MARGIN' => 5,
				'BRD_COLOR' => array(0,0,0),
				'BRD_SIZE' => '0.3',
				);
			
			// Définition des propriétés du header du tableau.	
			$proprieteHeader = array(
				'T_COLOR' => array(255,255,255),
				'T_SIZE' => 12,
				'T_FONT' => 'Arial',
				'T_ALIGN' => 'C',
				'V_ALIGN' => 'T',
				'T_TYPE' => 'B',
				'LN_SIZE' => 7,
				'BG_COLOR_COL0' => array(58,129,4),
				'BG_COLOR' => array(58,129,4),
				'BRD_COLOR' => array(0,0,0),
				'BRD_SIZE' => 0.2,
				'BRD_TYPE' => '1',
				'BRD_TYPE_NEW_PAGE' => '',
				);
			
			// Définition des propriétés du reste du contenu du tableau.	
			$proprieteContenu = array(
				'T_COLOR' => array(0,0,0),
				'T_SIZE' => 10,
				'T_FONT' => 'Arial',
				'T_ALIGN_COL0' => 'L',
				'T_ALIGN' => 'R',
				'V_ALIGN' => 'M',
				'T_TYPE' => '',
				'LN_SIZE' => 6,
				'BG_COLOR_COL0' => array(220, 220, 220),
				'BG_COLOR' => array(255,255,255),
				'BRD_COLOR' => array(0,0,0),
				'BRD_SIZE' => 0.2,
				'BRD_TYPE' => '1',
				'BRD_TYPE_NEW_PAGE' => '',
				);
			
			// Ajout du Tableau au PDF
			$PDF->drawTableau($PDF, $proprietesTableau, $proprieteHeader, $contenuHeader, $proprieteContenu, $contenuTableau);
			
			// Export du PDF
			$PDF->Output('Réservations.pdf','D');
		} else {
			return $lVr;
		}		
	}
	
	/**
	* @name getListeReservationCSV($pParam)
	* @return Un Fichier CSV
	* @desc Retourne la liste des réservations pour une commande et la liste de produits demandés
	*/
	public function getListeReservationCSV($pParam) {
		$lVr = ExportListeReservationValid::validAjout($pParam);
		
		if($lVr->getValid()) {	
			$lIdProduits = $pParam['id_produits'];
			
			$lTableauReservation = $this->getListeReservationExport($pParam);
	
			$lCSV = new CSV();
			$lCSV->setNom('Réservations.csv'); // Le Nom
	
			// L'entete
			$lEntete = array("Compte","Prénom","Nom");		
			foreach($lIdProduits as $lIdProduit) {
				$lProduit = ProduitManager::select($lIdProduit);	
				$lNomProduit = NomProduitManager::select($lProduit->getIdNomProduit());
				array_push($lEntete,$lNomProduit->getNom());
			}
			$lCSV->setEntete($lEntete);
			
			// Les données
			$contenuTableau = array();
			foreach($lTableauReservation as $lVal) {
				$i = 0;
				$lLigne = array();
				foreach($lVal['Adherent'] as $lAdh) {
					$lLigne = array();
					if($i == 0) {
						array_push($lLigne,$lVal['compte']);
					} else {
						array_push($lLigne,'');
					}
					array_push($lLigne,$lAdh['prenom']);
					array_push($lLigne,$lAdh['nom']);
					
					$j = 3;
					foreach($lIdProduits as $lIdProduit) {
						if($i == 0) {
							array_push($lLigne,$lVal[$lIdProduit]);
						} else {
							array_push($lLigne,'');
						}
						$j++;
					}
					$i++;
				}
				array_push($contenuTableau,$lLigne);
			} 
			$lCSV->setData($contenuTableau);
			
			// Export en CSV
			$lCSV->output();
		} else {
			return $lVr;
		}	
	}
	
	/**
	* @name getListeAchatEtReservationCSV($pParam)
	* @return Un Fichier CSV
	* @desc Retourne la liste des achats et réservations pour un Marché et la liste de produits demandés
	*/
	public function getListeAchatEtReservationCSV($pParam) {
		$lVr = EditerCommandeValid::validGetInfoCommande($pParam);
		if($lVr->getValid()) {	
			$lMarcheService = new MarcheService();
			$lMarche = $lMarcheService->get($pParam["id_commande"]);
			
			$lCSV = new CSV();
			$lCSV->setNom('Réservations.csv'); // Le Nom
			
			
			// Les données
			$contenuTableau = array();
			$lLigne = array("","","","");
			// L'entête
			$lEntete = array("N°","Compte","Nom","Prénom");		
			foreach($lMarche->getProduits() as $lProduit) {
				array_push($lEntete,"","","","","",$lProduit->getNom(),"","","","","","");
				array_push($lLigne,"","","Réservation","","","Achat","","","","Solidaire","","");
			}
			$lCSV->setEntete($lEntete);

			
			array_push($contenuTableau,$lLigne);
					
			$lAdherents = AdherentViewManager::selectAll();
			$lReservationService = new ReservationService();
			$lAchatService = new AchatService();
			foreach($lAdherents as $lAdherent) {				
				$lIdReservation = new IdReservationVO();
				$lIdReservation->setIdCompte($lAdherent->getAdhIdCompte());
				$lIdReservation->setIdCommande($pParam["id_commande"]);
				$lReservation = $lReservationService->get($lIdReservation);

				$lIdAchat = new IdAchatVO();
				$lIdAchat->setIdCompte($lAdherent->getAdhIdCompte());
				$lIdAchat->setIdCommande($pParam["id_commande"]);
				$lAchats = $lAchatService->getAll($lIdAchat);	
				
				$lProduits = array();

				$lNbResa = 0;
				$lDetailsReservationt = $lReservation->getDetailReservation();
				if(!empty($lDetailsReservationt)) {
					foreach($lDetailsReservationt as $lDetail) {
						if(!isset($lProduits[$lDetail->getIdProduit()][0])) {
							$lProduits[$lDetail->getIdProduit()][0] = array();
						}
						array_push($lProduits[$lDetail->getIdProduit()][0],$lDetail);
						$lNbResa++;
					}
				}
				
				$lNbAchat = 0;
				$lNbAchatSolidaire = 0;
				foreach($lAchats as $lAchat) {
					$lDetailsAchat = $lAchat->getDetailAchat();
					if(!empty($lDetailsAchat)) {
						foreach($lDetailsAchat as $lDetail) {
							if(!isset($lProduits[$lDetail->getIdProduit()][7])) {
								$lProduits[$lDetail->getIdProduit()][7] = array();
							}
							array_push($lProduits[$lDetail->getIdProduit()][7],$lDetail);
							$lNbAchat++;
						}
					}
					$lDetailsAchat = $lAchat->getDetailAchatSolidaire();
					if(!empty($lDetailsAchat)) {
						foreach($lDetailsAchat as $lDetail) {
							if(!isset($lProduits[$lDetail->getIdProduit()][8])) {
								$lProduits[$lDetail->getIdProduit()][8] = array();
							}
							array_push($lProduits[$lDetail->getIdProduit()][8],$lDetail);
							$lNbAchatSolidaire++;
						}
					}
				}
				
				if($lNbAchat < $lNbResa) {$lNbAchat = $lNbResa;}
				if($lNbAchat < $lNbAchatSolidaire) {$lNbAchat = $lNbAchatSolidaire;}
				
				if($lNbAchat == 0) {
					$lLigne = array();
					array_push($lLigne,$lAdherent->getAdhNumero(),$lAdherent->getCptLabel(),$lAdherent->getAdhNom(),$lAdherent->getAdhPrenom());
					array_push($contenuTableau,$lLigne);					
				}
				
				$lI = 0;
				while($lI < $lNbAchat) {
					$lLigne = array();
					if($lI == 0) {
						array_push($lLigne,$lAdherent->getAdhNumero(),$lAdherent->getCptLabel(),$lAdherent->getAdhNom(),$lAdherent->getAdhPrenom());
					} else {
						array_push($lLigne,"","","","");
					}
					foreach($lMarche->getProduits() as $lProduit) {
						if(isset($lProduits[$lProduit->getId()][0][$lI])) {
							$lDetail = $lProduits[$lProduit->getId()][0][$lI];
							array_push($lLigne,$lDetail->getQuantite() * -1,$lProduit->getUnite(),$lDetail->getMontant() * -1,SIGLE_MONETAIRE);
						} else {
							array_push($lLigne,"","","","");
						}
						if(isset($lProduits[$lProduit->getId()][7][$lI])) {
							$lDetail = $lProduits[$lProduit->getId()][7][$lI];
							array_push($lLigne,$lDetail->getQuantite() * -1,$lProduit->getUnite(),$lDetail->getMontant() * -1,SIGLE_MONETAIRE);
						} else {
							array_push($lLigne,"","","","");
						}
						if(isset($lProduits[$lProduit->getId()][8][$lI])) {
							$lDetail = $lProduits[$lProduit->getId()][8][$lI];
							array_push($lLigne,$lDetail->getQuantite() * -1,$lProduit->getUnite(),$lDetail->getMontant() * -1,SIGLE_MONETAIRE);
						} else {
							array_push($lLigne,"","","","");
						}
					}
					array_push($contenuTableau,$lLigne);
					$lI++;
				}
			}
			
			
			$lCSV->setData($contenuTableau);
			
			// Export en CSV
			$lCSV->output();
		} else {
			return $lVr;
		}
	}
	
	/**
	* @name setPause($pParam)
	* @param Id du marché
	* @desc Met en pause le marché
	*/
	public function setPause($pParam) {
		$lVr = EditerCommandeValid::validGetInfoCommande($pParam);
		if($lVr->getValid()) {
			$lMarcheService = new MarcheService();
			$lMarcheService->setPause($pParam["id_commande"]);
		}
		return $lVr;
	}
	
	/**
	* @name setPlay($pParam)
	* @param Id du marché
	* @desc Met en play le marché
	*/
	public function setPlay($pParam) {		
		$lVr = EditerCommandeValid::validGetInfoCommande($pParam);
		if($lVr->getValid()) {
			$lMarcheService = new MarcheService();
			$lMarcheService->setPlay($pParam["id_commande"]);
		}
		return $lVr;
	}
	
	/**
	* @name setCloturer($pParam)
	* @param Id du marché
	* @desc Cloture le marché
	*/
	public function setCloturer($pParam) {		
		$lVr = EditerCommandeValid::validGetInfoCommande($pParam);
		if($lVr->getValid()) {
			$lMarcheService = new MarcheService();
			$lMarcheService->setCloturer($pParam["id_commande"]);			
		}
		return $lVr;
	}
	
	/**
	* @name getListeAchatEtReservation($pParam)
	* @param Id du marché
	* @desc Cloture le marché
	*/
	public function getListeAchatEtReservation($pParam) {		
		$lVr = EditerCommandeValid::validGetInfoCommande($pParam);
		if($lVr->getValid()) {
		$lResponse = new ListeAchatEtReservationResponse();
			$lAchatService = new AchatService();
			$lResponse->setListeAchatEtReservation($lAchatService->selectMarcheAll($pParam["id_commande"]));
			return $lResponse;
		}
		return $lVr;
	}
	
	/**
	* @name getListeReservation($pParam)
	* @param Id du marché
	* @desc Cloture le marché
	*/
	public function getListeReservation($pParam) {		
		$lVr = EditerCommandeValid::validGetInfoCommande($pParam);
		if($lVr->getValid()) {
			$lResponse = new EditerCommandeResponse();
			$lListeAdherent = GestionCommandeListeReservationViewManager::select($pParam["id_commande"]);
			$lResponse->setListeAdherentCommande($lListeAdherent);
			return $lResponse;
		}
		return $lVr;
	}
	
}
?>