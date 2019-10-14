<div class="header">
	<div class="top-nav">
		<div class="container">
			<ul class="nav-pc">
				<li class="logo">
					<a href="#"><img src="http:/VTSP/public/images/logo.png" alt=""></a>
				</li>
				<li>
					<a href="<?php echo ROOT_URL; ?>home" class="active">ШКОЛА</a>
					<ul class="sub-nav">
						<li><a href="<?php echo ROOT_URL; ?>skola/istorijatSkole">Историјат школе</a></li>
						<li><a href="<?php echo ROOT_URL; ?>skola/akreditacijaSkole">Акредитација школе</a></li>
						<li><a href="<?php echo ROOT_URL; ?>skola/oSkoli">О школи</a></li>
						<li><a href="<?php echo ROOT_URL; ?>skola/politikaKvaliteta">Политика квалитета</a></li>
						<li><a href="<?php echo ROOT_URL; ?>skola/pravnaAkta">Правна акта</a></li>
						<li><a href="<?php echo ROOT_URL; ?>skola/publikacije">Публикације</a></li>
						<li><a href="<?php echo ROOT_URL; ?>skola/rasporedProstorija">Распоред просторија</a></li>
						<li><a href="<?php echo ROOT_URL; ?>skola/zaposleni">Запослени</a></li>
					</ul>
				</li>
				<li>
					<a href="#">СТУДИЈЕ</a>
					<ul class="sub-nav">
						<li><a href="<?php echo ROOT_URL; ?>studije/upis">Упис</a></li>
						<li><a href="<?php echo ROOT_URL; ?>studije/smerovi">Смерови</a></li>
						<li><a href="<?php echo ROOT_URL; ?>studije/studenti">Студенти</a></li>
						<li><a href="<?php echo ROOT_URL; ?>studije/statusSavezaStudenata">Статус савеза студената</a></li>
						<li><a href="<?php echo ROOT_URL; ?>studije/studenskiRadovi">Студенски радови</a></li>
						<li><a href="<?php echo ROOT_URL; ?>studije/galerija">Галерија слика</a></li>
					</ul>
				</li>
				<li><a href="<?php echo ROOT_URL; ?>desavanje">ДЕШАВАЉЕ</a></li>
				<li><a href="<?php echo ROOT_URL; ?>projekti">ПРОЈЕКТИ</a></li>
				<li><a href="<?php echo ROOT_URL; ?>obavestenje">ОБАВЕШТЕЊЕ</a></li>
				<li><a href="<?php echo ROOT_URL; ?>kontakt">КОНТАКТ</a></li>
				<?php // TODO: da se ubaci ROOTH_URL u prijavi se ?>
				<?php if (isset($_SESSION['is_logged_in'])) :?>
						<li>
							<!-- Ubacuje status u ROOT_URL tako da ce biti users/student ili ssluzba ili prof-->
							<a href="<?php echo ROOT_URL; ?><?php echo $_SESSION['user_data']['status']?>"
								 style="color:#FB3640;word-spacing:7px;text-transform:uppercase;">
								 <?php  echo $_SESSION['user_data']['ime'] . " " . $_SESSION['user_data']['prezime'];?>
							</a>
						 </li>
						<li>
							 <a class="nav-link" href="<?php echo ROOT_URL;?>users/logout ">ОДЈАВИ СЕ</a>
						</li>
				<?php else : ?>
					<li>
						<a href="<?php echo ROOT_URL; ?>users/login" style="color:#FB3640">ПРИЈАВИ СЕ</a>
						</li>
				<?php endif; ?>
			</ul>
			<!-- Mobile navigation bar -->
			<div href="#" class="burger-button"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<ul class="nav-mobile">
				<li class="logo"><a href="#"><img src="public/images/logo.png" alt=""></a></li>
				<li><a href="#" class="active">ШКОЛА</a></li>
				<li><a href="#">СТУДИЈЕ</a></li>
				<li><a href="#">ДЕШАВАЉЕ</a></li>
				<li><a href="#">ПРОЈЕКТИ</a></li>
				<li><a href="#">ОБАВЕШТЕЊЕ</a></li>
				<li><a href="#">КОНТАКТ</a></li>
				<?php if (isset($_SESSION['is_logged_in'])) :?>
						<li>
							<a href="<?php echo ROOT_URL; ?>" style="color:#FB3640;word-spacing:7px;text-transform:uppercase;"><?php  echo $_SESSION['user_data']['ime'] . " " . $_SESSION['user_data']['prezime'];?></a></li>
						<li>
							 <a class="nav-link" href="<?php echo ROOT_URL;?>users/logout ">ОДЈАВИ СЕ</a>
						</li>
				<?php else : ?>
					<li>
						<a href="<?php echo ROOT_URL; ?>users/login" style="color:#FB3640">ПРИЈАВИ СЕ</a>
						</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
