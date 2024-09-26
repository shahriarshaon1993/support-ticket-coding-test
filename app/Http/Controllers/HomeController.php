<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $authId = $request->user()?->id;

        $tickets = Ticket::query()
            ->with('user')
            ->where('user_id', $authId)
            ->latest()
            ->paginate(6);

        return view('index', ['tickets' => $tickets]);
    }
}
