<x-layout>
    <x-page-heading>Open a New Ticket</x-page-heading>

    <x-forms.form method="POST" action="{{ route('tickets.store') }}">
        <x-forms.input label="Title" name="title" type="title" placeholder="Ticket title"/>

        <x-forms.textarea label="Description" name="description" cols="30" rows="10" placeholder="Describe here..."/>

        <x-forms.button type="submit">Ticket open</x-forms.button>
    </x-forms.form>
</x-layout>
