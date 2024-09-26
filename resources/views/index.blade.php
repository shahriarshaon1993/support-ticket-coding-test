<x-layout>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <x-page-heading>Tickets</x-page-heading>

    <div class="row">
        @forelse ($tickets as $ticket)
            <x-ticket-card :$ticket/>
        @empty
            <p>No tickets here!</p>
        @endforelse
    </div>

    <div class="d-flex flex-column align-items-center">
        {{ $tickets->links() }}
    </div>
</x-layout>
