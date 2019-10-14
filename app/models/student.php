<?php
class StudentModel extends Model{
  public function Index(){
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url,'student') !== false) {
      $this->query('SELECT  * FROM predmeti_stud WHERE br_index = :br_index');
			$this->bind(':br_index',$_SESSION["user_data"]['br_index']);
			$rows = $this->resultSet();
			$_SESSION['search'] = true;
			return $rows;
    }
	}

  public function prijavaIspita(){
    if (isset($_POST["submit-search"])) {

      $this->query('SELECT  * FROM predmeti_stud WHERE br_index = :br_index AND prof_potpis = "Da" ');
      $this->bind(':br_index',$_SESSION["user_data"]['br_index']);
      $rows = $this->resultSet();
      $_SESSION['search'] = true;
      return $rows;
    }

    if(isset($_POST['prijavi_pred'])){
      $this->query('UPDATE  predmeti_stud SET  prijava = :prijava  WHERE id = :id');

      $this->bind(':id', $_POST['predmet_id']);
      $this->bind(':prijava', "Prijavljeno");
      $this->execute();
			$row = $this->single();

      $this->query('UPDATE  student SET  kredit = kredit - 100  WHERE br_index = :br_index');
      $this->bind(':br_index', $_SESSION["user_data"]['br_index']);
      $this->execute();
      $row = $this->single();

    }
    if(isset($_POST['odjava_ispit'])){
      $this->query('UPDATE  predmeti_stud SET  prijava = :prijava  WHERE id = :id');
      $this->bind(':id', $_POST['predmet_id']);
      $this->bind(':prijava', "Odjavljeno");
      $this->execute();
			$row = $this->single();

      $this->query('UPDATE  student SET  kredit = kredit + 100  WHERE br_index = :br_index');
      $this->bind(':br_index', $_SESSION["user_data"]['br_index']);
      $this->execute();
      $row = $this->single();

    }
  }
  public function obavestenja(){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


    if(isset($_POST["get_obav"])){
      $predmet = $_POST["predmet"];
      $this->query('SELECT  * FROM prof_obav WHERE naziv_predmeta = :naziv_predmeta  ORDER BY  creation_date ');
      $this->bind(':naziv_predmeta', $predmet);
      $rows = $this->resultSet();
      $_SESSION['get_obav'] = true;
      return $rows;
    }
  }
}
