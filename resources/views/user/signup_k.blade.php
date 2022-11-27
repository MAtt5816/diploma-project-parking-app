<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
    <meta name="viewport" content="width=device-width" />
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../img/logo.png" />
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
      <link rel="stylesheet" href="../CSS/forms.css" type="text/css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
        <br><br><section class="container">
                <aside class="body_form">
                <a class="return" href="/signup"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                <h1>Rejestracja</h1>
                <form method="post" action="/signup_driver">
                @csrf

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

                <input type="hidden" name="user_type" value="driver">
                <h4>Dane osobowe</h4><hr>
                <input type="text" class="form_input" name="name" placeholder="Imię" pattern="[A-Za-ząćęłńóśźżŁŻŚŹĆÓ ]{1,20}$" title="Użyj max. 20 liter" required="true">
                <input type="text" class="form_input" name="surname" placeholder="Nazwisko" pattern="[A-Za-ząćęłńóśźżŁŻŚŹĆÓ -]{1,25}$" title="Użyj max. 25 liter"  required="true"><br>
                <input type="text" class="form_input" name="login" placeholder="Login" title="Użyj max. 15 liter, cyfr lub znaków ._%+-" pattern="[A-Za-ząćęłńóśźżŁŻŚŹĆÓ0-9._%+-]{1,15}$" required="true"><br>
                <input type="text" class="form_input" name="phone" placeholder="Numer telefonu" required="true" pattern="[0-9]{1,11}"><br>
                <h4>Dane konta</h4><hr>
                <input type="email" class="form_input" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" maxlength="30"><br>
                <input type="password" class="form_input" name="password" placeholder="Hasło" required="true" title="Podaj 8-50 znaków" pattern=".{8,50}">
                <input type="password" class="form_input" name="password_confirmation" placeholder="Powtórz hasło" required="true" pattern=".{8,50}"><br>
                <h4>Dane adresowe</h4><hr>
                <input type="text" class="form_input" name="postal_code" placeholder="Kod pocztowy" maxlength="6" required="true">
                <input type="text" class="form_input" name="city" placeholder="Miejscowość" pattern="[A-Za-ząćęłńóśźżŁŻŚŹĆÓ -]{1,30}$" title="Użyj max. 30 liter" required="true"><br>
                <input type="text" class="form_input" name="street" placeholder="Ulica" pattern="[A-Za-ząćęłńóśźżŁŻŚŹĆÓ -]{1,25}$" title="Użyj max. 25 liter" required="true">
                <input type="text" class="form_input" name="house_number" placeholder="Numer domu" pattern="[A-Za-z0-9 -.\/]{1,6}$" title="Użyj max. 6 liter lub cyfr" required="true"><br></aside>
                <hr><input type="submit" class="button" value="Zarejestruj">
                <input type="reset" class="button" value="Wyczyść"></form>
                </section>       
    </body>
</html>
