<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        return view('Barang.barangIndex');
    }

    public function add() {
        return view('Barang.barangForm');
    }

    public function save(Request $request) {}
}
