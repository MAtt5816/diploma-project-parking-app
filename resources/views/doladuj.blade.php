<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
         <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
        <link rel="stylesheet" href="CSS/forms.css" type="text/css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
        <br><br><section class="container">
                <aside class="body_form">
                    <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <h1>Doładuj portfel</h1>
                <form method="post" action="">
                <hr>
                <aside class="cash">
                    <?php
                    if(false){
                 echo'   
                <input type="radio" id="value1" name="money" value="10zł">
                <label for="value1"><span>10 zł</span></label>
                <input type="radio" id="value2" name="money" value="25zł">
                <label for="value2"><span>25 zł</span></label>
                <input type="radio" id="value3" name="money" value="50zł">
                <label for="value3"><span>50 zł</span></label>
                <input type="radio" id="value4" name="money" value="100zł">
                <label for="value4"><span>100 zł</span></label>
                <input type="radio" id="value5" name="money" value="inna" onClick="">
                <label for="value5"><span>inna</span></label>';
                    }
                    else{
                echo'<div class="other"><span>Inne: </span><input type="text" name="" /><span>zł</span></div>';
                    }
                        ?>
                        </aside>
                </aside>
                <hr><input type="submit" class="button" value="Doładuj">
               <input type="reset" class="button" value="Anuluj"></form>
                </section>
    </body>
</html>
