<?php

class Bootstrap{
	private $controller;
	private $action;
	private $request;

	public function __construct($request){
			$this->request = $request;
			if($this->request['controller'] == ""){
					$this->controller = 'home';
			}else{
					$this->controller = $this->request['controller'];
			}
			if($this->request['action'] == ""){
					$this->action = 'index';
			}else{
				$this->action = $this->request['action'];
			}
	}

	public function createController(){
		//Chek class
		if(class_exists($this->controller)){
				$parents = class_parents($this->controller);
				//Chek extend
				if(in_array("Controller", $parents)){
						if(method_exists($this->controller, $this->action)){
								return new $this->controller($this->action, $this->request);
						}else{
								//Method dose not exists
								echo '<h1>Method dose not exist!</h1>';
								return;
						}
				}else{
						//Base controller dose not found
						echo '<h1>Base controller dose not exist!</h1>';
						return;
				}
		}else{
				//Controller class dose not exists
				echo '<h1>Controller class dose not exist!</h1>';
				return;
		}
	}
}
