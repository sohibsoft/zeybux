<?php
//****************************************************************
//
// Createur : Julien PIERRE
// Date de creation : 03/08/2011
// Fichier : ListeAchatReservationVO.php
//
// Description : Classe ListeAchatReservationVO
//
//****************************************************************
include_once(CHEMIN_CLASSES . "DataTemplate.php");

/**
 * @name ListeAchatReservationVO
 * @author Julien PIERRE
 * @since 03/08/2011
 * @desc Classe représentant une ListeAchatReservationVO
 */
class ListeAchatReservationVO  extends DataTemplate
{
	/**
	* @var int(11)
	* @desc AdhId de la ListeAchatReservationVO
	*/
	protected $mAdhId;

	/**
	* @var int(11)
	* @desc AdhNumero de la ListeAchatReservationVO
	*/
	protected $mAdhNumero;

	/**
	* @var int(11)
	* @desc AdhIdCompte de la ListeAchatReservationVO
	*/
	protected $mAdhIdCompte;

	/**
	* @var varchar(30)
	* @desc CptLabel de la ListeAchatReservationVO
	*/
	protected $mCptLabel;

	/**
	* @var varchar(50)
	* @desc AdhNom de la ListeAchatReservationVO
	*/
	protected $mAdhNom;

	/**
	* @var varchar(50)
	* @desc AdhPrenom de la ListeAchatReservationVO
	*/
	protected $mAdhPrenom;

	/**
	* @var decimal(10,2)
	* @desc OpeMontantReservation de la ListeAchatReservationVO
	*/
	protected $mOpeMontantReservation;

	/**
	* @var decimal(10,2)
	* @desc OpeMontantAchat de la ListeAchatReservationVO
	*/
	protected $mOpeMontantAchat;

	/**
	* @name getAdhId()
	* @return int(11)
	* @desc Renvoie le membre AdhId de la ListeAchatReservationVO
	*/
	public function getAdhId() {
		return $this->mAdhId;
	}

	/**
	* @name setAdhId($pAdhId)
	* @param int(11)
	* @desc Remplace le membre AdhId de la ListeAchatReservationVO par $pAdhId
	*/
	public function setAdhId($pAdhId) {
		$this->mAdhId = $pAdhId;
	}

	/**
	* @name getAdhNumero()
	* @return int(11)
	* @desc Renvoie le membre AdhNumero de la ListeAchatReservationVO
	*/
	public function getAdhNumero() {
		return $this->mAdhNumero;
	}

	/**
	* @name setAdhNumero($pAdhNumero)
	* @param int(11)
	* @desc Remplace le membre AdhNumero de la ListeAchatReservationVO par $pAdhNumero
	*/
	public function setAdhNumero($pAdhNumero) {
		$this->mAdhNumero = $pAdhNumero;
	}

	/**
	* @name getAdhIdCompte()
	* @return int(11)
	* @desc Renvoie le membre AdhIdCompte de la ListeAchatReservationVO
	*/
	public function getAdhIdCompte() {
		return $this->mAdhIdCompte;
	}

	/**
	* @name setAdhIdCompte($pAdhIdCompte)
	* @param int(11)
	* @desc Remplace le membre AdhIdCompte de la ListeAchatReservationVO par $pAdhIdCompte
	*/
	public function setAdhIdCompte($pAdhIdCompte) {
		$this->mAdhIdCompte = $pAdhIdCompte;
	}

	/**
	* @name getCptLabel()
	* @return varchar(30)
	* @desc Renvoie le membre CptLabel de la ListeAchatReservationVO
	*/
	public function getCptLabel() {
		return $this->mCptLabel;
	}

	/**
	* @name setCptLabel($pCptLabel)
	* @param varchar(30)
	* @desc Remplace le membre CptLabel de la ListeAchatReservationVO par $pCptLabel
	*/
	public function setCptLabel($pCptLabel) {
		$this->mCptLabel = $pCptLabel;
	}

	/**
	* @name getAdhNom()
	* @return varchar(50)
	* @desc Renvoie le membre AdhNom de la ListeAchatReservationVO
	*/
	public function getAdhNom() {
		return $this->mAdhNom;
	}

	/**
	* @name setAdhNom($pAdhNom)
	* @param varchar(50)
	* @desc Remplace le membre AdhNom de la ListeAchatReservationVO par $pAdhNom
	*/
	public function setAdhNom($pAdhNom) {
		$this->mAdhNom = $pAdhNom;
	}

	/**
	* @name getAdhPrenom()
	* @return varchar(50)
	* @desc Renvoie le membre AdhPrenom de la ListeAchatReservationVO
	*/
	public function getAdhPrenom() {
		return $this->mAdhPrenom;
	}

	/**
	* @name setAdhPrenom($pAdhPrenom)
	* @param varchar(50)
	* @desc Remplace le membre AdhPrenom de la ListeAchatReservationVO par $pAdhPrenom
	*/
	public function setAdhPrenom($pAdhPrenom) {
		$this->mAdhPrenom = $pAdhPrenom;
	}

	/**
	* @name getOpeMontantReservation()
	* @return decimal(10,2)
	* @desc Renvoie le membre OpeMontantReservation de la ListeAchatReservationVO
	*/
	public function getOpeMontantReservation() {
		return $this->mOpeMontantReservation;
	}

	/**
	* @name setOpeMontantReservation($pOpeMontantReservation)
	* @param decimal(10,2)
	* @desc Remplace le membre OpeMontantReservation de la ListeAchatReservationVO par $pOpeMontantReservation
	*/
	public function setOpeMontantReservation($pOpeMontantReservation) {
		$this->mOpeMontantReservation = $pOpeMontantReservation;
	}

	/**
	* @name getOpeMontantAchat()
	* @return decimal(10,2)
	* @desc Renvoie le membre OpeMontantAchat de la ListeAchatReservationVO
	*/
	public function getOpeMontantAchat() {
		return $this->mOpeMontantAchat;
	}

	/**
	* @name setOpeMontantAchat($pOpeMontantAchat)
	* @param decimal(10,2)
	* @desc Remplace le membre OpeMontantAchat de la ListeAchatReservationVO par $pOpeMontantAchat
	*/
	public function setOpeMontantAchat($pOpeMontantAchat) {
		$this->mOpeMontantAchat = $pOpeMontantAchat;
	}
}
?>