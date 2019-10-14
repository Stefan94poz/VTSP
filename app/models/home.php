<?php
class HomeModel extends Model{
	public function Index(){
		$this->query('SELECT  * FROM desavanja ORDER BY id DESC ');
		$rows = $this->single();;
		return $rows;



	}
}
 ?>
