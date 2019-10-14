<?php require('./app/views/templates/profesor_nav.php'); ?>
<div class="container">
  <h1>Izmena studenata</h1>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <input type="submit" name="submit-search" value="ОСБЕЖИ" class="login-button" />
  </form>
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
              <td><?php echo $item['br_index'] ?></td>
							<td><?php echo $item['naziv_predmeta'] ?></td>
							<td><?php echo $item['stud_program'] ?></td>
							<td><?php echo $item['semestar'] ?></td>
							<td><?php echo $item['predavanja'] ?><input type="text" name="predavanja" value="<?php echo $item['predavanja']; ?>"></td>
							<td><?php echo $item['vezbe'] ?><input type="text" name="vezbe" value="<?php echo $item['vezbe']; ?>"></td>
							<td><?php echo $item['espb'] ?></td>
							<td><?php echo $item['prof_potpis'] ?>
                <select>
                  <option value="Ne">Не</option>
                  <option value="Da">Да</option>
                </select>
              </td>
              <td><?php echo $item['prijava'] ?></td>
              <td><?php echo $item['ocena'] ?><input type="text" name="ocena" value="<?php echo $item['ocena']; ?>"></td>
              <td>
								<form id="izmena_stud" class="izmena-stud" method="post" action="<?php $_SERVER['PHP_SELF']?>">
                  <input type="hidden" name="predavanja" value="">
                  <input type="hidden" name="vezbe" value="">
                  <input type="hidden" name="ocena" value="">
                  <input type="hidden" name="podpis" value="">
									<input type="hidden" name="br_index" value="<?php echo $item['br_index'] ?>">
                  <input type="hidden" name="naziv_predmeta" value="<?php echo $item['naziv_predmeta'] ?>">
                  <input type="button" name="button" value="Измени">
                  <input type="submit" name="izmena_stud" value="Измени" style="display:none;">
								</form>

							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
$('input[type="button"]').click(function() {
  $predavanja  = $(this).parents("td").siblings("td").find("input[name='predavanja']").val();
	$vezbe  = $(this).parents("td").siblings("td").find("input[name='vezbe']").val();
  $podpis  = $(this).parents("td").siblings("td").find("option:selected").val();
	$ocena  = $(this).parents("td").siblings("td").find("input[name='ocena']").val();

	$(".izmena-stud input[name=predavanja]").val($predavanja);
	$(".izmena-stud input[name=vezbe]").val($vezbe);
  $(".izmena-stud input[name=podpis]").val($podpis);
	$(".izmena-stud input[name=ocena]").val($ocena);
  $(this).siblings(".izmena-stud input[type=submit]").click();

});
</script>
