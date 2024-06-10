<?php
session_start();
$latsTime = $_COOKIE['promotion'] - time() ?? null;
$hours = floor($latsTime / 3600) ?? null;
$minutes = floor(intdiv( $latsTime, 60) % 60) ?? null;
$seconds = $latsTime % 60 ?? null;
$today = date("d");
$todayM = date("m");
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
<section>
<article>
    <h2>Личный кабинет.</h2>
</article>
<article>
    <h2><?php echo $_SESSION['login'];
    ?></h2>
</article>
<article>
    <h2><?php if($latsTime > 0){
    echo 'Успейте сделать заказ за:';
    }?></h2>
    <h2><?php if($latsTime > 0){
    echo "$hours:$minutes:$seconds";
    }?></h2>
</article>
<article>
    <h2>Введите дату рождения.V</h2>
</article>
<article><br>
    <form action="" method="post">
        <input name="day" type="text" placeholder="День">
        <input name="month" type="text" placeholder="Месяц">
        <input name="submit" type="submit" value="ОК">
</form>
</article>
<?php 
$birthday = $_POST['day'] ?? null;
$birthmonth = $_POST['month'] ?? null;
if ($birthday == $today && $birthmonth == $todayM ) {   
    $_SESSION['daysLater'] = 0;
    ?>
<article>
<h2>Поздравляем с днем рождения! <br></h2>
<h3>Наша команда желает тебе невероятных приключений <br>и много радостных моментов в жизни!</h3>
<img src="images/spa7.jpg">
</article>
<article>
<?php } 
else {
    $date = "2024-$birthmonth-$birthday";
    $timestamp = strtotime($date);
    $remaining = $timestamp - time();
if ($remaining > 0 && $birthday){

    $_SESSION['daysLater'] = floor(($remaining/3600)/24);
    $daysLater = $_SESSION['daysLater'];
}
elseif($birthday) {
    $date2 = "2025-$birthmonth-$birthday";
    $timestamp2 = strtotime($date2);
    $remaining2 = $timestamp2 - time();
    $_SESSION['daysLater'] = floor(($remaining2/3600)/24);
    $daysLater = $_SESSION['daysLater'];
}
}
?>
</article>
<article>
    <h2><?php 
    if($daysLater > 0){
        echo 'До вашего дня рождения осталось: '.$_SESSION['daysLater'].' дней.';
    }?></h2>
</article>
<article><br>
<form action="">

        <input name="exit" type="submit" value="Выйти из личного кабинета.">

</form>
<?php if($exit){
    session_unset();
    session_destroy();
    header ('Location: '.'index.php');
}
?>
</article>
 </section>
    <footer><br>
    <a href="index.php"> Вернуться на главную</a>
        <div class="copyright"><br>Copyright &copy; 
            2024</div>
    </footer>

</body>
</html>

  