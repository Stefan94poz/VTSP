<?php
class ProfesorModel extends Model{
  public function Index(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['submit-search'])){
			$this->query('SELECT  * FROM student WHERE ime = :ime OR prezime = :prezime OR
			br_index = :br_index OR godina_upisa = :godina_upisa OR vrst_stud = :vrst_stud
			OR naz_stud_prog = :naz_stud_prog');

			$this->bind(':ime',$post['ime']);
			$this->bind(':prezime', $post['prezime']);
			$this->bind(':br_index', $post['br_index']);
			$this->bind(':godina_upisa', $post['godina_upisa']);
			$this->bind(':vrst_stud', $post['vrst_stud']);
			$this->bind(':naz_stud_prog', $post['naz_stud_prog']);
			$rows = $this->resultSet();
			$_SESSION['search'] = true;
			return $rows;
		}

    if(isset($_POST['getStud'])){
      $stud_index = $_POST['stud_index'];
			$this->query('SELECT * FROM student WHERE br_index = :br_index');
			$this->bind(':br_index', $stud_index);
			$this->execute();
			$row = $this->single();
			if($row){
				$_SESSION['stud_data'] = array(
					"br_index" 	=> $row['br_index']
				);
        header('Location: '.ROOT_URL.'profesor/izmenaStud');
			}
    }
  }

  public function izmenaStud(){
    if (isset($_POST["submit-search"])) {

      $connecion = mysqli_connect('localhost','root','','vtsp');
      mysqli_set_charset($connecion,"utf8");

      $prof_id = $_SESSION['user_data']['id'];

      $query = "SELECT  * FROM prof_predmeti WHERE id = $prof_id ";
      $result = mysqli_query($connecion, $query);
      $rows_prof = mysqli_fetch_assoc($result);

      $predmet_1 = $rows_prof["predmet_1"];
      $predmet_2 = $rows_prof["predmet_2"];
      $predmet_3 = $rows_prof["predmet_3"];

      $this->query('SELECT  * FROM predmeti_stud
      WHERE br_index = :br_index  AND   naziv_predmeta IN (:predmet_1, :predmet_2, :predmet_3)');
      $this->bind(':br_index', $_SESSION['stud_data']['br_index']);
      $this->bind(':predmet_1', $predmet_1);
      $this->bind(':predmet_2', $predmet_2);
      $this->bind(':predmet_3', $predmet_3);
      $rows = $this->resultSet();
      $_SESSION['search'] = true;
      return $rows;
    }
    if(isset($_POST['izmena_stud'])){
       $predavanja = $_POST["predavanja"];
       $vezbe = $_POST["vezbe"];
       $ocena = $_POST["ocena"];
       $podpis = $_POST["podpis"];
       $naziv_predmeta = $_POST["naziv_predmeta"];
       $br_index = $_POST["br_index"];

      $this->query('UPDATE predmeti_stud SET
      predavanja = :predavanja,
      vezbe = :vezbe,
      prof_potpis = :prof_potpis,
      ocena = :ocena
      WHERE br_index = :br_index AND naziv_predmeta = :naziv_predmeta');

      $this->bind(':br_index', $br_index );
      $this->bind(':predavanja', $predavanja);
      $this->bind(':vezbe', $vezbe);
      $this->bind(':prof_potpis', $podpis);
      $this->bind(':ocena', $ocena);
      $this->bind(':naziv_predmeta', $naziv_predmeta);
      $this->execute();
			$row = $this->single();
    }
  }

  public function obavestenja(){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if(isset($post['submit-obav'])){
			$this->query('INSERT INTO prof_obav (
				naslov_obav,
        naziv_predmeta,
				creation_date,
				tekst_obav
				)
			VALUES(
				:naslov_obav,
        :naziv_predmeta,
				:creation_date,
				:tekst_obav) ');
      echo  $_post['naziv_predmeta'];
			$this->bind(':naslov_obav', $post['naslov_obav']);
      $this->bind(':naziv_predmeta', $post['naziv_predmeta']);
			$this->bind(':creation_date', $post['creation_date']);
			$this->bind(':tekst_obav', $post['tekst_obav']);
			$this->execute();
			if($this->lastInsertId()){
				header('Location: '.ROOT_URL.'profesor/obavestenja');
			}
		}


		if(isset($_POST["get_obav"])){
			$this->query('SELECT  * FROM prof_obav ORDER BY creation_date DESC');
			$rows = $this->resultSet();
			$_SESSION['get_obav'] = true;
			return $rows;
		}

		if(isset( $_POST['update_obav_get'] )){
			$id = $_POST['update_obav_id'];
			$this->query('SELECT  * FROM prof_obav  WHERE id = :id ');
			$this->bind(':id', $id);
			$this->execute();
			$row = $this->single();
      if($row){
				$_SESSION['obav_data'] = array(
          "id" 	=> $row['id'],
					"naslov_obav" 	=> $row['naslov_obav'],
          "naziv_predmeta" 	=> $row['naziv_predmeta'],
					"tekst_obav" 	=> $row['tekst_obav']
				);
      }
		}

		if(isset($_POST['update_obav'])){
			unset($_SESSION["obav_data"]);
      echo $_POST['naziv_predmeta'];
			$id = $_POST['obav_id'];
			$this->query('UPDATE prof_obav SET
				id = :id ,
				naslov_obav = :naslov_obav,
        naziv_predmeta = :naziv_predmeta,
				tekst_obav = :tekst_obav
				WHERE id = :id ');

			$this->bind(':id', $id);
			$this->bind(':naslov_obav', $_POST['naslov_obav']);
      $this->bind(':naziv_predmeta', $_POST['naziv_predmeta']);
			$this->bind(':tekst_obav', $_POST['tekst_obav']);
			$this->execute();
			if($this->lastInsertId()){
				header('Location: '.ROOT_URL.'profesor/obavestenja');
			}
		}

		if(isset($_POST['delete_obav'])){
			unset($_SESSION["obav_data"]);
			$id = $_POST['obav_id'];
			$this->query('DELETE FROM prof_obav WHERE id = :id');
			$this->bind(':id', $id);
			$this->execute();
			header('Location: '.ROOT_URL.'profesor/obavestenja');
		}

  }

}
