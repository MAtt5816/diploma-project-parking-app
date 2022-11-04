<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <link rel="shortcut icon" href="img/logo.png" />
        <link rel="shortcut icon" href="img/logo.png" />
        <meta charset="UTF-8">
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
        <<link rel="stylesheet" href="CSS/forms.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
        <br><br><section class="container">
        @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif{{-- TODO --}}
            <aside class="body_form">
                <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                <h1>Zmiana hasła</h1>
                <hr>
                <form method="post" action="/change_password">
                    @csrf
                    <input type="password" name="old_password" placeholder="Stare hasło" required="true"><br>
                    <input type="password" name="new_password" placeholder="Nowe hasło" required="true"><br>
                    <input type="password" name="new_password_confirmation" placeholder="Powtórz hasło" required="true"><br>
                    <input type="submit" class="button" value="Zmień">
                    <input type="reset" class="button" value="Wyczyść">
                </form>
                
            </aside>
        </section>
    </body>
</html>
