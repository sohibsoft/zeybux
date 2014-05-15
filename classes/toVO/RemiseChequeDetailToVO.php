<?php
//****************************************************************
//
// Createur : Julien PIERRE
// Date de creation : 04/05/2014
// Fichier : RemiseChequeDetailToVO.php
//
// Description : Classe RemiseChequeDetailToVO
//
//****************************************************************
// Inclusion des classes
include_once(CHEMIN_CLASSES_VO . "RemiseChequeDetailVO.php" );
include_once(CHEMIN_CLASSES_TOVO . "OperationDetailToVO.php" );

/**
 * @name RemiseChequeToVO
 * @author Julien PIERRE
 * @since 04/05/2014
 * @desc Classe représentant une RemiseChequeToVO
 */
class RemiseChequeDetailToVO
{
	/**
	* @name convertFromArray($pArray)
	* @param array()
	* @desc Convertit le array en objet RemiseChequeVO
	*/
	public static function convertFromArray($pArray) {	
		if(isset($pArray['id'])) { $lId = $pArray['id']; } else { $lId = NULL; }			
		if(isset($pArray['numero'])) { $lNumero = $pArray['numero']; } else { $lNumero = NULL; }
		if(isset($pArray['operations']) && is_array($pArray['operations'])) { 
			$lOperations = array();
			foreach($pArray['operations'] as $lOperation) {
				array_push($lOperations, OperationDetailToVO::convertFromArray($lOperation));
			}		
		} else { $lOperations = NULL; }		
		
		return new RemiseChequeDetailVO($lId, $lNumero, $lOperations);
	}
}
?>