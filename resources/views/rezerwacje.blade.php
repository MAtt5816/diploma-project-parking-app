<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/logo.png" />
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
    <link rel="stylesheet" href="CSS/forms.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>

        <br><br><section class="container">
            <aside class="body_form">
                <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <h1>Rezerwacje</h1>
            <hr>

            @if (Session::has('reservations') && !empty(Session::get('reservations')))
            <table class="table">
            <thead>
                <tr>
                    <th>
                        Data
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach (Session::get('reservations') as $key=>$reservation)
            <tr>
                <td id="1">
                    {{$reservation}}</td>         
                <td>
                    <a href="Edit"><i class="fa fa-edit"></i> Edytuj</a> |
                    <a href="Details"><i class="fa fa-sticky-note-o"></i> Szczegóły</a> |
                    <a href="/delete_reservation/{{Session::get('reservations_id')[$key]}}"><i class="fa fa-trash"></i> Usuń</a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>  
            @else
            <p>Brak rezerwacji</p>
            @endif

            </aside>
        </section>
    </body>
</html>
