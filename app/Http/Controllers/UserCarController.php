<?php

namespace App\Http\Controllers;

use App\KorisnikAuto;
use App\ServisKorisnik;
use App\Termin;
use App\TerminTemp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserCarController extends Controller
{
    public function getCars()
    {
        $auta = KorisnikAuto::select('proizvodjac', 'model', 'brojMotora', 'snaga', 'brojVrata',
            'vrstaMotora', 'kubikaza', 'slika', 'boja')
            ->where('user_cars.idUsers', '=', Auth::user()->id)
            ->get();

        $servisi = ServisKorisnik::join('mechanics', 'services.idMehanicar', '=', 'mechanics.id')
            ->join('user_cars', 'services.idUserCars', '=', 'user_cars.id')
        /*->join('car_models', 'user_cars.idModel', '=', 'car_models.id')*/
        /*->join('car_manufacturers', 'user_cars.idManufacturer', '=', 'car_manufacturers.id')*/
            ->where('user_cars.idUsers', '=', Auth::user()->id)
            ->select('mechanics.nazivFirme',
                'user_cars.model', 'user_cars.proizvodjac', 'services.*')
            ->get();

        $notifikacijeTermin = DB::table('termin')->join('mechanics', 'termin.idMehanicar', '=', 'mechanics.id')
            ->select('mechanics.nazivFirme', 'termin.startTime', 'termin.end', 'termin.idMehanicar')
            ->get();

        $notifikacijeTerminBrojac = TerminTemp::join('mechanics', 'temp_termin.idMehanicar', '=', 'mechanics.id')
            ->join('users', 'temp_termin.idKorisnik', '=', 'users.id')
            ->where('mechanics.nazivFirme', '=', Auth::user()->name)->select('temp_termin.*', 'users.name')->count();

        $brojServisa = $servisi->count();
        $brojAuta    = $auta->count();
        $korisnik    = Auth::user();
        $vozila      = DB::table('make')->select('id', 'title')->get();
        $zaKalendar  = null;

        if (1 == $korisnik->isMechanic) {
            $zaKalendar = Termin::join('mechanics', 'termin.idMehanicar', '=', 'mechanics.id')
                ->join('users', 'termin.idKorisnik', '=', 'users.id')
                ->where('mechanics.nazivFirme', '=', Auth::user()->name)->select('termin.*', 'users.name')->get();
        }

        return view('home', compact('auta', 'servisi', 'brojServisa', 'brojAuta', 'korisnik', 'vozila', 'zaKalendar', 'notifikacijeTermin', 'notifikacijeTerminBrojac'));
    }

    public function getRating($id)
    {
        $servisi = ServisKorisnik::find($id);
        $data    = Input::get('unos');
        if (null != $data || 0 == $data) {
            $servisi->ocjena = $data;
            $servisi->save();
        }
        return Redirect::to('home');
    }

    public function izmjenaPodataka($id)
    {

        $korisnik = Auth::user();
        if (strcmp(Input::get('inputPassword'), Input::get('inputRepeatPassword')) == 0) {
            $korisnik->password = bcrypt(Input::get('inputPassword'));

            $korisnik->save();
            flash('Lozinka je uspješno prommijenjena.', 'success');
            return Redirect::to('home');
        } else {
            flash('Greška! Lozinka nije promijenjena. Provjerite da li ste dva puta ukucali istu lozinku.', 'danger');
            return Redirect::to('home');
        }
    }

    public function getKorisnik()
    {
        $korisnik = Auth::user();
        return $korisnik;
    }

    public function prikaziVozila()
    {
        $proizvodjac = Input::get('proizvodjac');

        $model = DB::table('model')->join('make', 'model.make_id', '=', 'make.id')
            ->where('make.title', '=', $proizvodjac)
            ->select('model.title')
            ->get();

        return response()->json($model);
    }

    public function unesiVozilo2()
    {
        $proizvodjac = Input::get('proizvodjac');
        $model       = Input::get('model');
        $brojMotora  = Input::get('brojMotora');
        $snaga       = Input::get('snaga');
        $brojVrata   = Input::get('brojVrata');
        $vrstaMotora = Input::get('vrstaMotora');
        $kubikaza    = Input::get('kubikaza');
        $boja        = Input::get('boja');

        $file            = Input::file('slika');
        $destinationPath = 'C:\wamp64\www\EmirDiplomski\public\slike';
        $extension       = Input::file('slika')->getClientOriginalExtension();
        $fileName        = rand(11111, 99999) . '.' . $extension;
        Input::file('slika')->move($destinationPath, $fileName);

        $auto              = new KorisnikAuto;
        $auto->proizvodjac = $proizvodjac;
        $auto->model       = $model;
        $auto->idUsers     = Auth::user()->id;
        $auto->brojMotora  = $brojMotora;
        $auto->snaga       = $snaga;
        $auto->brojVrata   = $brojVrata;
        $auto->vrstaMotora = $vrstaMotora;
        $auto->kubikaza    = $kubikaza;
        $auto->boja        = $boja;
        $auto->slika       = $fileName;
        $auto->save();

        return redirect('home');
    }

    public function pretragaAuto()
    {
        $pretragaAuto = DB::table('user_cars')->select('*')->where('brojMotora', '=', Input::get('q'))->get();

        $notifikacijeTerminBrojac = TerminTemp::join('mechanics', 'temp_termin.idMehanicar', '=', 'mechanics.id')
            ->join('users', 'temp_termin.idKorisnik', '=', 'users.id')
            ->where('mechanics.nazivFirme', '=', Auth::user()->name)->select('temp_termin.*', 'users.name')->count();

        return view('pretragaAuto', compact('pretragaAuto', 'notifikacijeTerminBrojac'));
    }

    public function unosServisa(int $id)
    {

        $notifikacijeTerminBrojac = TerminTemp::join('mechanics', 'temp_termin.idMehanicar', '=', 'mechanics.id')
            ->join('users', 'temp_termin.idKorisnik', '=', 'users.id')
            ->where('mechanics.nazivFirme', '=', Auth::user()->name)->select('temp_termin.*', 'users.name')->count();

        return view('unosServisa', compact('notifikacijeTerminBrojac', 'id'));
    }

    public function unosServisa2()
    {
        $ime         = Input::get('ime');
        $servis      = implode(", ", $ime);
        $idUserCars  = Input::get('id');
        $idMehanicar = DB::table('mechanics')->select('id')->where('nazivFirme', '=', Auth::user()->name)->get();

        $dijagnozaKvara = Input::get('dijagnoza');
        $kilometraza    = Input::get('kilometraza');
        $ostalo         = Input::get('ostalo');

        $services = new ServisKorisnik;
        foreach ($idMehanicar as $id) {
            $services->idMehanicar = $id->id;
        }

        $services->idUserCars = $idUserCars;

        $services->dijagnozaKvara = $dijagnozaKvara;
        $services->kilometraza    = $kilometraza;
        $services->servis         = $servis;
        $services->ostalo         = $ostalo;

        $services->save();

        return redirect('home');
    }
}
