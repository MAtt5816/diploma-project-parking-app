        @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif{{-- TODO error codes --}}
<section class="include">                 
                <h3>Zmiana hasła</h3>

                <form method="post" action="/change_password">
                    @csrf
                    <input type="password" name="old_password" placeholder="Stare hasło" required="true"><br>
                    <input type="password" name="new_password" placeholder="Nowe hasło" required="true"><br>
                    <input type="password" name="new_password_confirmation" placeholder="Powtórz hasło" required="true"><br>
                    <input type="submit" class="button" value="Zmień">
                    
                </form>

        </section>
