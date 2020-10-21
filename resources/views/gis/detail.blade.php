@extends('templates.home')
@section('title')
    Detail {{ $data->nama_tempat }}
@endsection
@section('costumestyle')
<style>
    .carousel-item img {
        object-fit: cover;
        width: 50px;
        height: 340px;
    }
  </style>
@endsection
@section('content')
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ url('storage/'.$data->detail->gambar_1) }}" class="d-block w-100" alt="ini gambar">
              </div>
              <div class="carousel-item">
                <img src="{{ url('storage/'.$data->detail->gambar_2) }}" class="d-block w-100" alt="ini gambar">
              </div>
              <div class="carousel-item">
                <img src="{{ url('storage/'.$data->detail->gambar_3) }}" class="d-block w-100" alt="ini gambar">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="card">
              <div class="card-body">
                <div class="card-title">
                    <h3>{{ $data->nama_tempat }}</h3>
                </div>
                <p>
                    @if(isset($data->detail->link_video))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $data->detail->link_video }}" allowfullscreen></iframe>
                        </div>
                    @endif
                    {{ $data->detail->deskripsi }}
                </p>
              </div>
          </div>
    </div>
@endsection
