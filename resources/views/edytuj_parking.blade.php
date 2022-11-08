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
        <link rel="stylesheet" href="{{asset('CSS/style.css')}}" type="text/css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin="">
        </script>
    </head>
    <body>
        {{Session::reflash()}}
        <br><br><section class="container">
                <aside class="body_form">
                   <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a> 
                    <h1>Edytuj parking</h1>
                <form method="post" action="/update_parking">
                    @csrf
                <hr>
                <input type="hidden" name="id" value="{{Session::get('parking')->id}}">
                <input type="text" class="form_input" name="name" placeholder="Nazwa" required="true" value="{{Session::get('parking')->name}}"><br>
                <input type="number" class="form_input" name="price" placeholder="Cena" min="0" step="0.01" required="true" value="{{Session::get('parking')->price}}"><br>
                <input type="hidden" class="form_input" id="location" name="location" placeholder="Lokalizacja" value="" required="true" value="{{Session::get('parking')->location}}">
                <input type="text" class="form_input" name="opening_hours" placeholder="Godziny otwarcia" required="true" value="{{Session::get('parking')->opening_hours}}"><br>
                <input type="text" class="form_input" name="additional_services" placeholder="Dodatkowe usługi" required="true" value="{{Session::get('parking')->additional_services}}"><br>
                <input type="text" class="form_input" name="facilities" placeholder="Udogodnienia" required="true" value="{{Session::get('parking')->facilities}}"><br>
                <div id="map" class="mapForm"></div>
                </aside>
                <hr><input type="submit" class="button" value="Dodaj">
               <input type="reset" class="button" value="Wyczyść"></form>
                </section>

                {{view('components.map-one-pin-select');}}
    </body>
</html>
