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
    </head>
    <body>
        <?php
        $array = array("LBI54915", "LU4519","LLB84A61")
        ?>
        <br><br><section class="container">
                <aside class="body_form">
                    <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <h1>Zarezerwuj miejsce parkingowe</h1>
                <form method="post" action="">
                <hr>
                <label> Data rozpoczęcia<span class="required">* </span>  </label>
                <input type="datetime-local" class="form_input" name="start" required="true"><br>
                <label> Data zakończenia<span class="required">* </span>  </label>
                <input type="datetime-local" class="form_input" name="end" required="true"><br>
                <label>Wybierz pojazd <span class="required">* </span> </label>
                <div class ="select">
                <select test="">
                    <option selected>   </option>
                    <?php
                    // TODO
                    foreach($array as $item){
                        echo'<option>'.$item.'</option>';
                    }
                    ?>
                    </select>
                </div>
                </aside>
                <hr><input type="submit" class="button" value="Dodaj">
               <input type="reset" class="button" value="Wyczyść"></form>
                </section>
    </body>
</html>
