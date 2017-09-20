<?php

namespace App\Http\Controllers;

use App\Mehanicar;
use App\ServisKorisnik;
use App\TerminTemp;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MehanicarController extends Controller
{
    public function index()
    {
        $gradovi = Mehanicar::select('grad')->distinct()->get();

        return view('mehanicar', compact('gradovi'));
    }

    public function getMehanicar($id)
    {
        $mehanicari = Mehanicar::findOrFail($id);

        $servisiMehanicara = ServisKorisnik::join('mechanics', 'services.idMehanicar', '=', 'mechanics.id')
            ->where('idMehanicar', '=', $id)
            ->count();

        $ocjena = ServisKorisnik::join('mechanics', 'services.idMehanicar', '=', 'mechanics.id')
            ->where('idMehanicar', '=', $id)
            ->avg('ocjena');

        return view('mehanicarPretraga', compact('mehanicari', 'servisiMehanicara', 'ocjena'));
    }

    public function harun()
    {
        $cat_id        = Input::get('cat_id');
        $subcategories = Mehanicar::where('grad', '=', $cat_id)->get();

        return response()->json($subcategories);
    }

    public function harun2()
    {
        $cat_id        = Input::get('ajaxResult');
        $subcategories = Mehanicar::where('id', '=', $cat_id)->get();

        return response()->json($subcategories);
    }

    public function pregledServisa($id)
    {
        $idVozila = DB::table('user_cars')->select('id')
            ->where('user_cars.brojMotora', '=', $id)
            ->first();

        $podaciOVozilu = DB::table('services')
            ->where('idUserCars', '=', $idVozila->id)
            ->get();

        $notifikacijeTerminBrojac = TerminTemp::join('mechanics', 'temp_termin.idMehanicar', '=', 'mechanics.id')
            ->join('users', 'temp_termin.idKorisnik', '=', 'users.id')
            ->where('mechanics.nazivFirme', '=', Auth::user()->name)->select('temp_termin.*', 'users.name')->count();

        return view('podaciOVozilu', compact('podaciOVozilu', 'notifikacijeTerminBrojac'));
    }

}
