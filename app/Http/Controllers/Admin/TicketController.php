<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TicketClosed;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index(): View
    {
        $tickets = Ticket::query()
            ->with('user')
            ->latest()
            ->paginate(6);

        return view('admin.tickets.index', ['tickets' => $tickets]);
    }

    public function updateStatus(Request $request, Ticket $ticket): Ticket
    {
        $ticket->update([
            'status' => $request->input('status')
        ]);

        if ($ticket->status === 'closed') {
            Mail::to($ticket->user)->send(
                new TicketClosed($ticket)
            );
        }

        return $ticket;
    }
}
