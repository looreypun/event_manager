@extends('adminlte::page')

@section('title', 'Events')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mx-5">
        <h1>Events</h1>
        <a href="{{ route('event.create') }}" class="btn btn-success"><i class="fa fa-plus mr-2"></i>Create</a>
    </div>
@stop

@section('content')
    <main class="card mx-5">
        <div class="events">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Event Name</th>
                        <th scope="col">Organiser</th>
                        <th scope="col">Hold Date</th>
                        <th scope="col">Premium Ticket Price</th>
                        <th scope="col">Normal Ticket Price</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr class="text-secondary">
                            <td><a class="text-uppercase" href="{{ route('event.show', ['event' => $event->id]) }}">{{ $event->name }}</a></td>
                            <td>{{ $event->rlUser?->name }}</td>
                            <td>{{ $event->hold_date }}</td>
                            <td>¥{{ $event->premium_ticket_price }}</td>
                            <td>¥{{ $event->normal_ticket_price }}</td>
                            <td>{{ $event->venue }}</td>
                            <td>
                                <form method="post" action="{{ route('event.destroy', ['event' => $event->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $events->links() }}
        </div>
    </main>
@stop

