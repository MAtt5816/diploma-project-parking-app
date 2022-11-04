<script>
    var map = L.map('map').setView([51.2482, 22.5703], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    @if(Session::has('locations'))
    @foreach(Session::get('locations') as $key=>$location)
        var marker = L.marker([{{$location}}]).addTo(map);
        marker.bindPopup("{{Session::get('parkings')[$key]}}");
    @endforeach
    @endif
</script>