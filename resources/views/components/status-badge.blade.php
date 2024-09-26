@props(['status'])

<span
    {{ $attributes->class([
        'badge text-capitalize',
        'bg-primary' => $status === 'open',
        'bg-success' => $status === 'resolved',
        'bg-warning text-dark' => $status === 'progress',
        'bg-danger' => $status === 'closed'
]) }}>
    {{ $status }}
</span>
