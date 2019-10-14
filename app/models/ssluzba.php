<?php
class SsluzbaModel extends Model{
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
	}

	public function addstud(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit-student'])){
			$this->query('INSERT INTO student (
				ime,
				prezime,
				jmbg,
				br_index,
				godina_upisa,
				vrst_stud,
				naz_stud_prog,
				email,
				sifra,
				status,
				kredit
				)
			VALUES(:ime, :prezime, :jmbg, :br_index, :godina_upisa, :vrst_stud,
			:naz_stud_prog, :email, :sifra, :status, :kredit)');
			$this->bind(':ime', $post['ime']);
			$this->bind(':prezime', $post['prezime']);
			$this->bind(':jmbg', $post['jmbg']);
			$this->bind(':br_index', $post['br_index']);
			$this->bind(':godina_upisa', $post['godina_upisa']);
			$this->bind(':vrst_stud', $post['vrst_stud']);
			$this->bind(':naz_stud_prog', $post['naz_stud_prog']);
			$this->bind(':email', $post['email']);
			$this->bind(':sifra', $post['sifra']);
			$this->bind(':status', "student");
			$this->bind(':kredit', $post['kredit']);
			$this->execute();

			$connecion = mysqli_connect('localhost','root','','vtsp');
			mysqli_set_charset($connecion,"utf8");
			$query = "SELECT  * FROM predmeti";
			$result = mysqli_query($connecion, $query);
			$get_data = array();
			while($rows_predmeti = mysqli_fetch_assoc($result) ){
				$get_data[] = $rows_predmeti;
			}
			//var_dump($get_data);
		  //var_dump($rows_predmeti);

			if($this->lastInsertId()){
				$this->query('INSERT INTO predmeti_stud (
					br_index,
					naziv_predmeta,
					stud_program,
					semestar,
					status_pred,
					predavanja,
					vezbe,
					espb,
					prof_potpis,
					ocena,
					prijava)
				VALUES(
					:br_index,
					:naziv_predmeta,
					:stud_program,
					:semestar,
					:status_pred,
					:predavanja,
				  :vezbe,
					:espb ,
					:prof_potpis,
					:ocena ,
					:prijava)');
				foreach ($get_data as  $val) {
					$this->bind(':br_index',  $post['br_index']);
					$this->bind(':naziv_predmeta', $val['naziv_predmeta']);
					$this->bind(':stud_program', $val['stud_program']);
					$this->bind(':semestar',  $val['semestar']);
					$this->bind(':status_pred',  $val['status_pred']);
					$this->bind(':predavanja',  '');
					$this->bind(':vezbe', "");
					$this->bind(':espb',  $val['espb']);
					$this->bind(':prof_potpis', 'Ne');
					$this->bind(':ocena', '');
					$this->bind(':prijava', '');
					$this->execute();
				}
				mysqli_free_result($result);

			}
		}

		if(isset($_POST['update'])){
			$stud_id = $_POST['update_id'];
			$this->query('SELECT * FROM student WHERE id = :id');
			$this->bind(':id', $stud_id);
			$this->execute();
			$row = $this->single();
			if($row){
				$_SESSION['stud_data'] = array(
					"id" 	=> $row['id'],
					"ime" 	=> $row['ime'],
					"prezime" 	=> $row['prezime'],
					"jmbg" 	=> $row['jmbg'],
					"br_index" 	=> $row['br_index'],
					"godina_upisa" 	=> $row['godina_upisa'],
					"vrst_stud" 	=> $row['vrst_stud'],
					"naz_stud_prog" 	=> $row['naz_stud_prog'],
					"email" 	=> $row['email'],
					"sifra" 	=> $row['sifra'],
					"status" 	=> $row['status'],
					"kredit" 	=> $row['kredit']
				);
			}
		}

		if(isset($post['delete-student'])){
			$id = $_POST['update_id'];
			$this->query('DELETE FROM student WHERE id = :id');
			$this->bind(':id', $id);
			$this->execute();
			header('Location: '.ROOT_URL.'ssluzba/addstud');
		}

		if(isset($post['update-student'])){
			$id = $_POST['update_id'];
			$this->query('UPDATE student SET
				ime = :ime ,
				prezime = :prezime,
				jmbg = :jmbg,
				br_index =:br_index,
				godina_upisa = :godina_upisa,
				vrst_stud = :vrst_stud,
				naz_stud_prog = :naz_stud_prog,
				email = :email,
				sifra = :sifra, kredit = :kredit
				WHERE id = :id ');

			$this->bind(':id', $id);
			$this->bind(':ime', $_POST['ime']);
			$this->bind(':prezime', $_POST['prezime']);
			$this->bind(':jmbg', $_POST['jmbg']);
			$this->bind(':br_index', $_POST['br_index']);
			$this->bind(':godina_upisa', $_POST['godina_upisa']);
			$this->bind(':vrst_stud', $_POST['vrst_stud']);
			$this->bind(':naz_stud_prog', $_POST['naz_stud_prog']);
			$this->bind(':email', $_POST['email']);
			$this->bind(':sifra', $_POST['sifra']);
			$this->bind(':kredit', $_POST['kredit']);
			$this->execute();
			if($this->lastInsertId()){
				header('Location: '.ROOT_URL.'ssluzba/addstud');
			}
		}


	}

	public function objavaIspita(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['submit-obj_ispt'])){
			$to_day = $post["do_dana"];
			$to_month = $post["do_meseca"];
			$to_year = $post["do_godine"];


			$start_date_str = date("d.m.Y");
			$start_date = new DateTime($start_date_str);

			$to_date = strtotime($to_day . "." . $to_month . "." . $to_year);
			$end_date_str = date('d.m.Y' , $to_date);
			$end_date = new DateTime($end_date_str);

			$now_date = date("d.m.Y");

			 $this->query('UPDATE prijava_ispita SET
				 start_date = :start_date,
				 end_date =  :end_date
				 WHERE id = 1');
 			 $this->bind(':start_date', $start_date_str);
			 $this->bind(':end_date', $end_date_str);
			 $this->execute();
			 if($this->lastInsertId()){
 				header('Location: '.ROOT_URL.'ssluzba/ObjavaIspita');
 			}
		}
	}
	public function prijaveIspita(){
		if (isset($_POST["submit-search"])) {
			$predmet = $_POST["predmet"];
      $this->query('SELECT  * FROM predmeti_stud WHERE prijava = "Prijavljeno" AND naziv_predmeta = :naziv_predmeta');
			$this->bind(':naziv_predmeta', $predmet);
      $rows = $this->resultSet();
      $_SESSION['search'] = true;
      return $rows;
    }
	}

	public function obavestenja(){
		$user = $_SESSION['user_data']['status'] == "ssluzba";
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['submit-obav'])){
				echo " ". $post["naslov_obav"] . " " . $post["creation_date"] . '' . $post["tekst_obav"] ;
			$this->query('INSERT INTO obavestenja (
				naslov_obav,
				creation_date,
				tekst_obav
				)
			VALUES(
				:naslov_obav,
				:creation_date,
				:tekst_obav) ');

			$this->bind(':naslov_obav', $post['naslov_obav']);
			$this->bind(':creation_date', $post['creation_date']);
			$this->bind(':tekst_obav', $post['tekst_obav']);
			$this->execute();
			if($this->lastInsertId()){
				header('Location: '.ROOT_URL.'ssluzba/obavestenja');
			}
		}
		if(isset($post['get_obav'])){
			$this->query('SELECT  * FROM obavestenja ORDER BY creation_date DESC');
			$rows = $this->resultSet();
			$_SESSION['get_obav'] = true;
			return $rows;
		}
		if(isset($post['update_obav_get'])){
			$id = $_POST['update_obav_id'];
			$this->query('SELECT  * FROM obavestenja  WHERE id = :id ');
			$this->bind(':id', $id);
			$this->execute();
			$row = $this->single();

			if($row){
				$_SESSION['obav_data'] = array(
					"id" 	=> $row['id'],
					"naslov_obav" 	=> $row['naslov_obav'],
					"tekst_obav" 	=> $row['tekst_obav']
				);
			}
		}

		if(isset($post['update_obav'])){
			unset($_SESSION["obav_data"]);
			$id = $_POST['obav_id'];
			$this->query('UPDATE obavestenja SET
				id = :id ,
				naslov_obav = :naslov_obav,
				tekst_obav = :tekst_obav
				WHERE id = :id ');

			$this->bind(':id', $id);
			$this->bind(':naslov_obav', $_POST['naslov_obav']);
			$this->bind(':tekst_obav', $_POST['tekst_obav']);
			$this->execute();
			if($this->lastInsertId()){
				header('Location: '.ROOT_URL.'ssluzba/obavestenja');
			}
		}

		if(isset($post['delete_obav'])){
			unset($_SESSION["obav_data"]);
			$id = $_POST['obav_id'];
			$this->query('DELETE FROM obavestenja WHERE id = :id');
			$this->bind(':id', $id);
			$this->execute();
			header('Location: '.ROOT_URL.'ssluzba/obavestenja');
		}
	}

	public function desavanja(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['submit-des'])){
			$img_name = ($_FILES["fileToUpload"]["name"]) ;
			$target_dir = "C:/wamp64/www/VTSP/public/images/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 5000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			$this->query('INSERT INTO desavanja (
				naslov_des,
				img_name,
				creation_date,
				tekst_des
				)
			VALUES(
				:naslov_des,
				:img_name,
				:creation_date,
				:tekst_des) ');

			$this->bind(':naslov_des', $post['naslov_des']);
			$this->bind(':img_name', $img_name);
			$this->bind(':creation_date', $post['creation_date']);
			$this->bind(':tekst_des', $post['tekst_des']);
			$this->execute();
			if($this->lastInsertId()){
				header('Location: '.ROOT_URL.'ssluzba/desavanja');
			}
		}
		if(isset($post['get_des'])){
			$this->query('SELECT  * FROM desavanja ORDER BY id DESC');
			$rows = $this->resultSet();
			$_SESSION['get_des'] = true;
			return $rows;
		}

		if(isset($post['update_des_get'])){
			$id = $_POST['update_des_id'];
			$this->query('SELECT  * FROM desavanja  WHERE id = :id ');
			$this->bind(':id', $id);
			$this->execute();
			$row = $this->single();

			if($row){
				$_SESSION['des_data'] = array(
					"id" 	=> $row['id'],
					"naslov_des" 	=> $row['naslov_des'],
					"img_name" 	=> $row['img_name'],
					"creation_date" 	=> $row['creation_date'],
					"tekst_des" 	=> $row['tekst_des']
				);

			}
		}

		if(isset($post['delete_des'])){
			unset($_SESSION["des_data"]);
			$id = $_POST['des_id'];
			$this->query('DELETE FROM desavanja WHERE id = :id');
			$this->bind(':id', $id);
			$this->execute();
			header('Location: '.ROOT_URL.'ssluzba/desavanja');
		}
	}




}
