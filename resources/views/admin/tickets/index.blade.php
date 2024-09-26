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
           <p>No tickets</p>
        @endforelse
    </div>

    <div class="d-flex flex-column align-items-center">
        {{ $tickets->links() }}
    </div>
</x-layout>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function changeStatus(id) {
        let value = event.target.value;

        $.ajax({
            url: "{{ route('admin.tickets.status.update', '') }}" + '/' + id,
            type: 'PUT',
            dataType: "json",
            data: {
                status: value,
            },
            success: function(data) {
                alert('Ticket status updated successfully!');
            }
        });
    }
</script>
