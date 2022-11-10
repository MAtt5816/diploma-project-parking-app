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
        <br><br><section class="container">
                <aside class="body_form">
                    <a class="return" href="/signup"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <h1>Edytuj kontrolera</h1>
                <form method="post" action="/update_inspector">
                    @csrf
                    <h4>Dane kontrolera</h4><hr>
                    {{Session::reflash()}}
                    <input type="hidden" name="id" value="{{Session::get('inspector')->id}}">
                    <input type="text" class="form_input" name="name" placeholder="Imię" pattern="[A-Za-ząćęłńóśźżŁŻŚŹĆÓ ]{1,20}$" title="Użyj max. 20 liter" value="{{Session::get('inspector')->name}}" required="true">
                <input type="text" class="form_input" name="surname" placeholder="Nazwisko" pattern="[A-Za-ząćęłńóśźżŁŻŚŹĆÓ -]{1,25}$" title="Użyj max. 25 liter" value="{{Session::get('inspector')->surname}}"  required="true"><br>
                <br> <hr>
                </aside>
                <input type="submit" class="button" value="Edytuj">
               <input type="reset" class="button" value="Wyczyść"></form>
                </section>
    </body>
</html>