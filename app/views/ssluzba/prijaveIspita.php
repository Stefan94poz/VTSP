<?php require('./app/views/templates/ssluzba_nav.php'); ?>
<div class="container">
  <h1>PRIJAVA ISPITA</h1>
  <?php
  $connecion = mysqli_connect('localhost','root','','vtsp');

  mysqli_set_charset($connecion,"utf8");

  $query = "SELECT  DISTINCT naziv_predmeta  FROM predmeti";
  $result = mysqli_query($connecion, $query);
  $get_data = array();
  $predmeti = array();

  while($rows_obav = mysqli_fetch_assoc($result) ){
    $get_data[] = $rows_obav;
  }

  foreach ($get_data as $key => $value) {
    $predmeti[] = $value['naziv_predmeta'];
  }
   ?>
<div class="serach-wrap sluzba">
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="prijava-ispita">
  <select class="" name="predmet" id="predmeti">
    <option value="" disabled selected>ОДАБЕРИ ПРЕДМЕТ</option>
    <?php foreach ($predmeti as $predmet) { ?>
      <option value="<?php echo $predmet ?>"><?php echo $predmet ?></option>
    <?php	} ?>
  </select>
	<input type="submit" name="submit-search" value="ОСБЕЖИ" class="login-button" />
</form>
</div>
	<div class="search-resoults search-resoults-stud">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
          <th scope="col">БРОЈ ИНДЕКСА</th>
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
              <td><?php echo $item['br_index'] ?></td>
							<td><?php echo $item['naziv_predmeta'] ?></td>
							<td><?php echo $item['stud_program'] ?></td>
							<td><?php echo $item['semestar'] ?></td>
							<td><?php echo $item['predavanja'] ?></td>
							<td><?php echo $item['vezbe'] ?></td>
							<td><?php echo $item['espb'] ?></td>
							<td><?php echo $item['prof_potpis'] ?></td>
              <td><?php echo $item['prijava'] ?></td>

						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">

$( "#prijava-ispita" ).submit(function( event ) {
  $default_value = $( "#predmeti option:selected" ).text();
  if ($default_value == "ОДАБЕРИ ПРЕДМЕТ") {
    $(".login-button").addClass('disabled');
    event.preventDefault();
  }else {
    $(".login-button").removeClass('disabled');
  }
});
</script>
