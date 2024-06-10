<?php
session_start();

$cookii = $_COOKIE['promotion'] ?? null;

if(!$cookii){
    setcookie('promotion', time()+60*60*24, time() + 60*60*24*365, '/'); 
}
$latsTime = $cookii - time();
$hours = floor($latsTime / 3600);
$minutes = floor(intdiv( $latsTime, 60) % 60);
$seconds = $latsTime % 60;
$exit = $_GET['exit'] ?? null;
$daysLater = $_SESSION['daysLater'] ?? null;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>СпаСалон</title>
</head>
<body>
    <header>
        
        <?php

$auth = $_SESSION['auth'] ?? null;

if(!$auth) { ?>
<header>
  <h1>Здравствуйте!<br>
  <?php if($latsTime > 0){
    echo 'Успейте сделать заказ за:';?><br>
  <?php echo "$hours:$minutes:$seconds";?><br>
<?php echo "и получите особо выгодное предложение.";
} 
else {
    echo '24 часа спец предложение!';
}?></h1>
  <h2><a href="login.php">Вход в личный кабинет</a></h2>
      
<?php }
else { ?>
  <header> 
  <h1><?php echo $_SESSION['login'];
  ?><br><?php if($latsTime > 0) {
  echo 'Ваше предложение в силе еще: '."$hours:$minutes:$seconds"; 
  }?></h1>
  <h2><a href="persArea.php">Страница личного кабинета</a></h2><br>
  <form action="">

        <input name="exit" type="submit" value="Выйти из личного кабинета.">

</form>
<?php } 
if($exit){
    session_unset();
    session_destroy();
    header ('Location: '.'index.php');
}
    ?>
    </header>
    <section>
    <article>
        <h2>
    <?php 
    if($daysLater > 0){
        echo 'До вашего дня рождения осталось: '.$_SESSION['daysLater'].' дней.';
    }
    elseif($daysLater === 0){
        echo 'Поздравляем с днем рождения!!';
    }
    ?> </h2>
    </article>
    <article>
        <br><br>
            <img src="images/spa6.jpg">
            <h2>Что дарят: дополнительная скидка 5% на все услуги в день рождения.<br> Чтобы воспользоваться скидкой:<br>
                 зайди в личный кабинет и введи дату своего рождения!!</h2>
        </article>
        <article>
            <a href="#">
                <h2>Скрабирование, обертывание, маска для лица</h2>
            </a>
            <img src="images/spa3.jpg">
            <h2>Скрабирование, обертывание, маска для лица</h2>
        </article>
        <article>
            <a href="#">
                <h2>Массажи:</h2>
            </a>
            <img src="images/spa2.jpg">
            <h2>Более 50 видов массажа для полного расслабления</h2>
        </article>
        <article>
            <a href="#">
                <h2>SPA программы:</h2>
            </a>
            <img src="images/spa4.jpg">
            <h2>СПА услуги и массаж в Бердянске на официальном сайте Спа от 3000₽</h2>
        </article>
        <article>
            <a href="#">
                <h2>Аренда:</h2>
            </a>
            <img src="images/spa5.jpg">
            <h2>Релакс зона с бассейном (соляная комната, фито-бочки, комната отдыха), хамам, сауна, детская комната и др.</h2>
        </article>
    </section>
    <footer>
        <div class="links">
            <a href="#">Вакансии</a>
            <a href="#">Контакты</a>
            <a href="#">О нас</a>
        </div>
        <div class="copyright">Copyright &copy;
            2024</div>
    </footer>

</body>
</html>
