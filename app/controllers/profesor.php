<?php
class Profesor extends Controller {
  protected function Index(){
    if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "profesor") {
			header('Location: '.ROOT_URL.'home');
		}
			$viewmodel = new ProfesorModel();
			$this->ReturnView($viewmodel->Index(), true);
	}
  protected function izmenaStud(){
    if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "profesor") {
			header('Location: '.ROOT_URL.'home');
		}
			$viewmodel = new ProfesorModel();
			$this->ReturnView($viewmodel->izmenaStud(), true);
	}
  protected function obavestenja(){
    if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "profesor") {
			header('Location: '.ROOT_URL.'home');
		}
      $viewmodel = new ProfesorModel();
      $this->ReturnView($viewmodel->obavestenja(), true);
  }


}
