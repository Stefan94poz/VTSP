<?php
class Desavanje extends Controller{
		protected function Index(){
			$viewmodel = new DesavanjeModel();
			$this->ReturnView($viewmodel->Index(), true);
		}
}
