<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Mail\TicketOpen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function create(): View
    {
        return view('tickets.create');
    }

    public function store(StoreTicketRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $ticket = auth()->user()->tickets()->create($attributes);

        Mail::to($ticket->user)->send(
            new TicketOpen($ticket)
        );

        return redirect()->route('home')
            ->with('success', 'Your ticket has been opened, please wait for the admin response.');
    }
}
