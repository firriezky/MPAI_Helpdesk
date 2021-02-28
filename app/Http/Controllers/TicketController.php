<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Http\Controllers\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function index()
    {

        return view("ticket.new_ticket");
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required|numeric',
            'class' => 'required',
            'detail' => 'required',
            'feedback' => 'required',
        ]);


        $nim = $request->nim;

        
        $ticket_id = "#RAZ$nim"."-".Str::random(4);


        $image = $request->file('file');
        $counter = 0;

        
        if ($image != "") {
            foreach ($image as $file) {
                $filename = time() ."-".$counter.".". $file->getClientOriginalExtension();
                $file->move(public_path("ticket/$nim"), $filename);
            }
        }

        $ticket = Ticket::create([
            'name' => $request->name,
            'nid' => $request->nim,
            'class' => $request->class,
            'faculty' => $request->faculty,
            'account_type' => $request->account_type,
            'ticket_type' => $request->ticket_type,
            'status' => $request->ticket_type,
            'ticket_id' => $ticket_id,
            'ticket_detail' => $request->detail,
            'answers_pref' => $request->feedback,
            'answers_ticket' => "",
            'file' => $filename
        ]);

        if ($ticket) {
            return "success";
        } else {
            return "failed";
        }
    }
}
