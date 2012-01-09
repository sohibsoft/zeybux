<?php
//****************************************************************
//
// Createur : Julien PIERRE
// Date de creation : 09/11/2010
// Fichier : AdherentValid.php
//
// Description : Classe AdherentValid
//
//****************************************************************
// Inclusion des classes
include_once(CHEMIN_CLASSES_UTILS . "TestFonction.php" );
include_once(CHEMIN_CLASSES_VR . "VRerreur.php" );
include_once(CHEMIN_CLASSES_VR . "AdherentVR.php" );
include_once(CHEMIN_CLASSES_MANAGERS . "ModuleManager.php");

/**
 * @name AdherentVR
 * @author Julien PIERRE
 * @since 09/11/2010
 * @desc Classe représentant une AdherentValid
 */
class AdherentValid
{
	/**
	* @name validAjout($pData)
	* @return AdherentVR
	* @desc Test la validite de l'élément
	*/
	public static function validAjout($pData) {
		$lVr = new AdherentVR();
		//Tests Techniques
		if(!TestFonction::checkLength($pData['motPasse'],0,100)) {
			$lVr->setValid(false);
			$lVr->getMotPasse()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getMotPasse()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['motPasseConfirm'],0,100)) {
			$lVr->setValid(false);
			$lVr->getMotPasse()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getMotPasse()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['numero'],0,5)) {
			$lVr->setValid(false);
			$lVr->getNumero()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getNumero()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['compte'],0,30)) {
			$lVr->setValid(false);
			$lVr->getCompte()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getCompte()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['nom'],0,50)) {
			$lVr->setValid(false);
			$lVr->getNom()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getNom()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['prenom'],0,50)) {
			$lVr->setValid(false);
			$lVr->getPrenom()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getPrenom()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['courrielPrincipal'],0,100)) {
			$lVr->setValid(false);
			$lVr->getCourrielPrincipal()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getCourrielPrincipal()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['courrielSecondaire'],0,100)) {
			$lVr->setValid(false);
			$lVr->getCourrielSecondaire()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getCourrielSecondaire()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['telephonePrincipal'],0,20)) {
			$lVr->setValid(false);
			$lVr->getTelephonePrincipal()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getTelephonePrincipal()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['telephoneSecondaire'],0,20)) {
			$lVr->setValid(false);
			$lVr->getTelephoneSecondaire()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getTelephoneSecondaire()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['adresse'],0,300)) {
			$lVr->setValid(false);
			$lVr->getAdresse()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getAdresse()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['codePostal'],0,10)) {
			$lVr->setValid(false);
			$lVr->getCodePostal()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getCodePostal()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['ville'],0,100)) {
			$lVr->setValid(false);
			$lVr->getVille()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getVille()->addErreur($lErreur);	
		}
		if($pData['dateNaissance']	!= '' && !TestFonction::checkDate($pData['dateNaissance'],'db')) {
			$lVr->setValid(false);
			$lVr->getDateNaissance()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_103_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_103_MSG);
			$lVr->getDateNaissance()->addErreur($lErreur);	
		}
		if($pData['dateNaissance']	!= '' && !TestFonction::checkDateExist($pData['dateNaissance'],'db')) {
			$lVr->setValid(false);
			$lVr->getDateNaissance()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_105_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_105_MSG);
			$lVr->getDateNaissance()->addErreur($lErreur);	
		}
		if(!TestFonction::checkDate($pData['dateAdhesion'],'db')) {
			$lVr->setValid(false);
			$lVr->getDateAdhesion()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_103_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_103_MSG);
			$lVr->getDateAdhesion()->addErreur($lErreur);	
		}
		if(!TestFonction::checkDateExist($pData['dateAdhesion'],'db')) {
			$lVr->setValid(false);
			$lVr->getDateAdhesion()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_105_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_105_MSG);
			$lVr->getDateAdhesion()->addErreur($lErreur);	
		}
		if(!TestFonction::checkLength($pData['commentaire'],0,500)) {
			$lVr->setValid(false);
			$lVr->getCommentaire()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
			$lVr->getCommentaire()->addErreur($lErreur);	
		}
		if(!is_array($pData['modules'])) {
			$lVr->setValid(false);
			$lVr->getModules()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_115_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_115_MSG);
			$lVr->getModules()->addErreur($lErreur);	
		}

		//Tests Fonctionnels
		if(empty($pData['motPasse'])) {
			$lVr->setValid(false);
			$lVr->getMotPasse()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
			$lVr->getMotPasse()->addErreur($lErreur);	
		}
		if(empty($pData['nom'])) {
			$lVr->setValid(false);
			$lVr->getNom()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
			$lVr->getNom()->addErreur($lErreur);	
		}
		if(empty($pData['prenom'])) {
			$lVr->setValid(false);
			$lVr->getPrenom()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
			$lVr->getPrenom()->addErreur($lErreur);	
		}
		if(empty($pData['dateAdhesion'])) {
			$lVr->setValid(false);
			$lVr->getDateAdhesion()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
			$lVr->getDateAdhesion()->addErreur($lErreur);	
		}
		
		// Le compte existe
		if(!empty($pData['compte'])) {		
			$lCompte = CompteManager::selectByLabel($pData['compte']);	
			if(count($lCompte) == 1) {
				if($lCompte == null) {					
					$lVr->setValid(false);
					$lVr->getCompte()->setValid(false);
					$lErreur = new VRerreur();
					$lErreur->setCode(MessagesErreurs::ERR_227_CODE);
					$lErreur->setMessage(MessagesErreurs::ERR_227_MSG);
					$lVr->getCompte()->addErreur($lErreur);	
				}
			} else {				
				$lVr->setValid(false);
				$lVr->getCompte()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_228_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_228_MSG);
				$lVr->getCompte()->addErreur($lErreur);	
			}
		}
				
		// Les mots de passe ne sont pas identique
		if($pData['motPasse'] !== $pData['motPasseConfirm']) {
			$lVr->setValid(false);
			$lVr->getMotPasse()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_223_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_223_MSG);
			$lVr->getMotPasse()->addErreur($lErreur);
		}
		
		// Les mails sont au bon format
		if($pData['courrielPrincipal']	!= '' && !TestFonction::checkCourriel($pData['courrielPrincipal'])) {
			$lVr->setValid(false);
			$lVr->getCourrielPrincipal()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_224_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_224_MSG);
			$lVr->getCourrielPrincipal()->addErreur($lErreur);
		}
		if($pData['courrielSecondaire']	!= '' && !TestFonction::checkCourriel($pData['courrielSecondaire'])) {
			$lVr->setValid(false);
			$lVr->getCourrielSecondaire()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_224_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_224_MSG);
			$lVr->getCourrielSecondaire()->addErreur($lErreur);
		}
		
		// Date Naissance <= Date Adhésion <= Date Actuelle
		if(!TestFonction::dateEstPLusGrandeEgale(StringUtils::dateAujourdhuiDb(),$pData['dateAdhesion'],'db')) {
			$lVr->setValid(false);
			$lVr->getDateAdhesion()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_230_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_230_MSG);
			$lVr->getDateAdhesion()->addErreur($lErreur);
		}
		
		if($pData['dateNaissance'] != '' && !TestFonction::dateEstPLusGrandeEgale($pData['dateAdhesion'],$pData['dateNaissance'],'db')) {
			$lVr->setValid(false);
			$lVr->getDateNaissance()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_225_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_225_MSG);
			$lVr->getDateNaissance()->addErreur($lErreur);
		}
		if($pData['dateNaissance'] != '' && !TestFonction::dateEstPLusGrandeEgale(StringUtils::dateAujourdhuiDb(),$pData['dateNaissance'],'db')) {
			$lVr->setValid(false);
			$lVr->getDateNaissance()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_230_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_230_MSG);
			$lVr->getDateNaissance()->addErreur($lErreur);
		}
	
		if(is_array($pData['modules'])) {
			if(count($pData['modules']) <= 0) {
				$lVr->setValid(false);
				$lVr->getLog()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_226_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_226_MSG);
				$lVr->getLog()->addErreur($lErreur);
			} else {
				$lValid = true;
				foreach($pData['modules'] as $lIdModule) {
					$lModule = ModuleManager::select($lIdModule);
					if($lIdModule != $lModule->getId()) {
						$lValid = false;
					}
				}
				if(!$lValid) {
					$lVr->setValid(false);
					$lVr->getLog()->setValid(false);
					$lErreur = new VRerreur();
					$lErreur->setCode(MessagesErreurs::ERR_229_CODE);
					$lErreur->setMessage(MessagesErreurs::ERR_229_MSG);
					$lVr->getLog()->addErreur($lErreur);
				}			
			}
		}		
		return $lVr;
	}

	/**
	* @name validDelete($pData)
	* @return AdherentVR
	* @desc Test la validite de l'élément
	*/
	public static function validDelete($pData) {
		$lVr = new AdherentVR();
		if(!is_int((int)$pData['id'])) {
			$lVr->setValid(false);
			$lVr->getId()->setValid(false);
			$lErreur = new VRerreur();
			$lErreur->setCode(MessagesErreurs::ERR_104_CODE);
			$lErreur->setMessage(MessagesErreurs::ERR_104_MSG);
			$lVr->getId()->addErreur($lErreur);	
		}
		return $lVr;
	}

	/**
	* @name validUpdate($pData)
	* @return AdherentVR
	* @desc Test la validite de l'élément
	*/
	public static function validUpdate($pData) {
		$lTestId = AdherentValid::validDelete($pData);
		if($lTestId->getValid()) {
			$lVr = new AdherentVR();
			//Tests Techniques
			if(!TestFonction::checkLength($pData['motPasse'],0,100)) {
				$lVr->setValid(false);
				$lVr->getMotPasse()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getMotPasse()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['motPasseConfirm'],0,100)) {
				$lVr->setValid(false);
				$lVr->getMotPasse()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getMotPasse()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['numero'],0,5)) {
				$lVr->setValid(false);
				$lVr->getNumero()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getNumero()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['compte'],0,30)) {
				$lVr->setValid(false);
				$lVr->getCompte()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getCompte()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['nom'],0,50)) {
				$lVr->setValid(false);
				$lVr->getNom()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getNom()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['prenom'],0,50)) {
				$lVr->setValid(false);
				$lVr->getPrenom()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getPrenom()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['courrielPrincipal'],0,100)) {
				$lVr->setValid(false);
				$lVr->getCourrielPrincipal()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getCourrielPrincipal()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['courrielSecondaire'],0,100)) {
				$lVr->setValid(false);
				$lVr->getCourrielSecondaire()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getCourrielSecondaire()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['telephonePrincipal'],0,20)) {
				$lVr->setValid(false);
				$lVr->getTelephonePrincipal()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getTelephonePrincipal()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['telephoneSecondaire'],0,20)) {
				$lVr->setValid(false);
				$lVr->getTelephoneSecondaire()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getTelephoneSecondaire()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['adresse'],0,300)) {
				$lVr->setValid(false);
				$lVr->getAdresse()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getAdresse()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['codePostal'],0,10)) {
				$lVr->setValid(false);
				$lVr->getCodePostal()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getCodePostal()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['ville'],0,100)) {
				$lVr->setValid(false);
				$lVr->getVille()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getVille()->addErreur($lErreur);	
			}
			if($pData['dateNaissance']	!= '' && !TestFonction::checkDate($pData['dateNaissance'],'db')) {
				$lVr->setValid(false);
				$lVr->getDateNaissance()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_103_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_103_MSG);
				$lVr->getDateNaissance()->addErreur($lErreur);	
			}
			if($pData['dateNaissance']	!= '' && !TestFonction::checkDateExist($pData['dateNaissance'],'db')) {
				$lVr->setValid(false);
				$lVr->getDateNaissance()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_105_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_105_MSG);
				$lVr->getDateNaissance()->addErreur($lErreur);	
			}
			if(!TestFonction::checkDate($pData['dateAdhesion'],'db')) {
				$lVr->setValid(false);
				$lVr->getDateAdhesion()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_103_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_103_MSG);
				$lVr->getDateAdhesion()->addErreur($lErreur);	
			}
			if(!TestFonction::checkDateExist($pData['dateAdhesion'],'db')) {
				$lVr->setValid(false);
				$lVr->getDateAdhesion()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_105_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_105_MSG);
				$lVr->getDateAdhesion()->addErreur($lErreur);	
			}
			if(!TestFonction::checkLength($pData['commentaire'],0,500)) {
				$lVr->setValid(false);
				$lVr->getCommentaire()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_101_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_101_MSG);
				$lVr->getCommentaire()->addErreur($lErreur);	
			}
			if(!is_array($pData['modules'])) {
				$lVr->setValid(false);
				$lVr->getModules()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_115_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_115_MSG);
				$lVr->getModules()->addErreur($lErreur);	
			}

			//Tests Fonctionnels
			if(empty($pData['nom'])) {
				$lVr->setValid(false);
				$lVr->getNom()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
				$lVr->getNom()->addErreur($lErreur);	
			}
			if(empty($pData['prenom'])) {
				$lVr->setValid(false);
				$lVr->getPrenom()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
				$lVr->getPrenom()->addErreur($lErreur);	
			}
			if(empty($pData['dateAdhesion'])) {
				$lVr->setValid(false);
				$lVr->getDateAdhesion()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
				$lVr->getDateAdhesion()->addErreur($lErreur);	
			}
			if(empty($pData['compte'])) {
				$lVr->setValid(false);
				$lVr->getDateAdhesion()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
				$lVr->getDateAdhesion()->addErreur($lErreur);	
			}
			
			// Le compte existe
			if(!empty($pData['compte'])) {		
				$lCompte = CompteManager::selectByLabel($pData['compte']);	
				if(count($lCompte) == 1) {
					if($lCompte == null) {					
						$lVr->setValid(false);
						$lVr->getCompte()->setValid(false);
						$lErreur = new VRerreur();
						$lErreur->setCode(MessagesErreurs::ERR_227_CODE);
						$lErreur->setMessage(MessagesErreurs::ERR_227_MSG);
						$lVr->getCompte()->addErreur($lErreur);	
					}
				} else {				
					$lVr->setValid(false);
					$lVr->getCompte()->setValid(false);
					$lErreur = new VRerreur();
					$lErreur->setCode(MessagesErreurs::ERR_228_CODE);
					$lErreur->setMessage(MessagesErreurs::ERR_228_MSG);
					$lVr->getCompte()->addErreur($lErreur);	
				}
			} else {
				$lVr->setValid(false);
				$lVr->getCompte()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_201_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_201_MSG);
				$lVr->getCompte()->addErreur($lErreur);	
			}
					
			// Les mots de passe ne sont pas identique
			if(($pData['motPasse'] != '' || $pData['motPasseConfirm'] != '') && $pData['motPasse'] !== $pData['motPasseConfirm']) {
				$lVr->setValid(false);
				$lVr->getMotPasse()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_223_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_223_MSG);
				$lVr->getMotPasse()->addErreur($lErreur);
			}
			
			// Les mails sont au bon format
			if($pData['courrielPrincipal']	!= '' && !TestFonction::checkCourriel($pData['courrielPrincipal'])) {
				$lVr->setValid(false);
				$lVr->getCourrielPrincipal()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_224_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_224_MSG);
				$lVr->getCourrielPrincipal()->addErreur($lErreur);
			}
			if($pData['courrielSecondaire']	!= '' && !TestFonction::checkCourriel($pData['courrielSecondaire'])) {
				$lVr->setValid(false);
				$lVr->getCourrielSecondaire()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_224_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_224_MSG);
				$lVr->getCourrielSecondaire()->addErreur($lErreur);
			}
			
			// Date Naissance <= Date Adhésion <= Date Actuelle
			if(!TestFonction::dateEstPLusGrandeEgale(StringUtils::dateAujourdhuiDb(),$pData['dateAdhesion'],'db')) {
				$lVr->setValid(false);
				$lVr->getDateAdhesion()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_209_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_230_MSG);
				$lVr->getDateAdhesion()->addErreur($lErreur);
			}
			
			if($pData['dateNaissance'] != '' && !TestFonction::dateEstPLusGrandeEgale($pData['dateAdhesion'],$pData['dateNaissance'],'db')) {
				$lVr->setValid(false);
				$lVr->getDateNaissance()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_225_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_225_MSG);
				$lVr->getDateNaissance()->addErreur($lErreur);
			}
			if($pData['dateNaissance'] != '' && !TestFonction::dateEstPLusGrandeEgale(StringUtils::dateAujourdhuiDb(),$pData['dateNaissance'],'db')) {
				$lVr->setValid(false);
				$lVr->getDateNaissance()->setValid(false);
				$lErreur = new VRerreur();
				$lErreur->setCode(MessagesErreurs::ERR_209_CODE);
				$lErreur->setMessage(MessagesErreurs::ERR_230_MSG);
				$lVr->getDateNaissance()->addErreur($lErreur);
			}
		
			if(is_array($pData['modules'])) {
				if(count($pData['modules']) <= 0) {
					$lVr->setValid(false);
					$lVr->getLog()->setValid(false);
					$lErreur = new VRerreur();
					$lErreur->setCode(MessagesErreurs::ERR_226_CODE);
					$lErreur->setMessage(MessagesErreurs::ERR_226_MSG);
					$lVr->getLog()->addErreur($lErreur);
				} else {
					$lValid = true;
					foreach($pData['modules'] as $lIdModule) {
						$lModule = ModuleManager::select($lIdModule);
						if($lIdModule != $lModule->getId()) {
							$lValid = false;
						}
					}
					if(!$lValid) {
						$lVr->setValid(false);
						$lVr->getLog()->setValid(false);
						$lErreur = new VRerreur();
						$lErreur->setCode(MessagesErreurs::ERR_229_CODE);
						$lErreur->setMessage(MessagesErreurs::ERR_229_MSG);
						$lVr->getLog()->addErreur($lErreur);
					}			
				}
			}
			return $lVr;
		}
		return $lTestId;
	}

}