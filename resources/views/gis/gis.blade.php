@extends('templates.home')
@section('title')
    Map
@endsection
@section('costumestyle')
    <style>
        #mapid {
            height: 500px;
        }
    </style>
@stop
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">MAP</h6>
        </div>
        <div class="card-body">
            <div id='mapid'>

            </div>
            {{-- form filter di map untuk menapilkan sesuai yg dipilih --}}
            <form>
                <div class="form-group mt-4">
                    <select name="filter" class="form-control">
                            <option value="" disabled selected>Pilih Kategori</option>
                        {{-- perulangan memuat kategori yg ada --}}
                        @foreach ($data_filter_option as $item)
                            <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('scriptjsleaflet')
    <script>
        // mem passing variable dari database compact ke $data dan konversi ke json array
        var lokasi = {!! json_encode($data->toArray(), JSON_HEX_TAG) !!};

        var map = L.map('mapid').setView([-3.325548, 114.623500], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // perulangan untuk menampilkan semua data pada map
        var i = 0;
        for (i; i<lokasi.length;i++){
            //membuat link detail var i sebagai index
            var detail = "<a href = '/detail/" + i + "' > Detail </a>";
            //memasukan variabel lokasi ke dalam map
            L.marker([lokasi[i].lat, lokasi[i].longt]).addTo(map)
            .bindPopup(lokasi[i].nama_tempat + " " + detail)
            .openPopup();

        }

    </script>
@stop
