@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="events">
            <div class="row">
                @foreach($events as $event)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5">
                        <div class="card">
                            <img src="{{ $event->img_url }}" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase fw-bold">{{ $event->name }}</h5>
                                <p class="card-text text-secondary text-truncate">{{ $event->description }}</p>
                                <p class="fw-bold">VENUE : <a href="" class="text-small text-primary-emphasis">{{ $event->venue }}</a></p>
                                <div class="button text-center">
                                    <button class="btn btn-sm btn-success w-100 py-2">JOIN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@stop

