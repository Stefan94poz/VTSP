<?php require('./app/views/templates/ssluzba_nav.php'); ?>

<div class="container">

<?php if (isset($_POST["submit-obj_ispt"])): ?>
			<br>
			<p2 class="succes"> Uspesno ste objavili ispitni rok </hp>

<?php endif; ?>


			<div class="obj-ispita">
				<h1>ОБЈАВА ИСПИТА</h1>
				<form class="obj_ispt-form" action="<?php $_SERVER['PHP_SELF']?>" method="post">
					<label for="">Од</label><br>
					<h3><?php echo date("d.m.Y")?></h3>
					<br><br>
					<label for="">До</label>
					<select required class="form-control" id="sel1" name="do_dana">
						<option value="" disabled selected>Дан</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					<select required class="form-control" id="sel1" name="do_meseca">
						<option value="" disabled selected>Месец</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
					<select required class="form-control" id="sel1" name="do_godine">
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
						<option value="2029">2029</option>
						<option value="2030">2030</option>
					</select>
					<input type="submit" name="submit-obj_ispt" value="Објави" class="login-button">
				</form>
		</div>
	</div>
