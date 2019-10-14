
<form class="add-stud" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
  <div class="form-wrap">

    <label for="ime">Име</label>
    <input   class="input-style" type="text" name="ime" placeholder="Име" value="<?php echo $_SESSION['stud_data']['ime'] ?>">

    <label >Презиме</label>
    <input  class="input-style" type="text" name="prezime" placeholder="Презиме" value="<?php echo $_SESSION['stud_data']['prezime'] ?>">

    <label >ЈМБГ</label>
    <input  class="input-style" type="text" name="jmbg" placeholder="ЈМБГ" value="<?php echo $_SESSION['stud_data']['jmbg'] ?>">

    <label >Број индекса</label>
    <input  class="input-style" type="text" name="br_index" placeholder="Број индекса" value="<?php echo $_SESSION['stud_data']['br_index'] ?>">

    <label >Година уписа</label>
    <select class="form-control" name="godina_upisa" value="<?php echo $_SESSION['stud_data']['godina_upisa'] ?>">
      <option   disabled selected>Година уписа</option>
      <option <?php if ($_SESSION['stud_data']['godina_upisa'] == 2015) echo 'selected' ; ?> value="2015">2015</option>
      <option <?php if ($_SESSION['stud_data']['godina_upisa'] == 2014) echo 'selected' ; ?> value="2014">2014</option>
      <option <?php if ($_SESSION['stud_data']['godina_upisa'] == 2013) echo 'selected' ; ?> value="2013">2013</option>
    </select>

    <label >Врсте студија</label>
    <select class="form-control" name="vrst_stud" value="<?php echo $_SESSION['stud_data']['vrst_stud'] ?>">
      <option value=""  disabled selected>Врсте студија</option>
      <option <?php if ($_SESSION['stud_data']['vrst_stud'] == "Основне академске" ) echo 'selected' ; ?> value="Основне академске">Основне академске</option>
      <option <?php if ($_SESSION['stud_data']['vrst_stud'] == "Основне струковне") echo 'selected' ; ?> value="Основне струковне">Основне струковне</option>
      <option <?php if ($_SESSION['stud_data']['vrst_stud'] == "Специјалистичке") echo 'selected' ; ?> value="Специјалистичке">Специјалистичке</option>
    </select>

    <label >Студијски програм</label>
    <select class="form-control" name="naz_stud_prog" value="<?php echo $_SESSION['stud_data']['naz_stud_prog'] ?>">
       <option value=""  disabled selected>Студијски програм</option>
       <option <?php if ($_SESSION['stud_data']['naz_stud_prog'] == "Електротехника и рачунарство") echo 'selected' ; ?> value="Електротехника и рачунарство">Електротехника и рачунарство</option>
       <option <?php if ($_SESSION['stud_data']['naz_stud_prog'] == "Заштита биља - Пољопривреда") echo 'selected' ; ?> value="Заштита биља - Пољопривреда">Заштита биља - Пољопривреда</option>
       <option <?php if ($_SESSION['stud_data']['naz_stud_prog'] == "Машинство") echo 'selected' ; ?> value="Машинство">Машинство</option>
       <option <?php if ($_SESSION['stud_data']['naz_stud_prog'] == "Екологија - Заштита животне средине") echo 'selected' ; ?> value="Екологија - Заштита животне средине">Екологија - Заштита животне средине</option>
       <option <?php if ($_SESSION['stud_data']['naz_stud_prog'] == "Прехрамбена технологија и нутриционизам") echo 'selected' ; ?> value="Прехрамбена технологија и нутриционизам">Прехрамбена технологија и нутриционизам</option>
   </select>

    <label >ЕМЕЈЛ</label>
    <input  class="input-style" type="text" name="email" placeholder="ЕМЕЈЛ" value="<?php echo $_SESSION['stud_data']['email'] ?>">

    <label >Шифра</label>
    <input  class="input-style" type="text" name="sifra" placeholder="Шифра" value="<?php echo $_SESSION['stud_data']['sifra'] ?>">

    <label >Кредит</label>
    <input  class="input-style" type="text" name="kredit" placeholder="Кредит" value="<?php echo $_SESSION['stud_data']['kredit'] ?>">

    <input type="hidden" name="update_id" value="<?php echo $_SESSION['stud_data']['id'] ?>">
    <input type="submit" name="update-student" value="Izmeni studenta" class="login-button" />
    <input type="submit" name="delete-student" value="Izbriši studenta" class="login-button" />
    <?php unset($_SESSION['stud_data']); ?>
  </form>
