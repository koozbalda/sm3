<?php
session_start();
//session_destroy();
//exit();
/**
 * Created by PhpStorm.
 * User: Kooz
 * Date: 01.02.2018
 * Time: 18:31
 */


/**
 * @param $name
 * check input name on our rules
 * @return bool
 */
function forName($name)
{
    $code = 'utf-8';
    $name = trim($name);
    $arr = explode(' ', $name);
    if (count($arr) > 1) {
        $_SESSION['error']['login'] = "Поле Имя введено неверно. Допустимо только одно слово";
        return false;
    }
    if (mb_strlen($name, $code) < 3 || mb_strlen($name, $code) > 15) {
        $_SESSION['error']['login'] = "Поле Имя введено неверно, длинна должна быть больше 3х символов и менее 15";
        return false;
    }
    if (!empty($_SESSION['registered']['login'])) {
        $arr = $_SESSION['registered']['login'];
        foreach ($arr as $value) {
            if ($value == $name) {
                $_SESSION['error']['login'] = "Поле Имя должно быть уникальным";
                return false;
            }
        }
    }

    return true;
}


/**
 * @param $email
 * @return bool
 */
function forEmail($email)
{
    $email = trim($email);
    $arr = explode(' ', $email);
    if (strlen($email) < 6 || (count($arr) > 1)) {
        $_SESSION['error']['email'] = "Поле Email введено неверно";
        return false;
    }

    if (!empty($_SESSION['registered']['email'])) {
        $arr = $_SESSION['registered']['email'];
        foreach ($arr as $value) {
            if ($value == $email) {
                $_SESSION['error']['email'] = "Поле email должно быть уникальным";
                return false;
            }
        }
    }


    $arr = explode('@', $email);

    if (count($arr) <= 1) {
        $_SESSION['error']['email'] = "Поле email должно содержать @";
        return false;

    }elseif(count($arr) !=2 ) {
        $_SESSION['error']['email'] = "Поле email заполнено не верно";
        return false;
    }
    return true;

}

/**
 * @param $tel
 * @return bool
 */
function forTel($tel)
{
    if (mb_strlen($tel) < 5) {
        $_SESSION['error']['tel'] = "Слишком короткий номер";
        return false;
    }

    for ($i = 0; $i < mb_strlen($tel); $i++) {
//        var_dump($i);
//        echo' - ';
//        var_dump(mb_strlen($tel));
//        echo'<br>';
//        var_dump($tel[$i]);
//        echo'<br>';
        if (!is_numeric($tel[$i])) {
            $_SESSION['error']['tel'] = "Допускаются только цифры";
            return false;
        }
    }
    return true;
}


/**
 * @param $pswd
 * @return bool
 */
function pswd($pswd)
{
    if(empty($_POST['password2'])){
        $_SESSION['error']['password'] = "Поле пароль2 не заданно";
        return false;
    }else{
        $pswd2=$_POST['password2'];
    }
    //8 и более символов
    if (mb_strlen($pswd) < 7) {
        $_SESSION['error']['password'] = "Поле пароль должно содержать не менее 8 символов ";
        return false;
    }
    // равны между собой
    if (strcmp($pswd, $pswd2) != 0) {
        $_SESSION['error']['password'] = "Пароли не совпадают";
        return false;
    }
    // без пробелов
    $arr = explode(' ', $pswd);
    if (count($arr) != 1) {
        $_SESSION['error']['password'] = "Пробелы запрещены";
        return false;
    }
    return true;
}

//Function from send correct data or error message in session
function session_prepared($index,$bool){
    if (!empty($_POST[$index]) && $bool) {
        $_SESSION[$index] = $_POST[$index];
        unset($_SESSION['error'][$index]);
    } else {
        unset($_SESSION[$index]);
    }

}


//part 1 check name
session_prepared('login',forName($_POST['login']));

//part 2 check email
session_prepared('email',forEmail($_POST['email']));

//part 3 check tel
session_prepared('tel',forTel($_POST['tel']));

//part 4 check pswd
session_prepared('tel',pswd($_POST['password']));

//if no error, we save email and login in session
if (count($_SESSION['error']) == 0) {
    $_SESSION['registered']['email'][] = $_SESSION['email'];
    $_SESSION['registered']['login'][] = $_SESSION['login'];
}

//var_dump($_SESSION);
header('Location: /index.php');
exit();
?>

<!--<br>-->
<!--<br>-->
<!--<br>-->
<!--<br>-->
<!--<a href="index.php">back</a>>-->

















