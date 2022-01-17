<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeAsetModel;
use App\Models\DivisiModel;
use App\Models\TindakanAsetModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipe_aset = TipeAsetModel::count();
        $divisi = DivisiModel::count();
        $tindakan_aset = TindakanAsetModel::count();

        return view('home', \compact('tipe_aset', 'divisi', 'tindakan_aset'));
    }
}
