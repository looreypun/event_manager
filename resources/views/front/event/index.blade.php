@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/front/event/index.css') }}">
@stop

@section('content')
    <main class="container">
        <section class="events">
            <div class="row">
                @foreach($events as $event)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5">
                        <div class="card shadow border-0" role="button">
                            <div id="front-card" class="position-relative">
                                <img src="{{ $event->main_img_url }}" class="card-img-top" alt="Event Image" data-bs-toggle="modal" data-bs-target="#descriptionModal" onclick="toggleCard(this)">
                                <div class="text-dark small position-absolute bg-light top-0 end-0 m-2 px-2 py-1">{{ \Carbon\Carbon::parse($event->hold_date)->format('F j H:i') }}</div>
                                <h5 class="card-title text-light text-uppercase position-absolute bottom-0 start-0 fw-bold m-2">{{ $event->name }}</h5>
                            </div>
                            <div id="back-card" class="card-body" style="display: none">
                                <div class="description text-secondary">
                                    {{ $event->description }}
                                </div>
                                <div class="ticket-info my-1">
                                    <div>
                                        <span class="text-warning fw-bold">PREMIUM TICKET</span>
                                        <span class="ms-2">¥{{ $event->premium_ticket_price }}</span>
                                    </div>
                                    <div>
                                        <span class="text-dark fw-bold me-1">NORMAL TICKET</span>
                                        <span class="ms-2">¥{{ $event->normal_ticket_price }}</span>
                                    </div>
                                </div>
                                <p class="fw-bold mb-0"><span class="text-primary">venue</span> : <a href="" class="small text-primary-emphasis">{{ $event->venue }}</a></p>
                                <a href="" class="btn btn-sm btn-dark w-100 text-light px-3 mt-2">JOIN US</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="descriptionModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="card">
                        <div id="modal-content" class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('js')
    <script>
        let toggleCard = (element) => {
            let card = $(element).closest('.position-relative').next('#back-card').html();
            let modal = $('#modal-content');
            modal.html(card);
        }
    </script>
@stop

