<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <link rel="shortcut icon" href="img/logo.png" />
        <meta charset="UTF-8">
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
        <link rel="stylesheet" href="CSS/forms.css" type="text/css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
      <?php
        if(isset($_POST['user'])){
    $user = $_POST['user'];
    $user1 = "kierowca";
    $user2 = "operator";
    if($user == $user1)
    header("Location: user/signup_k.php");
    if($user == $user2)
        header("Location: user/signup_o.php");
}
        ?>
    </head>
    <body>
        
        <br><br><section class="container">
            <div class="reurn_block"><a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a></div>
            <nav class="header">
                <h2>Tworzenie konta</h2>
                <p> Wybierz typ użytkownika</p></nav>
        <br/><form method="post"><div class="user_type">
        @csrf
                <input type="radio" id="register_driver" name="user" value="kierowca" checked><label for="register_driver">
        <div class="title">Kierowca</div>
        <div class="description">Jestem kierowcą</div></label><br/>
        <input type="radio" id="register_operator" name="user" value="operator"><label for="register_operator">
        <div class="title">Operator</div>
        <div class="description">Posiadam parking dla samochodów</div></label>
        <br/><input type="submit" value="Kontynuuj"/>
            </div></form></section>
        
    </body>
</html>
