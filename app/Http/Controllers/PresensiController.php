<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Perizinan;
use App\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index(){
        $agendas = Agenda::all();
        return view ('presensi.index')->with(compact('agendas'));
    }

    public function store(Request $request)
    {
        $agenda = Agenda::findOrFail($request->agenda_id);
        $agendaName = $agenda->judul;
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required|numeric',
            'class' => 'required',
            'agenda_id' => 'required',
            'account_type' => 'required',
            'feedback' => 'required',
        ]);

        $nim = $request->nim;
        $image = $request->file('file');
        $counter = 0;

        $imageArr = array();

        if ($image != "") {
            foreach ($image as $file) {
                $filename = time() . "-" . $counter . "." . $file->getClientOriginalExtension();
                $file->move(public_path("presensi/$agendaName/$nim"), $filename);
                array_push($imageArr, $filename);
                $counter++;
            }
        }

        $agenda = Presensi::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'class' => $request->class,
            'agenda_id' => $request->agenda_id,
            'fakultas' => $request->faculty,
            'izin_type' => $request->izin_type,
            'account_type' => $request->account_type,
            'feedback' => $request->feedback,
            'photo' => implode(",", $imageArr)
        ]);

        if ($agenda) {
            return redirect("/")->with(['success' => 'Presensi Berhasil Diinput!']);;
        } else {
            return redirect("/")->with(['success' => 'Presensi Gagal Diinput!']);;
        }
    }

}
