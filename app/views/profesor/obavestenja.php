<?php require('./app/views/templates/profesor_nav.php'); ?>
<?php
$connecion = mysqli_connect('localhost','root','','vtsp');
mysqli_set_charset($connecion,"utf8");
 $prof_id = $_SESSION['user_data']['id'];

$query = "SELECT  * FROM prof_predmeti WHERE id = $prof_id ";
$result = mysqli_query($connecion, $query);
$rows_prof = mysqli_fetch_assoc($result);

$predmet_1 = $rows_prof["predmet_1"];
$predmet_2 = $rows_prof["predmet_2"];
$predmet_3 = $rows_prof["predmet_3"];
 ?>
<div class="container">
	<div class="obj-ispita">
		<h1>Обавештења</h1>
		<div id="exTab2" class="container">
			<ul class="nav nav-tabs">
				<li class="active">
					<a  href="#1" data-toggle="tab" id="tab-1">Сва обавештења </a>
				</li>
				<li><a href="#2" data-toggle="tab" id="tab-2">Ново обавештење</a>
				</li>
			</ul>
			<div class="tab-content ">
				<div class="tab-pane active" id="1">
					<div class="search-resoults">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">ДАТУМ</th>
									<th scope="col">НАСЛОВ</th>
                  <th scope="col">ПРЕДМЕТ</th>
									<th scope="col">ТЕКСТ</th>
                  <th scope="col">
										<form class="button-get" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
											<input type="submit" name="get_obav" value="Освежи">
										</form>
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
											<td>
												<form class="add-stud" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
													<input type="hidden" name="update_obav_id" value="<?php echo $item['id']; ?>">
													<input type="submit" name="update_obav_get" value="ИЗМЕНИ">
												</form>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane " id="2">
					<form class="obav_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
						<label for="naslov_obav">Наслов обавештења</label>
						<input type="text" name="naslov_obav" value="<?php if(isset($_SESSION["obav_data"])){ echo $_SESSION["obav_data"]["naslov_obav"];} ?>" placeholder="Наслов обавештења">
            <label for="naslov_obav">Назив предмета</label>
            <select name="naziv_predmeta">
              <option value="<?php echo $rows_prof["predmet_1"] ?>"><?php echo $rows_prof["predmet_1"] ?></option>
              <option value="<?php echo $rows_prof["predmet_2"] ?>"><?php echo $rows_prof["predmet_2"] ?></option>
              <option value="<?php echo $rows_prof["predmet_3"] ?>"><?php echo $rows_prof["predmet_3"] ?></option>
            </select>
						<br>
						<p><b>Дамашњи датум</b></p>
						<p class="now-date"></p>
						<input type="hidden" name="creation_date" value='<?php  echo date("d.m.Y")?>'>
						<br>
						<label for="tekst_obav">Tекст обавештења</label>
						<textarea type="text" name="tekst_obav" value=" " placeholder="Текст обавештења"><?php if(isset($_SESSION["obav_data"])){ echo $_SESSION["obav_data"]["tekst_obav"];} ?></textarea>
						<?php if(isset($_SESSION["is_logged_in"]) && isset($_POST["update_obav_get"])){ ?>
							<button type="submit" name="update_obav">Измени обавештење</button>
							<input type="hidden" name="obav_id" value='<?php if(isset($_SESSION["obav_data"])){ echo $_SESSION["obav_data"]['id'];} ?>'>
							<button class="delete-button" type="submit" name="delete_obav">Избриши обавештење</button>
						<?php } else{ ?>
							<button type="submit" name="submit-obav">Oбјави обавештење</button>
					  <?php } ?>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>	<?= isset($_SESSION["obav_data"]); ?>
<script>
$( document ).ready(function() {
	var d = new Date();
	var strDate =  d.getDate() + "." + (d.getMonth()+1) + "." +  d.getFullYear();

	$(".now-date").html(strDate);

	$is_se_session = " <?php  if(isset($_SESSION["obav_data"]) ){echo isset($_SESSION["obav_data"]);} ?> ";

	if ($is_se_session == 1) {
		$( "#tab-2" ).click();
	}

});


</script>
