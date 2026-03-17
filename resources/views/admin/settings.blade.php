@extends('layouts.master')

@section('content')

<div class="card shadow p-4">

    <h3>Settings</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('settings.update') }}">
        @csrf

        <!-- THEME -->
        <div class="mb-3">
            <label class="form-label">Theme</label>
            <select name="theme" class="form-control">
                <option value="light" {{ Auth::user()->theme == 'light' ? 'selected' : '' }}>Light</option>
                <option value="dark" {{ Auth::user()->theme == 'dark' ? 'selected' : '' }}>Dark</option>
            </select>
        </div>

        <!-- LANGUAGE -->
        <div class="mb-3">
            <label class="form-label">Language</label>
            <select name="language" class="form-control">
                <option value="en" {{ Auth::user()->language == 'en' ? 'selected' : '' }}>English</option>
                <option value="hi" {{ Auth::user()->language == 'hi' ? 'selected' : '' }}>Hindi</option>
                <option value="fr" {{ Auth::user()->language == 'fr' ? 'selected' : '' }}>French</option>
                <option value="es" {{ Auth::user()->language == 'es' ? 'selected' : '' }}>Spanish</option>
            </select>
        </div>

        <!-- TIMEZONE -->
        <div class="mb-3">
            <label class="form-label">Timezone</label>
            <select name="timezone" class="form-control">
                @foreach(timezone_identifiers_list() as $timezone)
                    <option value="{{ $timezone }}"
                        {{ Auth::user()->timezone == $timezone ? 'selected' : '' }}>
                        {{ $timezone }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Settings
        </button>

    </form>

</div>

@endsection
