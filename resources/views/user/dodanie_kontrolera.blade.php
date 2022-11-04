<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
        <link rel="stylesheet" href="../CSS/forms.css" type="text/css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <br><br><section class="container">
                <aside class="body_form">
                    <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <h1>Stwórz kontrolera</h1>
                <form method="post" action="">
                    <h4>Dane konta</h4><hr>
                <input type="text" class="form_input" name="login" placeholder="Login" required="true"><br>
                <input type="password" class="form_input" name="pass" placeholder="Hasło" required="true">
                <input type="password" class="form_input" name="pass" placeholder="Powtórz hasło" required="true"><br>
                <h4>Kod</h4><hr>
                <input type="text" class="form_input" name="kod_operatora" placeholder="Kod_operatora" required="true">
                <br> <hr>
                </aside>
                <input type="submit" class="button" value="Dodaj">
               <input type="reset" class="button" value="Wyczyść"></form>
                </section>
    </body>
</html>
