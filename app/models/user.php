<?php
class UserModel extends Model{
	public function register(){
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if ($post['submit']){
			// insert into mysql
			$this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
			$this->bind(':name',$post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password',$password);
			$this->execute();
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}return;
	}
	public function login(){
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		//$password = md5($post['password']);

		if ($post['submit']){
			// Compare login in db for ssluzba
			if($post['status'] == 'ssluzba' ){
				$this->query('SELECT * FROM ssluzba WHERE kor_ime = :kor_ime AND sifra = :sifra AND
				status = :status');
				$this->bind(':kor_ime', $post['kor_ime']);
				$this->bind(':sifra', $post['sifra']);
				$this->bind(':status', $post['status']);
				$this->execute();
				$row = $this->single();
			//Geting row from db
				if($row){
					$_SESSION['is_logged_in'] = true;
					$_SESSION['user_data'] = array(	
						"id"		=> $row['id'],
						"ime" 	=> $row['ime'],
						"prezime" 	=> $row['prezime'],
						"kor_ime"		=> $row['kor_ime'],
						"email" => $row['email'],
						"status" => $row['status']
					);
					header('Location: '.ROOT_URL.'ssluzba');

				}else{
					echo "Incorect login";
				}
			}else{
					echo "No such profile";
			}

			if($post['status'] == 'profesor' ){
				$this->query('SELECT * FROM profesori WHERE kor_ime = :kor_ime AND sifra = :sifra AND
				status = :status');
				$this->bind(':kor_ime', $post['kor_ime']);
				$this->bind(':sifra', $post['sifra']);
				$this->bind(':status', $post['status']);
				$this->execute();
				$row = $this->single();
			//Geting row from db
				if($row){
					$_SESSION['is_logged_in'] = true;
					$_SESSION['user_data'] = array(
						"id"		=> $row['id'],
						"ime" 	=> $row['ime'],
						"prezime" 	=> $row['prezime'],
						"kor_ime"		=> $row['kor_ime'],
						"email" => $row['email'],
						"status" => $row['status']
					);
					header('Location: '.ROOT_URL.'profesor');

				}else{
					echo "Incorect login";
				}
			}else{
					echo "No such profile";
			}

			if($post['status'] == 'student' ){
				$this->query('SELECT * FROM student WHERE br_index = :br_index AND sifra = :sifra AND
				status = :status');
				$this->bind(':br_index', $post['kor_ime']);
				$this->bind(':sifra', $post['sifra']);
				$this->bind(':status', $post['status']);
				$this->execute();
				$row = $this->single();
			//Geting row from db
				if($row){
					$_SESSION['is_logged_in'] = true;
					$_SESSION['user_data'] = array(
						"id"		=> $row['id'],
						"ime" 	=> $row['ime'],
						"prezime" 	=> $row['prezime'],
						"jmbg"		=> $row['jmbg'],
						"br_index" => $row['br_index'],
						"godina_upisa" => $row['godina_upisa'],
						"vrst_stud" => $row['vrst_stud'],
						"naz_stud_prog" => $row['naz_stud_prog'],
						"sifra" => $row['sifra'],
						"moji_predmeti" => $row['moji_predmeti'],
						"status" => $row['status'],
						"kredit" => $row['kredit']
					);
					header('Location: '.ROOT_URL.'student');

				}else{
					echo "Incorect login for student";
				}
			}else{
					echo "No such profile for  student"	;
				}
		}
	}//login end

}
