<?php
class Student extends Controller {
  protected function Index(){
    if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "student") {
      header('Location: '.ROOT_URL.'home');
    }
			$viewmodel = new StudentModel();
			$this->ReturnView($viewmodel->Index(), true);
	}
  protected function prijavaIspita(){
    if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "student") {
      header('Location: '.ROOT_URL.'home');
    }
			$viewmodel = new StudentModel();
			$this->ReturnView($viewmodel->prijavaIspita(), true);
	}
  protected function obavestenja(){
    if (!isset($_SESSION['is_logged_in']) AND 	!$_SESSION['user_data']['status'] == "student") {
      header('Location: '.ROOT_URL.'home');
    }
      $viewmodel = new StudentModel();
      $this->ReturnView($viewmodel->obavestenja(), true);
  }
}
