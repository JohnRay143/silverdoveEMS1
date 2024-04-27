<!-- resources/views/events/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="main-wrapper">     
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12 mt-5">
                            <h3 class="page-title mt-3">Good {{ \App\Helpers\TimeHelper::getTimeOfDay() }}, {{ Auth::user()->name }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-left mt-2">event</h4>
                            <a href="{{ route('events.create') }}" class="btn btn-primary float-right veiwbutton"> Create Booking </a>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center">
                                        <thead>
                                            <tr>
                                                <th>event ID</th>
                                                <th>Customer Name</th>
                                                <th>Contact Nmber</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Staff Confirmed</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($events as $event)
                                            <tr>
                                                <td>{{ $event->id }}</td>
                                                <td>{{ $event->user->name }}</td>
                                                <td>{{ $event->user->contact_number }}</td>
                                                <td>{{ $event->date }}</td>
                                                <td>{{ $event->type }}</td>
                                                <td>
                                                    @if($event->confirmed_by)
                                                        {{ $event->confirmedBy->name }}
                                                    @else
                                                        Not confirmed
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm mr-1">Show</a>
                                                    @if(Auth::user()->type === 'admin' || $event->user_id === Auth::id())
                                                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                                                        <form method="POST" action="{{ route('events.destroy', $event->id) }}" style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    @endif
                                                    @if(Auth::user()->type === 'staff')
                                                        <form method="POST" action="{{ route('events.confirm', $event->id) }}" style="display:inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Confirm</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection