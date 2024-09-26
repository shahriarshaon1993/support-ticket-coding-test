<x-layout>
    <x-page-heading>Login</x-page-heading>

    <x-forms.form method="POST" action="{{ route('login') }}">
        <x-forms.input label="Email" name="email" type="email" placeholder="Your email"/>
        <x-forms.input label="Password" name="password" type="password" placeholder="Your password"/>

        <x-forms.button type="submit">Log In</x-forms.button>
    </x-forms.form>
</x-layout>
