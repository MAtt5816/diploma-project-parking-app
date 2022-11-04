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
        <link rel="stylesheet" href="CSS/style.css" type="text/css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin="">
        </script>
    </head>
    <body>
        <?php
       $array = array("LBI54915", "LU4519","LLB84A61")
        ?>
        <br><br><section class="container">
                <aside class="body_form">
                    <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <h1>Dodaj postój</h1>
                <form method="post" action="/stop">
                    @csrf
                <hr>
                <label> Data rozpoczęcia<span class="required">*</span> </label>
                <input type="datetime-local" class="form_input" name="start_date" required="true"><br>
                <label> Data zakończenia<span class="required">*</span> </label>
                <input type="datetime-local" class="form_input" name="end_date" required="true"><br>

                @if (Session::has('cars'))
                    <label>Wybierz pojazd <span class="required">* </span> </label>
                        <div class ="select">
                        <select test="" name="vehicle_id">
                        @foreach (Session::get('cars') as $key=>$car)
                            <option value="{{Session::get('cars_id')[$key]}}">{{$car}}</option>
                        @endforeach
                        </select>
                                </div>
                    @else
                    <p>Brak pojazdów</p>
                    @endif
                    <br />
                    @if (Session::has('parkings'))
                    <label>Wybierz parking <span class="required">* </span> </label>
                        <div class ="select">
                        <select test="" id="parking" name="parking_id" hidden>
                        @foreach (Session::get('parkings') as $key=>$parking)
                            <option value="{{Session::get('parkings_id')[$key]}}">{{$parking}}</option>
                        @endforeach
                        </select>
                                </div>
                    @else
                    <p>Brak parkingów</p>
                    @endif
                    <div id="map" class="mapForm"></div>
                </aside>
                <hr><input type="submit" class="button" value="Dodaj">
               <input type="reset" class="button" value="Wyczyść"></form>
                </section>

                {{view('components.map-select');}}
    </body>
</html>
