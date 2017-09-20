<?php

namespace App\Http\Controllers;

use App\Mehanicar;
use App\Termin;
use App\TerminTemp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TerminController extends Controller
{
    public function zakaziTermin($id)
    {
        $mehanicar = Mehanicar::find($id);

        return view('zakaziTermin', compact(Auth::user()->isMechanic, 'mehanicar'));
    }

    public function dodajTermin()
    {
        $mehanicar    = Input::get('id');
        $vrstaServisa = Input::get('vrstaServisa');
        $datum        = Input::get('datum');
        $vrijeme      = date("H:i", strtotime(Input::get('vrijeme')));

        $termin               = new TerminTemp;
        $termin->idMehanicar  = $mehanicar;
        $termin->vrstaServisa = $vrstaServisa;
        $termin->startTime    = $datum;
        $termin->end          = $vrijeme;
        $termin->idKorisnik   = Auth::user()->id;
        $termin->save();
        flash('Zahtjev je uspješno poslan!', 'info');
        return redirect('home');
    }

    public function prikaziZahtjeve()
    {
        $zahtjevi = TerminTemp::join('mechanics', 'temp_termin.idMehanicar', '=', 'mechanics.id')
            ->join('users', 'temp_termin.idKorisnik', '=', 'users.id')
            ->where('mechanics.nazivFirme', '=', Auth::user()->name)->select('temp_termin.*', 'users.name')->get();
        $notifikacijeTerminBrojac = TerminTemp::join('mechanics', 'temp_termin.idMehanicar', '=', 'mechanics.id')
            ->join('users', 'temp_termin.idKorisnik', '=', 'users.id')
            ->where('mechanics.nazivFirme', '=', Auth::user()->name)->select('temp_termin.*', 'users.name')->count();

        return view('zahtjeviZaServis', compact('zahtjevi', 'notifikacijeTerminBrojac'));
    }

    public function prihvatiZahtjev($id)
    {
        $temp                  = TerminTemp::find($id);
        $zahtjev               = new Termin;
        $zahtjev->idMehanicar  = $temp->idMehanicar;
        $zahtjev->vrstaServisa = $temp->vrstaServisa;
        $zahtjev->startTime    = $temp->startTime;
        $zahtjev->end          = $temp->end;
        $zahtjev->idKorisnik   = $temp->idKorisnik;
        $zahtjev->save();
        $temp->delete();
        flash('Zahtjev je prihvaćen!', 'warning');
        return redirect('zahtjeviZaServis');
    }

    public function odbijZahtjev($id)
    {
        $temp = TerminTemp::find($id);
        $temp->delete();
        flash('Zahtjev je odbijen!', 'danger');
        return redirect('zahtjeviZaServis');
    }
}
