<script>
    var map = L.map('map').setView([51.2482, 22.5703], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    @if(Session::has('locations'))
    @foreach(Session::get('locations') as $key=>$location)
        var marker = L.marker([{{$location}}]).on('click', onClick).addTo(map);
        marker.bindPopup("{{Session::get('parkings_id')[$key]}}| {{Session::get('parkings')[$key]}}");
    @endforeach
    @endif

    function onClick (e) {
        console.log(e.latlng.lat);
        document.getElementById("parking").value = e.target.getPopup().getContent().split('|')[0];
    };
</script>