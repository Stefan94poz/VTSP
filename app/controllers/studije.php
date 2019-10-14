<?php
class Studije extends Controller{
		protected function upis(){
				$viewmodel = new StudijeModel();
				$this->ReturnView($viewmodel->upis(), true);
		}
		protected function smerovi(){
				$viewmodel = new StudijeModel();
				$this->ReturnView($viewmodel->smerovi(), true);
		}
		protected function studenti(){
				$viewmodel = new StudijeModel();
				$this->ReturnView($viewmodel->studenti(), true);
		}
		protected function statusSavezaStudenata(){
				$viewmodel = new StudijeModel();
				$this->ReturnView($viewmodel->statusSavezaStudenata(), true);
		}
		protected function studenskiRadovi(){
				$viewmodel = new StudijeModel();
				$this->ReturnView($viewmodel->studenskiRadovi(), true);
		}
		protected function galerija(){
				$viewmodel = new StudijeModel();
				$this->ReturnView($viewmodel->galerija(), true);
		}
		protected function rasporedProstorija(){
				$viewmodel = new StudijeModel();
				$this->ReturnView($viewmodel->rasporedProstorija(), true);
		}
}
