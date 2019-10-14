<?php require('./app/views/templates/student_nav.php'); ?>
<div class="container">
	<div class="search-resoults search-resoults-stud">
		<div class="stud-info">
			<ul>
				<li>
					<p>
						<b>ИМЕ:</b> <?php echo $_SESSION['user_data']["ime"]?>
					</p>
				</li>
				<li>
					<p>
						<b>ПРЕЗИМЕ:</b> <?php echo $_SESSION['user_data']["prezime"]?>
					</p>
				</li>
				<li>
					<p>
						<b>БРОЈ ИНДЕКСА:</b> <?php echo $_SESSION['user_data']["br_index"]?>
					</p>
				</li>
				<li>
					<p>
						<b>СТУДИЈСКИ ПРОГРАМ:</b> <?php echo $_SESSION['user_data']["naz_stud_prog"]?>
					</p>
				</li>
				<li>
					<p>
						<b>КРЕДИТ:</b> <?php echo $_SESSION['user_data']["kredit"]?>
					</p>
				</li>
			</ul>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">НАЗИВ ПРЕДМЕТА</th>
					<th scope="col">СТУДИЈСКИ ПРОГРАМ</th>
					<th scope="col">СЕМЕСТАР</th>
					<th scope="col">СТАТУС ПРЕДМЕТА</th>
					<th scope="col">ПРЕДАВАЊА</th>
					<th scope="col">ВЕЖБЕ</th>
					<th scope="col">ЕСПБ</th>
					<th scope="col">ПОДПИС</th>
					<th scope="col">ОЦЕНА</th>
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
							<td><?php echo $item['status_pred'] ?></td>
							<td><?php echo $item['predavanja'] ?></td>
							<td><?php echo $item['vezbe'] ?></td>
							<td><?php echo $item['espb'] ?></td>
							<td><?php echo $item['prof_potpis'] ?></td>
							<td><?php echo $item['ocena'] ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
