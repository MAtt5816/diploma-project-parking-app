<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/logo.png" /><
        title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
    <link rel="stylesheet" href="CSS/forms.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>

        <br><br><section class="container">
            <aside class="body_form">
                <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <h1>Moje pojazdy</h1>
            <hr>
          
    @if (Session::has('cars') && !empty(Session::get('cars')))
    <table class="table">
    <thead>
        <tr>
            <th>
                Numer rejestracyjny
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach (Session::get('cars') as $key=>$car)
        <tr>
            <td id="1">
                {{$car}}</td>         
            <td>
                <a href="Edit"><i class="fa fa-edit"></i> Edytuj</a> |
                <a href="/show_vehicle/{{Session::get('cars_id')[$key]}}"><i class="fa fa-sticky-note-o"></i> Szczegóły</a> |
                <a href="/delete_vehicle/{{Session::get('cars_id')[$key]}}"><i class="fa fa-trash"></i> Usuń</a>
            </td>
        </tr>
        @endforeach
        </tbody>
</table> 
    @else
    <p>Brak pojazdów</p>
    @endif
     
            </aside>
        </section>
    </body>
</html>
