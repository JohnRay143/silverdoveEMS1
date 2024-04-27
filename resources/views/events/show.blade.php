<!-- resources/views/events/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Event Details') }}</div>

                <div class="card-body">
                    <p><strong>User Name:</strong> ({{ $event->user->name }}) - ({{ $event->user->contact_number }}) - ({{ $event->user->address }})</p>
                    <p><strong>Type:</strong> {{ $event->type }}</p>
                    <p><strong>Date:</strong> {{ $event->date }}</p>
                    <p><strong>Participants:</strong> {{ $event->participants }}</p>
                    <p><strong>Setup:</strong> {{ $event->setup }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
