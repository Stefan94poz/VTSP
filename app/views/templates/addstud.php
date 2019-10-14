<form class="add-stud" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
  <div class="form-wrap">
    <label for="ime">Име</label>
    <input   class="input-style" type="text" name="ime" placeholder="Име">

    <label for="prezime">Презиме</label>
    <input  class="input-style" type="text" name="prezime" placeholder="Презиме">

    <label >ЈМБГ</label>
    <input  class="input-style" type="text" name="jmbg" placeholder="ЈМБГ">

    <label >Број индекса</label>
    <input  class="input-style" type="text" name="br_index" placeholder="Број индекса">

    <label >Година уписа</label>
    <select class="form-control" name="godina_upisa">
      <option value=" "  disabled selected>Година уписа</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
    </select>

    <label >Врсте студија</label>
    <select class="form-control" name="vrst_stud">
      <option value=" "  disabled selected>Врсте студија</option>
      <option value="Основне академске">Основне академске</option>
      <option value="Основне струковне">Основне струковне</option>
      <option value="Специјалистичке">Специјалистичке</option>
    </select>

    <label >Студијски програм</label>
    <select class="form-control" name="naz_stud_prog">
       <option value=" "  disabled selected>Студијски програм</option>
       <option value="Електротехника и рачунарство">Електротехника и рачунарство</option>
       <option value="Заштита биља - Пољопривреда">Заштита биља - Пољопривреда</option>
       <option value="Машинство">Машинство</option>
       <option value="Екологија - Заштита животне средине">Екологија - Заштита животне средине</option>
       <option value="Прехрамбена технологија и нутриционизам">Прехрамбена технологија и нутриционизам</option>
   </select>

    <label >ЕМЕЈЛ</label>
    <input  class="input-style" type="text" name="email" placeholder="ЕМЕЈЛ">

    <label >Шифра</label>
    <input  class="input-style" type="text" name="sifra" placeholder="Шифра">

    <label >Кредит</label>
    <input  class="input-style" type="text" name="kredit" placeholder="Кредит">

    <input type="submit" name="submit-student" value="Додај студента" class="login-button" />

  </form>
