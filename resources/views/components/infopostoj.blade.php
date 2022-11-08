@if (Session::has('details'))
<section class="alert">
    <h3>Postój</h3><a class="close" href ="{{Session::get('details')}}s"><i class="fa fa-close"></i></a>
    <hr>
    @if(Session::get('stop')->end_date != null)
        <h4>Czas do końca: </h4><div>{{Session::get('stop')->end_date}}</div><br>
    @else
        <h4>Data rozpoczęcia: </h4><div>{{Session::get('stop')->start_date}}</div><br>
        @csrf
        <button class="button" type="submit" onClick="window.location='{{ url("/end_stop/".Session::get('stop')->id)}}'">Zakończ</button><br><br>
    @endif
</section>
@endif
