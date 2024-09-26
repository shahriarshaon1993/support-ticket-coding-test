@props(['ticket'])

<div class="col-md-4 mb-4">
    <div class="ticket-cards">
        <div class="ticket-name">{{ $ticket->ticket_number }}</div>
        <div class="ticket-body">
            <h3 class="ticket-heading">
                <a href="#">
                    {{ $ticket->title }}
                </a>
            </h3>

            <p>{{ $ticket->description }}</p>
        </div>

        @role('customer')
            <x-status-badge :status="$ticket->status" />
        @endrole

        @role('admin')
            <select onchange="changeStatus({{$ticket->id}})" class="form-input">
                <option value="open" {{$ticket->status === 'progress' ? 'open': ''}}>Open</option>
                <option value="progress" {{$ticket->status === 'progress' ? 'selected': ''}}>Progress</option>
                <option value="resolved" {{$ticket->status === 'resolved' ? 'selected': ''}}>Resolved</option>
                <option value="closed" {{$ticket->status === 'closed' ? 'selected': ''}}>Closed</option>
            </select>
        @endrole
    </div>
</div>
