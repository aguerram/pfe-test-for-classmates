<?php
class DataBase
{
	public $lien;
	public $local ;  //exemple : mysql:host=hostname;dbname=database
	public $user;
	public $pass;

	/**
	 * DataBase constructor.
	 */
	public function __construct(){

		$this->local="mysql:host=localhost;dbname=pfe_test";
		$this->user="root";
		$this->pass="password";
		try{
			$this->lien = new PDO($this->local,$this->user,$this->pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch (Exception $e)
		{die('Erreur : ' . $e->getMessage());}
	}
	public function connexionBdd(){

		return $this->lien;
	}

	public function deconnexionBdd(){
		$this->lien=null;
	}
}


?>