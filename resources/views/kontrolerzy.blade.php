<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" />
        <link rel="shortcut icon" href="img/logo.png" />
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
        <link rel="stylesheet" href="CSS/forms.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>

        <br><br><section class="container">
            <aside class="body_form">
                <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                <h1>Moi kontrolerzy</h1>
                <hr>
                @if ($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
            <div class="alert-success">
                @if(is_array(session('success')))
                    <ul>
                        @foreach (session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ session('success') }}
                @endif
            </div>
            @endif

                @if (Session::has('inspectors_n') && !empty(Session::get('inspectors_n')))
                        <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Imię i nazwisko
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach (Session::get('inspectors_n') as $key=>$inspector)
                    <tr>
                        <td id="1">
                            {{$inspector}} {{Session::get('inspectors_s')[$key]}}</td>         
                        <td>
                            <a href="/edit_inspector/{{Session::get('inspectors_id')[$key]}}"><i class="fa fa-edit"></i> Edytuj</a> |
                            <a href="/show_inspector/{{Session::get('inspectors_id')[$key]}}"><i class="fa fa-sticky-note-o"></i> Szczegóły</a> |
                            <a class="delete" href="/delete_inspector/{{Session::get('inspectors_id')[$key]}}"><i class="fa fa-trash"></i> Usuń</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{view('components.ru_sure');}}
                @else
                <p>Brak kontrolerów</p>
                @endif  
                @if (Session::has('inspector'))
                    {{view('components.szczegoly');}}
                @endif
            </aside>
        </section>
    </body>
</html>
