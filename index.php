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


//var_dump($_SESSION);
?>
<head>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<style>
    #my_td {
        text-align: right;
        padding-right: 2%;
    }


</style>
<h1 align="center">REGISTRATION</h1>


            <form  class="form-horizontal" action="/form.php" method="post">
<!--                <div class="control-group">-->
                        <label class="control-label" for="login">LOGIN</label>
<!--                         <div class="controls">-->
                        <input class="" id="login" type="text" name="login" placeholder="login" required
                               value="<?= !empty($_SESSION['login']) ? $_SESSION['login'] : ''; ?>"/>
<!--                             </div>-->
                        <?php
                        if (!empty($_SESSION['error']['login'])) {
                            echo '<span style="color:red;">' . $_SESSION['error']['login'] . '</span>';
                        }
                        ?>
<!--                </div>-->
                <div class="control-group">
                        <label class="control-label" for="email">EMAIL</label>
                        <input class="" id="email" type="email" name="email" placeholder="email" required
                               value="<?= !empty($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"/>
                        <?php
                        if (!empty($_SESSION['error']['email'])) {
                            echo '<span style="color:red;">' . $_SESSION['error']['email'] . '</span>';
                        }
                        ?>
                </div>
                <div class="control-group">
                        <label class="control-label" for="tel">TELEPHONE</label>
                        <input class="" id="tel" type="text" name="tel" placeholder="telephone" required
                               value="<?= !empty($_SESSION['tel']) ? $_SESSION['tel'] : ''; ?>"/>
                        <?php
                        if (!empty($_SESSION['error']['tel'])) {
                            echo '<span style="color:red;">' . $_SESSION['error']['tel'] . '</span>';
                        }
                        ?>
                </div>
                <div class="control-group">
                        <label class="control-label" for="password"> PASSWORD</label>
                        <input class="" id="password" type="password" name="password" placeholder="password"
                               required
                               value="<?= !empty($_SESSION['password']) ? $_SESSION['password'] : ''; ?>"/>
                        <?php
                        if (!empty($_SESSION['error']['password'])) {
                            echo '<span style="color:red;">' . $_SESSION['error']['password'] . '</span>';
                        }
                        ?>
                </div>
                <div class="control-group">
                        <label class="control-label" for="password2">RE PASSWORD</label>
                        <input class="" id="password2" type="password" name="password2"
                               placeholder="re password" required
                               value="<?= !empty($_SESSION['password2']) ? $_SESSION['password2'] : ''; ?>"/>
                </div>
                        <input id="my_s" class="btn  btn-success " type="submit" value="SEND"/><br/>

            </form>

