<?php
class Ssluzba extends Controller{
	protected function Index(){

		if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "ssluzba") {
			header('Location: '.ROOT_URL.'home');
		}
			$viewmodel = new SsluzbaModel();
			$this->ReturnView($viewmodel->Index(), true);

	}

	protected function addstud(){
		if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "ssluzba") {
			header('Location: '.ROOT_URL.'home');
		}
			$viewmodel = new SsluzbaModel();
			$this->ReturnView($viewmodel->addstud(), true);
	}
	protected function objavaIspita(){
		if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "ssluzba") {
			header('Location: '.ROOT_URL.'home');
		}
			$viewmodel = new SsluzbaModel();
			$this->ReturnView($viewmodel->objavaIspita(), true);
	}
	protected function obavestenja(){
		if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "ssluzba") {
			header('Location: '.ROOT_URL.'home');
		}
			$viewmodel = new SsluzbaModel();
			$this->ReturnView($viewmodel->obavestenja(), true);
	}
	protected function desavanja(){
		if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "ssluzba") {
			header('Location: '.ROOT_URL.'home');
		}
			$viewmodel = new SsluzbaModel();
			$this->ReturnView($viewmodel->desavanja(), true);
	}
	protected function prijaveIspita(){
		if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "ssluzba") {
			header('Location: '.ROOT_URL.'home');
		}
			$viewmodel = new SsluzbaModel();
			$this->ReturnView($viewmodel->prijaveIspita(), true);
	}
}
