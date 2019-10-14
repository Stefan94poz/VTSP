<!--Main content Start-->
		<div class="main">
			<!--Slider Start-->
				<div class="owl-carousel owl-theme" id="main-slider">
			    <div class="item">
						<img src="./public/images/polj.jpg" alt="">
						<h3>ЗАШТИТА БИЉА И ПОЉОПРИВРЕДА</h3>
						<a class="main-slider-button" href="">ВИШЕ О СМЕРУ</a>
					</div>
					<div class="item">
						<img src="./public/images/ele.jpg" alt="">
						<h3>ЕНЕРГЕТИКА И РАЧУНАРСТВО</h3>
						<a class="main-slider-button" href="">ВИШЕ О СМЕРУ</a>
					</div>
					<div class="item">
						<img src="./public/images/ma.jpg" alt="">
						<h3>МАШИНСТВО</h3>
						<a class="main-slider-button" href="">ВИШЕ О СМЕРУ</a>
					</div>
					<div class="item">
						<img src="./public/images/eko.jpg" alt="">
						<h3>ЗАШТИТА ЖИВОТНЕ СРЕДИНЕ</h3>
						<a class="main-slider-button" href="">ВИШЕ О СМЕРУ</a>
					</div>
					<div class="item">
						<img src="./public/images/pre.jpg" alt="">
						<h3>ПРЕХРАМБЕНА ТЕХНОЛОГИЈА И НУТРИЦИОНИЗАМ</h3>
						<a class="main-slider-button" href="">ВИШЕ О СМЕРУ</a>
					</div>
			</div>
			<!--Slider End-->
			<!--Category banner Start-->
			<div class="category-banner">
				<div class="container">
					<div class="owl-carousel  owl-theme" id="slider-banner">
				    <div  class="item">
							<a href="#" class="banner-link">
								<i class="fa fa-pagelines" aria-hidden="true"></i>
								<h4>Заштита биља <br>Пољопривреда</h4>
							</a>
						</div>
						<div class="item">
							<a href="#" class="banner-link">
								<i class="fa fa-microchip" aria-hidden="true"></i>
								<h4>Електротехника <br>и Рачунарство</h4>
							</a>
						</div>
						<div class="item">
							<a href="#" class="banner-link">
								<i class="fa fa-cogs" aria-hidden="true"></i>
								<h4>Машинство</h4>
							</a>
						</div>
						<div class="item">
							<a href="#" class="banner-link">
								<i class="fa fa-leaf" aria-hidden="true"></i>
								<h4>Екологија <br>Заштита животне<br>средине</h4>
							</a>
						</div>
						<div class="item">
							<a href="#" class="banner-link">
								<i class="fa fa-cutlery" aria-hidden="true"></i>
								<h4>Прехрамбена технологија <br>и Нутриционизам</h4>
							</a>
						</div>
					</div>
				</div>
			</div>
<!--News Start -->
			<div class="news">
				<div class="container">
					<div class="news-header">
						<h3>ОБАВЕШТЕЊА</h3>
					</div>
					<div class="row">
						<?php
						$connecion = mysqli_connect('localhost','root','','vtsp');
						mysqli_set_charset($connecion,"utf8");
						$query = "SELECT  * FROM (SELECT  * FROM obavestenja
											ORDER BY id DESC LIMIT 4)AS r ORDER BY id";
						$result = mysqli_query($connecion, $query);

						$rows_obav = mysqli_fetch_assoc($result);
						$get_data = array();

						while($rows_obav = mysqli_fetch_assoc($result) ){

							$get_data[] = $rows_obav;

						}
						$get_data = array_reverse($get_data, true);
						mysqli_free_result($result);

						?>
						<?php foreach ($get_data as $val ): ?>
					  <div class="card-news col-md-4 ">
					  	<div class="card-img">
					  		<a href="#">
					  			<img src="./public/images/sluzba.jpg" alt="">
									<P class="date-time"><?php echo $val['creation_date'] . PHP_EOL?></P>
									<p class="card-title"><?php echo $val['naslov_obav'] . PHP_EOL?></p>
					  		</a>
					  	</div>
							<div class="card-info">
								<p class="card-text"><?php echo $val['tekst_obav']?></p>
								<a href="#" class="card-button">Сазнај више</a>
							</div>
					  </div>
						<?php endforeach; ?>


					</div>
					<div class="news-button">
						<a href="">Остала обавештења</a>
					</div>
				</div>
			</div>
