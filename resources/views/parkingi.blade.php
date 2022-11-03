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
        $array = array("Politechnika", "Pod zamkiem","Arena Lublin");
        ?>
    </head>
    <body>

        <br><br><section class="container">
            <aside class="body_form">
                <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <h1>Moje parkingi</h1>
            <hr>
          <table class="table">
    <thead>
        <tr>
            <th>
                Nazwa
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($array as $name) {
        echo'<tr>
            <td id="1">
                '.$name.'</td>         
            <td>
                <a href="Edit"><i class="fa fa-edit"></i> Edytuj</a> |
                <a href="Details"><i class="fa fa-sticky-note-o"></i> Szczegóły</a> |
                <a href="Delete"><i class="fa fa-trash"></i> Usuń</a>
            </td>
        </tr>';
}
?>
    </tbody>
</table>  
            </aside>
        </section>

    </body>
</html>
