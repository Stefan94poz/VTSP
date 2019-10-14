<?php require('./app/views/templates/profesor_nav.php'); ?>
<div class="container">
	<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
		<label >Нађи студента:</label>
			<input  class=""type="text" name="ime" placeholder="Име">
			<input type="text" name="prezime" placeholder="Презиме">
			<input type="text" name="br_index" placeholder="Број индекса">
			<select  class="form-control" id="sel1" name="godina_upisa" >
				<option  value=" "   selected>Година уписа</option>
				<option  value="2015">2015</option>
				<option  value="2014">2014</option>
				<option  value="2013">2013</option>
			</select>
		<select  class="form-control" id="sel1" name="vrst_stud">
			<option value=" "  selected>Врсте студија</option>
			<option value="Основне академске">Основне академске</option>
			<option value="Основне струковне">Основне струковне</option>
			<option value="Специјалистичке">Специјалистичке</option>
		</select>
		<select  class="form-control" id="sel1" name="naz_stud_prog">
			<option value=" "  selected>Студијски програм</option>
			<option value="Електротехника и рачунарство">Електротехника и рачунарство</option>
			<option value="Заштита биља - Пољопривреда">Заштита биља - Пољопривреда</option>
			<option value="Машинство">Машинство</option>
			<option value="Екологија - Заштита животне средине">Екологија - Заштита животне средине</option>
			<option value="Прехрамбена технологија и нутриционизам">Прехрамбена технологија и нутриционизам</option>
		</select>
		<input type="submit" name="submit-search" value="НАЂИ" class="login-button" />
	</form>
	<div class="search-resoults">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">ИМЕ</th>
					<th scope="col">ПРЕЗИМЕ</th>
					<th scope="col">БРОЈ ИНДЕКСА</th>
					<th scope="col">ГОДИНА УПИСА</th>
					<th scope="col">ВРСТА СТУДИЈА</th>
					<th scope="col">СТУДИЈСКИ ПРОГРАМ</th>
					<th scope="col">EMAIL</th>
					<th scope="col">ИЗМЕНА СТАВКИ</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($_SESSION["is_logged_in"]) && isset($_SESSION["search"]) ) : ?>
					<?php unset($_SESSION['search']); ?>
					<?php $br = 0; ?>
					<?php foreach ($viewmodel as $item) : ?>
						<tr>
							<th scope="row"><?php echo $br += 1; ?>.</th>
							<td><?php echo $item['ime'] ?></td>
							<td><?php echo $item['prezime'] ?></td>
							<td><?php echo $item['br_index'] ?></td>
							<td><?php echo $item['godina_upisa'] ?></td>
							<td><?php echo $item['vrst_stud'] ?></td>
							<td><?php echo $item['naz_stud_prog'] ?></td>
							<td><?php echo $item['email'] ?></td>
							<td>
								<form class="add-stud" method="post" action="<?php $_SERVER['PHP_SELF']?>">
									<input type="hidden" name="stud_index" value="<?php echo $item['br_index']; ?>">
									<input type="submit" name="getStud" value="ИЗМЕНИ">
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