<!--News End -->
<!--Events Start -->
			<div class="events">
				<div class="container">
					<div class="card-event">
						<div class="row">
							<div class="card-event-text col-md-6">
								<h3 class="event-header">ДЕШАВАЊА</h3>
								<h2 class="event-text-title"><?php echo $viewmodel['naslov_des']?></h2>
								<p class="event-text-content"><?php echo $viewmodel['tekst_des']?></p>
								<a href="#" class="card-button">Сазнај више</a>
								<p class="date-time"><?php echo $viewmodel['creation_date']?></p>
							</div>
							<div class="card-event-img col-md-6" >
								<img src="./public/images/<?php echo $viewmodel['img_name']?>" class="" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
<!--Events End -->
<!--Contact Start -->
			<div class="contacts">
				<div class="container">
					<div class="row">
						<div class="left-side col-md-5">
							<h1>КОНТАКТИРАЈТЕ НАС</h1>
							<h3>ВИСОКА ТЕХНИЧКА ШКОЛА СТРУКОВНИХ СТУДИЈА ПОЖАРЕВАЦ</h3>
							<ul>
								<li><a href="#">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									Немањина 2, 12000 Пожаревац
								</a></li>
								<li><a href="#">
									<i class="fa fa-phone" aria-hidden="true"></i>
									Телефони:<span>&emsp;+381 12 531-667</span>,<span>+381 12 531-668</span>
								</a></li>
								<li><a href="#">
									<i class="fa fa-fax" aria-hidden="true"></i>
									Факс:<span>&emsp;+381 12 531-667</span>
								</a></li>
								<li><a href="#">
									<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
									Текући рачун:<span>&emsp;840-1180666-85</span>
								</a></li>
								<li><a href="#">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									е-mail:<span>&emsp;visa_po@ptt.rs</span>
								</a></li>
							</ul>
						</div>
						<div class="right-side col-md-7">
							<form>
							  <div class="row">
									<div class="write-us">
										<h1>ПИШИТЕ НАМ</h1>
									</div>
							    <div class="first-name col-md-6">
										<label for="first-name">Име<span>*</span></label>
							      <input type="text" id="name" class="form-control" placeholder="Име">
							    </div>
							    <div class="last-name col-md-6">
										<label for="last-name">Презиме<span>*</span></label>
							      <input type="text" id="last-name" class="form-control" placeholder="Презиме">
							    </div>
									<div class="title-form col-md-6">
										<label for="title">Наслов</label>
							      <input type="text" id="title" class="form-control" placeholder="Наслов">
							    </div>
							    <div class="email col-md-6">
										<label for="email">E-mail<span>*</span></label>
							      <input type="text" id="email" class="form-control" placeholder="E-mail">
							    </div>
									<div class="text-form">
								    <label for="text" id="text">Текст<span>*</span></label>
								    <textarea class="form-control" id="text" rows="3"></textarea>
							 		</div>
									<a href="" class="card-button">ПОШАЉИ</a>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--Google Maps Start -->
			<div class="google-map ">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1419.8701401645028!2d21.183403057683662!3d44.62278481451119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4750ef0ea338316d%3A0x32333e6dfe045aec!2sVisoka+Tehni%C4%8Dka+%C5%A0kola+Strukovnih+Studija+Po%C5%BEarevac!5e0!3m2!1sen!2srs!4v1526911002610" height="450px" width="100%"  frameborder="0" style="border:0" allowfullscreen class="map cont"></iframe>
			</div>
