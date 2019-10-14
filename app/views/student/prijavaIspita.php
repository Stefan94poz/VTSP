<?php require('./app/views/templates/student_nav.php'); ?>
<div class="container">
  <h1>PRIJAVA ISPITA</h1>
  <?php
  $connecion = mysqli_connect('localhost','root','','vtsp');
  mysqli_set_charset($connecion,"utf8");
  $user_id = $_SESSION['user_data']['id'];
  $query = "SELECT  kredit FROM  student WHERE id = $user_id";
  $result = mysqli_query($connecion, $query);
  $rows_obav = mysqli_fetch_assoc($result);
  echo "<p class='kredit'><b>ВАШ КРЕДИТ ЈЕ: </b>" . $rows_obav['kredit'] . "</p>" ;
  mysqli_free_result($result);
  ?>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
		<input type="submit" name="submit-search" value="ОСБЕЖИ" class="login-button" />
	</form>
	<div class="search-resoults search-resoults-stud">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">НАЗИВ ПРЕДМЕТА</th>
					<th scope="col">СТУДИЈСКИ ПРОГРАМ</th>
					<th scope="col">СЕМЕСТАР</th>
					<th scope="col">ПРЕДАВАЊА</th>
					<th scope="col">ВЕЖБЕ</th>
					<th scope="col">ЕСПБ</th>
					<th scope="col">ПОДПИС</th>
          <th scope="col">ПРИЈАВА</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($_SESSION["is_logged_in"]) && isset($_SESSION["search"]) ) : ?>
					<?php unset($_SESSION['search']); ?>
					<?php $br = 0; ?>
					<?php foreach ($viewmodel as $item) : ?>
						<tr>
							<th scope="row"><?php echo $br += 1; ?>.</th>
							<td><?php echo $item['naziv_predmeta'] ?></td>
							<td><?php echo $item['stud_program'] ?></td>
							<td><?php echo $item['semestar'] ?></td>
							<td><?php echo $item['predavanja'] ?></td>
							<td><?php echo $item['vezbe'] ?></td>
							<td><?php echo $item['espb'] ?></td>
							<td><?php echo $item['prof_potpis'] ?></td>
              <td><?php echo $item['prijava'] ?></td>
              <td>
              <?php if($item["prijava"] != "Prijavljeno")   : ?>
								<form class="add-stud" method="post" action="student/prijavaIspita">
									<input type="hidden" name="predmet_id" value="<?php echo $item['id']; ?>">
                  <input type="submit" name="prijavi_pred" value="Пријави">
								</form>
              <?php endif; ?>
                <?php if($item["prijava"] == "Prijavljeno")   : ?>
                  <form class="add-stud" method="post" action="student/prijavaIspita">
                    <input type="hidden" name="predmet_id" value="<?php echo $item['id']; ?>">
                    <input type="submit" name="odjava_ispit" value="Одјави">
                  </form>
                <?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
