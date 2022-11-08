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
        <?php
        $array = array("14.11.2022 12:00", "15.11.2022 12:00","16.11.2022 12:00");
        
        ?>
    </head>
    <body>

        <br><br><section class="container">
            <aside class="body_form">
                <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <h1>Postoje</h1>
            <hr>

            @if (Session::has('stops') && !empty(Session::get('stops')))
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
                @foreach (Session::get('stops') as $key=>$stop)
                    <tr>
                        <td id="1">
                            {{$stop}}</td>         
                        <td>
                            <a href="Edit"><i class="fa fa-edit"></i> Edytuj</a> |
                            <a href="/show_stop/{{Session::get('stops_id')[$key]}}"><i class="fa fa-sticky-note-o"></i> Szczegóły</a> |
                            <a href="/info_stop/{{Session::get('stops_id')[$key]}}"><i class="fa fa-car"></i> Postój</a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>  
                @if (Session::has('stop') && !Session::has('mode'))
                    {{view('components.szczegoly');}}
                @endif
                @if (Session::has('mode'))
                    {{view('components.infopostoj');}}
                @endif
            @else
                <p>Brak postojów</p>
            @endif

            </aside>
        </section>
    </body>
    </body>
</html>
