<?php require('./app/views/templates/ssluzba_nav.php'); ?>
<div class="container">
	<div class="obj-ispita">
		<h1>Дешавања</h1>
		<div id="exTab2" class="container">
			<ul class="nav nav-tabs">
				<li class="active">
					<a  href="#1" data-toggle="tab" id="tab-1">Сва дешавања </a>
				</li>
				<li><a href="#2" data-toggle="tab" id="tab-2">Ново дешавање</a>
				</li>
			</ul>
			<div class="tab-content ">
				<div class="tab-pane active" id="1">
					<div class="search-resoults">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">СЛИКА</th>
									<th scope="col">ДАТУМ</th>
									<th scope="col">НАСЛОВ</th>
									<th scope="col">ТЕКСТ</th>
									<th scope="col">
										<form class="button-get" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
											<input type="submit" name="get_des" value="Освежи">
										</form>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php if(isset($_SESSION["is_logged_in"]) && isset($_SESSION["get_des"]))  : ?>
									<?php $br = 0; ?>
									<?php unset($_SESSION['get_des']); ?>
									<?php foreach ($viewmodel as $item): ?>
										<tr>
											<th scope="row"><?php echo $br += 1; ?>.</th>
											<td><img src="./public/images/<?php echo $item['img_name'] ?>" alt="" width="150px" height="150px"></td>
											<td><?php echo $item['creation_date'] ?></td>
											<td><?php echo $item['naslov_des'] ?></td>
											<td style="max-width:250px"><?php echo $item['tekst_des'] ?></td>
											<td>
												<form class="add-stud" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
													<input type="hidden" name="update_des_id" value="<?php echo $item['id']; ?>">
													<input type="submit" name="update_des_get" value="ИЗМЕНИ">
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
					<form class="obav_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
						<label for="naslov_des">Наслов дешавања</label>
						<input type="text" name="naslov_des" value="<?php if(isset($_SESSION["des_data"])){ echo $_SESSION["des_data"]["naslov_des"];} ?>" placeholder="Наслов обавештења">
						<br>
						<p><b>Дамашњи датум</b></p>
						<p class="now-date"></p>
						<input type="hidden" name="creation_date" value='<?php  echo date("d.m.Y")?>'>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<br>
						<label for="tekst_des">Tекст дешавања</label>
						<textarea type="text" name="tekst_des" value=" " placeholder="Текст обавештења"><?php if(isset($_SESSION["des_data"])){ echo $_SESSION["des_data"]["tekst_des"];} ?></textarea>
						<?php if(isset($_SESSION["is_logged_in"]) && isset($_POST["update_des_get"])){ ?>
							<button type="submit" name="update_des">Измени дешавање</button>
							<input type="hidden" name="des_id" value='<?php if(isset($_SESSION["des_data"])){ echo $_SESSION["des_data"]['id'];} ?>'>
							<button class="delete-button" type="submit" name="delete_des">Избриши дешавање</button>
						<?php } else{ ?>
							<button type="submit" name="submit-des">Oбјави обавештење</button>
					  <?php } ?>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<script>
$( document ).ready(function() {
	var d = new Date();
	var strDate =  d.getDate() + "." + (d.getMonth()+1) + "." +  d.getFullYear();

	$(".now-date").html(strDate);

	$is_se_session = " <?php  if(isset($_SESSION["des_data"]) ){echo isset($_SESSION["des_data"]);} ?> ";

	if ($is_se_session == 1) {
		$( "#tab-2" ).click();
	}

});
</script>
