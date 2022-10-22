@extends('Layout.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/Layout/master.css') }}">
@endsection
@section('content')
    <div class="card text-middle">
      <div class="card-body">
        <h4 class="card-title"><i class="fas fa-car"></i>&nbsp;Jadwal Belajar <a name="" id="" class="btn btn-primary float-right" href="{{route('home')}}" role="button">Kembali</a></h4>
        <div class="row text-center mt-3">
            <div class="col-sm">
                <table class="table table-striped table-inverse">
                    <thead class="bg-secondary">
                        <tr>
                            <th>Hari</th>
                            <th>Durasi Belajar</th>
                            <th>Kendaraan</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Senin</td>
                                <td>30 Menit</td>
                                <td>Civic</td>
                            </tr>
                            <tr>
                                <td scope="row">Rabu</td>
                                <td>45 Menit</td>
                                <td>Avanza</td>
                            </tr>
                            <tr>
                                <td scope="row">Jumat</td>
                                <td>20 Menit</td>
                                <td>Ferari</td>
                            </tr>
                            <tr>
                                <td scope="row">Sabtu-Minggu</td>
                                <td>5 Menit</td>
                                <td>Limo</td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
@endsection