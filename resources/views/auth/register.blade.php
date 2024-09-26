<x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="{{ route('register') }}">
        <x-forms.input label="Name" name="name" type="text" placeholder="Your name"/>
        <x-forms.input label="Email" name="email" type="text" placeholder="Your email"/>
        <x-forms.input label="Password" name="password" type="password" placeholder="Your password"/>
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" placeholder="Re-type password"/>

        <x-forms.button type="submit">Create Account</x-forms.button>
    </x-forms.form>
</x-layout>
