<?php
class busqueda extends CI_Model {
	 public function __construct()
	 {
	 	$this->load->database();
	 }

	 public function valido_fono($fono) {
	 	$primeros_digitos = substr($fono,0,2);
	 	$codigos = array('58','57','55','52','51','53','32','33','34','35','22','72','71',
			'73','75','41','42','43','45','63','65','64','67','61');
	 	if ($primeros_digitos == '+5') {
	 		$primeros_digitos = substr($fono,0,3);
	 		if ($primeros_digitos == '+56'){
	 			$fono = substr($fono,3);
	 		} else {
	 			return false;
	 		}

	 	} elseif($primeros_digitos == '56') {
	 		$fono = substr($fono,2);
	 	}
	 	//print_r($fono);die();
	 	if(strlen($fono) == 9){
	 		$codigo = substr($fono,0,1);
	 		if ($codigo != '9') {
	 			$codigo = substr($fono,0,2);
	 			if(!in_array($codigo,$codigos)){
	 				return false;
	 			}
	 		}
	 	} else {
	 		//print_r($fono);
	 		return false;
	 	}
	 	return true;
	 }
}
?>