<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../img/logo.png" />
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
      <link rel="stylesheet" href="../CSS/forms.css" type="text/css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
        <?php
        echo'<br><br><section class="container">'
                .'<aside class="body_form">'
                . '<a class="return" href="/signup"><i class="fa fa-angle-left" aria-hidden="true"></i></a>'
                . '<h1>Rejestracja</h1>'
                .'<form method="post" action="">'
                .'<h4>Dane osobowe</h4><hr>'
                .'<input type="text" class="form_input" name="name" placeholder="Imię" required="true">'
                .'<input type="text" class="form_input" name="surname" placeholder="Nazwisko" required="true"><br>'
                .'<input type="text" class="form_input" name="login" placeholder="Login" required="true"><br>'
                .'<input type="text" class="form_input" name="tel" placeholder="Numer telefonu" required="true" pattern="[0-9]{9}"><br>'
                .'<h4>Dane konta</h4><hr>'
                .'<input type="email" class="form_input" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br>'
                .'<input type="password" class="form_input" name="password" placeholder="Hasło(min. 6 znaków)" required="true" pattern=".{6,}">'
                .'<input type="password" class="form_input" name="password2" placeholder="Powtórz hasło" required="true" pattern=".{6,}"><br>'
                .'<h4>Dane adresowe</h4><hr>'
                .'<input type="text" class="form_input" name="address" placeholder="Kod pocztowy" required="true">'
                .'<input type="text" class="form_input" name="city" placeholder="Miejscowość" required="true"><br>'
                .'<input type="text" class="form_input" name="street" placeholder="Ulica" required="true">'
                .'<input type="text" class="form_input" name="home_nr" placeholder="Numer domu" required="true"><br></aside>'
                .'<hr><input type="submit" class="button" value="Zarejestruj">'
                .'<input type="reset" class="button" value="Anuluj"></form>'
                .'</section>'
                
        ?>
    </body>
</html>