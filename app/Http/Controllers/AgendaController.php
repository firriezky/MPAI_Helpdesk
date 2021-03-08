<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function adminCreateIndex(){
        $agendas = Agenda::count();
        $widget = [
            'agendas' => $agendas,
            //...
        ];

        return view('admin.agenda.index')->with(compact('widget'));
    }
}
