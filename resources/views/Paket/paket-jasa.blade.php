@extends('Layout.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/Layout/master.css') }}">
@endsection
@section('content')
    <div class="card text-middle">
      <div class="card-body">
        <h4 class="card-title"><i class="fas fa-book"></i>&nbsp;Paket Jasa <a name="" id="" class="btn btn-primary float-right" href="{{route('home')}}" role="button">Kembali</a></h4>
        <div class="row text-center mt-5">
            <div class="col-sm mt-5">
                <div class="card text-white bg-light">
                  <div class="card-body">
                    <h2 class="card-title text-dark">Rp. 3.000.000</h2>
                    <div class="text-dark">
                        <h5 style="text-decoration: line-through;">Mobil Custom</h5>
                        <h5>3x Ulang Kursus</h5>
                        <h5>Free Jasa Buat SIM</h5>
                    </div>
                    <a href="" class="btn btn-dark container-fluid">Pesan Sekarang!</a></p>
                  </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card text-white bg-danger">
                  <div class="card-body">
                    <h1 class="card-title">Rp. 5.000.000</h1>
                    <h3>Mobil Custom</h3>
                    <h3>5x Ulang Kursus</h3>
                    <h3>Free Jasa Buat SIM</h3>
                    <a href="" class="btn btn-warning container-fluid">Pesan Sekarang!</a></p>
                  </div>
                </div>
            </div>
            <div class="col-sm mt-5">
                <div class="card text-white bg-light">
                  <div class="card-body">
                    <h2 class="card-title text-dark">Rp. 2.000.000</h2>
                    <div class="text-dark">
                        <h5 style="text-decoration: line-through;">Mobil Custom</h5>
                        <h5>1x Ulang Kursus</h5>
                        <h5 style="text-decoration: line-through;">Free Jasa Buat SIM</h5>
                    </div>
                    <a href="" class="btn btn-dark container-fluid">Pesan Sekarang!</a></p>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection