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
        <link rel="stylesheet" href="CSS/settings.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
        <?php
        $user="usertest";
        $section=0;
        ?>
        
        <section class="settings">
            <section class="settings_panel_left">
                <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                <div class="user_logo"><i class="fa fa-user"></i></div>
                <span class="user"><?php echo$user ?></span>
                <hr>
                <for method="post">  
                    <input id='option' name='option' type="submit" value="Konto"/>
                <hr>
                <input id='option' name='option' type="submit" value="1"/>
                <hr>
                </for>
            </section>
            <section class="settings_panel_right">
                <nav class="header"><h1>Ustawienia</h1>
                    <hr></nav>
                <?php
                // TODO
                /* $option=$_REQUEST['option'];
                        switch ($option) {
                            case 'Konto':
                                include'konto.php';
                                break;
                            case '1':
                                
                                break;
                            default:
                                break;
                        }*/
                ?>
            </section>
        </section>
    </body>
</html>
