<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Perizinan;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index(){
        $agendas = Agenda::all();
        return view ('izin.index')->with(compact('agendas'));
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
            'detail' => 'required',
            'izin_type' => 'required',
        ]);

        $nim = $request->nim;
        $image = $request->file('file');
        $counter = 0;

        $imageArr = array();

        if ($image != "") {
            foreach ($image as $file) {
                $filename = time() . "-" . $counter . "." . $file->getClientOriginalExtension();
                $file->move(public_path("perizinan/$agendaName/$nim"), $filename);
                array_push($imageArr, $filename);
                $counter++;
            }
        }

        $agenda = Perizinan::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'fakultas' => $request->faculty,
            'class' => $request->class,
            'agenda_id' => $request->agenda_id,
            'izin_type' => $request->izin_type,
            'account_type' => $request->account_type,
            'deskripsi' => $request->detail,
            'izin_photo' => implode(",", $imageArr)
        ]);

        if ($agenda) {
            return redirect("/")->with(['success' => 'Perizinan Berhasil Diinput!']);;
        } else {
            return redirect("/")->with(['success' => 'Perizinan Gagal Diinput!']);;
        }
    }



}
