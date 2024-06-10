
<html>
<body>
    <form action="" method="post">
        <input name="login" type="text" placeholder="Логин">
        <input name="password" type="password" placeholder="Пароль">
        <input name="submit" type="submit" value="Войти">
    </form>
<?php
$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;
$gues = $gues ?? null;
if ($password ==! null) {
    $pass = sha1($password);
}
else {
    $pass = null;
}
$users = [
    ['login' => 'user1', 'password' => '40bd001563085fc35165329ea1ff5c5ecbdbbeef'],
    ['login' => 'user2', 'password' => '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'],
    ['login' => 'user3', 'password' => '8cb2237d0679ca88db6464eac60da96345513964'],
];

if (null !== $username || null !== $password) {

    $gues = true;

    foreach ($users as $value) {
        if($username === $value['login'] && $pass === $value['password']){
        
            session_start(); 

            $_SESSION['auth'] = true; 
            $_SESSION['login'] = $username; 

            header ('Location: '.'persArea.php');
        }
        }
    }
$auth = $_SESSION['auth'] ?? null;

    ?>   
    // Введите логин и пароль ! 
        <a href="index.php"> Вернуться на главную</a>
        <article>
    <h3><?php 
    if ($gues) {
       
        echo 'Логин или пароль введены неправильно!';
    }
?> </h3>
</article>
</body>
</html>

