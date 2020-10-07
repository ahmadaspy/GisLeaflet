@extends('templates.home')
@section('title')
    Input Data
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
    <div class="container">
        @if(session()->has('sukses'))
            <div class="alert alert-success">
                {{ session()->get('sukses') }}
            </div>
        @elseif(session()->has('gagal'))
            <div class="alert alert-danger">
                {{ session()->get('gagal') }}
            </div>
        @endif
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input</h6>
        </div>
        <div class="card-body">
            <div id='mapid'>

            </div>
            <div class="container">
                <form action="input_data" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_tempat">Nama Tempat</label>
                        <input type="text" id="nama_tempat" class="form-control" name="nama_tempat" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori_id" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($data_kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="lat">Garis Lintang</label>
                            <div class="form-group">
                                <input type="text" name="lat" id="lat" class="form-control" id="lat" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="longt">Garis Bujur</label>
                                <input type="text" name="longt" id="longt" class="form-control" id="longt" value="" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>

        </div>

    </div>

@endsection
@section('scriptjsleaflet')
    <script>
        var center = [-3.323990, 114.593584 ]
        var map = L.map('mapid').setView(center, 5);

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

        map.locate({setView: true, maxZoom: 12});

    </script>
@endsection
