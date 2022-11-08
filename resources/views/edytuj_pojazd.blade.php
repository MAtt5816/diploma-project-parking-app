<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
        <link rel="stylesheet" href="{{asset('CSS/forms.css')}}" type="text/css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
    {{Session::reflash()}}
        <br><br><section class="container">
                <aside class="body_form">
                    <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <h1>Edytuj pojazd</h1>
                <form method="post" action="/update_vehicle">
                    @csrf
                <hr>
                <input type="hidden" name="id" value="{{Session::get('vehicle')->id}}">
                <input type="text" class="form_input" name="registration_plate" placeholder="Numer rejestracyjny" required="true" value="{{Session::get('vehicle')->registration_plate}}"><br>
                <input type="text" class="form_input" name="brand" placeholder="Marka" required="true" value="{{Session::get('vehicle')->brand}}"><br>
                <input type="text" class="form_input" name="model" placeholder="Model" required="true" value="{{Session::get('vehicle')->model}}"><br>
                </aside>
                <hr><input type="submit" class="button" value="Edytuj">
               <input type="reset" class="button" value="Wyczyść"></form>
                </section>
                
    </body>
</html>
