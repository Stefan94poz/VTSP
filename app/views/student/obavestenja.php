<?php require('./app/views/templates/student_nav.php'); ?>
<?php
$connecion = mysqli_connect('localhost','root','','vtsp');

mysqli_set_charset($connecion,"utf8");
$stud_index = $_SESSION['user_data']['br_index'];

$query = "SELECT  * FROM predmeti_stud WHERE br_index = $stud_index ";
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
<div class="container">
	<div class="obj-ispita">
		<h1>Обавештења</h1>
		<div id="exTab2" class="container">
			<ul class="nav nav-tabs">
				<li class="active">
					<a  href="#1" data-toggle="tab" id="tab-1">Сва обавештења </a>
				</li>
			</ul>
			<div class="tab-content ">
				<div class="tab-pane active" id="1">
					<div class="search-resoults">
						<table class="table">
							<thead>
								<div class="serach-wrap">
									<form class="button-get" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="ovbavestenja-prof">
										<select class="" name="predmet" id="predmeti">
											<option value="" disabled selected>ОДАБЕРИ ПРЕДМЕТ</option>
											<?php foreach ($predmeti as $predmet) { ?>
												<option value="<?php echo $predmet ?>"><?php echo $predmet ?></option>
											<?php	} ?>
										</select>
										<input type="submit" name="get_obav" value="Освежи">
									</form>
								</div>

								<tr>
									<th scope="col">#</th>
									<th scope="col">ДАТУМ</th>
									<th scope="col">НАСЛОВ</th>
                  <th scope="col">ПРЕДМЕТ</th>
									<th scope="col">ТЕКСТ</th>
                  <th scope="col">

									</th>
								</tr>
							</thead>
							<tbody>
								<?php if(isset($_SESSION["is_logged_in"]) && isset($_SESSION["get_obav"]))  : ?>
									<?php $br = 0; ?>
									<?php unset($_SESSION['get_obav']); ?>
									<?php foreach ($viewmodel as $item): ?>
										<tr>
											<th scope="row"><?php echo $br += 1; ?>.</th>
											<td><?php echo $item['creation_date'] ?></td>
											<td><?php echo $item['naslov_obav'] ?></td>
                      <td><?php echo $item['naziv_predmeta'] ?></td>
											<td style="max-width:250px"><?php echo $item['tekst_obav'] ?></td>

										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

$( "#ovbavestenja-prof" ).submit(function( event ) {
  $default_value = $( "#predmeti option:selected" ).text();;
  if ($default_value == "ОДАБЕРИ ПРЕДМЕТ") {
    $("input[name='get_obav']").addClass('disabled');
    event.preventDefault();
  }else {
    $(".login-button").removeClass('disabled');
  }
});
</script>
