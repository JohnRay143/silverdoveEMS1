<!-- resources/views/events/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Event') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('events.update', $event->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="type">{{ __('Type') }}</label>
                            <input id="type" type="text" class="form-control" name="type" value="{{ $event->type }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="date">{{ __('Date') }}</label>
                            <input id="date" type="datetime-local" class="form-control" name="date" value="{{ $event->date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="participants">{{ __('Participants') }}</label>
                            <input id="participants" type="number" class="form-control" name="participants" value="{{ $event->participants }}" required>
                        </div>

                        <div class="form-group">
                            <label for="setup">{{ __('Setup') }}</label>
                            <textarea id="setup" class="form-control" name="setup">{{ $event->setup }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Event') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
