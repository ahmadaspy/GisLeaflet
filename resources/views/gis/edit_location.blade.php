@extends('templates.home')
@section('title')
    {{ $data->nama_tempat }}
@endsection
@section('costumestyle')
    <style>
    #mapid {
        height: 400px;
        z-index: 0;
    }
    </style>
@endsection
@section('content')
<div class="section">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{ $data->name }}
        </div>
        <div class="card-body">
            <div id="mapid">

            </div>
            <form action="/edit" method="POST">
                {{ csrf_field() }}
                <input type="text" hidden value="{{ $data->id }}" name="id">
                <div class="form-group">
                    <label for="nama_tempat">Nama Tempat</label>
                    <input id="nama_tempat" class="form-control" value="{{ $data->nama_tempat }}" name="nama_tempat">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori_id">
                        @foreach ($data_kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lat">Garis Lintang</label>
                    <input value="{{ $data->lat }}" id="lat" class="form-control" name="lat">
                </div>
                <div class="form-group">
                    <label for="longt">Garis Bujur</label>
                    <input value="{{ $data->longt }}" id="longt" class="form-control" name="longt">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

    </div>
</div>
@endsection
@section('scriptjsleaflet')
    <script>
        var lokasi = {!! json_encode($data->toArray(), JSON_HEX_TAG) !!};

        var center = [lokasi.lat, lokasi.longt ]
        var map = L.map('mapid').setView(center, 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker(center).addTo(map);
        function updateMarker(lat, lng) {
            marker
            .setLatLng([lat, lng])
            .bindPopup("Lokasi ini ?")
            .openPopup();
            return false;
        };

        map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $('#lat').val(latitude);
            $('#longt').val(longitude);
            updateMarker(latitude, longitude);
         });

        var updateMarkerByInputs = function() {
            return updateMarker( $('#lat').val() , $('#longt').val());
        }
        $('#lat').on('input', updateMarkerByInputs);
        $('#longt').on('input', updateMarkerByInputs);



    </script>
@endsection
