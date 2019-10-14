<?php
class Skola extends Controller{
		protected function akreditacijaSkole(){
				$viewmodel = new SkolaModel();
				$this->ReturnView($viewmodel->akreditacijaSkole(), true);
		}
		protected function istorijatSkole(){
				$viewmodel = new SkolaModel();
				$this->ReturnView($viewmodel->istorijatSkole(), true);
		}
		protected function oSkoli(){
				$viewmodel = new SkolaModel();
				$this->ReturnView($viewmodel->oSkoli(), true);
		}
		protected function politikaKvaliteta(){
				$viewmodel = new SkolaModel();
				$this->ReturnView($viewmodel->politikaKvaliteta(), true);
		}
		protected function pravnaAkta(){
				$viewmodel = new SkolaModel();
				$this->ReturnView($viewmodel->pravnaAkta(), true);
		}
		protected function publikacije(){
				$viewmodel = new SkolaModel();
				$this->ReturnView($viewmodel->publikacije(), true);
		}
		protected function rasporedProstorija(){
				$viewmodel = new SkolaModel();
				$this->ReturnView($viewmodel->rasporedProstorija(), true);
		}
		protected function zaposleni(){
				$viewmodel = new SkolaModel();
				$this->ReturnView($viewmodel->zaposleni(), true);
		}
}
