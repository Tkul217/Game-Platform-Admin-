<x-layouts.main>
    <form action="{{ route('authenticate') }}" method="post">
        @csrf

        <input type="text" name="username" id="username" placeholder="{{ __('Введите имя') }}">

        <input type="password" name="password" id="password" placeholder="{{ __('Введите пароль') }}">

        <button type="submit">{{ __('Войти') }}</button>

        @if($errors)
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </form>
</x-layouts.main>
