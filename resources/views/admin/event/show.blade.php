@extends('adminlte::page')

@section('title', 'Event Details')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mx-5">
        <h1>Event Details</h1>
        <a href="{{ route('event.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left mr-2"></i>Back</a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/event/index.css') }}">
@stop

@section('content')
    <main class="card px-2 mx-5">
        <div class="event-detail">
            <form method="post" action="{{ route('event.update', ['event' => $event->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3 border-right p-3 py-5">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="text-secondary text-bold">Primary Image</h5>
                            <input name="image-main" type="file" id="main-image-input" accept="image/*" style="display: none" onchange="previewImage(event, 'main-image')">
                            <label for="main-image-input">
                                <div class="image-wrapper border rounded">
                                    <img id="main-image" class="rounded w-100" src="{{ $event->main_img_url?? asset('storage/images/events/upload_icon.png') }}" role="button">
                                </div>
                            </label>
                            <h5 class="text-secondary text-bold">Secondary Image</h5>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <input name="image-sub-one" type="file" id="sub-image-input-one" accept="image/*" style="display: none;" onchange="previewImage(event, 'sub-image-one')">
                                    <label for="sub-image-input-one">
                                        <div class="image-wrapper border rounded">
                                            <img id="sub-image-one" class="w-100 rounded" src="{{ $event->sub_img_url_one?? asset('storage/images/events/upload_icon.png') }}" role="button")>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 mt-2">
                                    <input name="image-sub-two" type="file" id="sub-image-input-two" accept="image/*" style="display: none;" onchange="previewImage(event, 'sub-image-two')">
                                    <label for="sub-image-input-two">
                                        <div class="image-wrapper border rounded">
                                            <img id="sub-image-two" class="w-100 rounded" src="{{ $event->sub_img_url_two?? asset('storage/images/events/upload_icon.png') }}" role="button">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 mt-2">
                                    <input name="image-sub-three" type="file" id="sub-image-input-three" accept="image/*" style="display: none;" onchange="previewImage(event, 'sub-image-three')">
                                    <label for="sub-image-input-three">
                                        <div class="image-wrapper border rounded">
                                            <img id="sub-image-three" class="w-100 rounded" src="{{ $event->sub_img_url_three?? asset('storage/images/events/upload_icon.png') }}" role="button">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6 mt-2">
                                    <input name="image-sub-four" type="file" id="sub-image-input-four" accept="image/*" style="display: none;" onchange="previewImage(event, 'sub-image-four')">
                                    <label for="sub-image-input-four">
                                        <div class="image-wrapper border rounded">
                                            <img id="sub-image-four" class="w-100 rounded" src="{{ $event->sub_img_url_four?? asset('storage/images/events/upload_icon.png') }}" role="button">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-uppercase">{{ $event->name }}</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 mt-2">
                                    <label class="labels text-secondary">Event Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Event Name" value="{{ old('name', $event->name) }}" required>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label class="labels text-secondary">Description</label>
                                    <textarea name="description" type="text" class="form-control" placeholder="Description" rows="5">{{ old('description', $event->description) }}</textarea>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label class="labels text-secondary">Hold Date</label>
                                    <input name="hold_date" type="datetime-local" class="form-control" placeholder="Hold Date" value="{{ old('hold_date', $event->hold_date) }}" required>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label class="labels text-secondary">Premium Ticket Price</label>
                                    <input name="premium_ticket_price" type="number" class="form-control" placeholder="Premium Ticket Price" value="{{ old('premium_ticket_price', $event->premium_ticket_price) }}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label class="labels text-secondary">Normal Ticket Price</label>
                                    <input name="normal_ticket_price" type="number" class="form-control" placeholder="Normal Ticket Price" value="{{ old('normal_ticket_price', $event->normal_ticket_price) }}" required>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label class="labels text-secondary">Venue</label>
                                    <input name="venue" type="text" class="form-control" placeholder="Venue" value="{{ old('venue', $event->venue) }} required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <div class="p-3 py-5">
                            <div class="col-md-12">
                                <label class="labels text-secondary">Organiser</label>
                                <p class="text-uppercase">{{ $event->rlUser?->name }}</p>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="labels text-secondary">Created At</label>
                                <p class="text-primary">{{ $event->created_at }}</p>
                            </div>
                            <div class="col-md-12 mt-2 mt-2">
                                <label class="labels text-secondary">Last Updated </label>
                                <p class="text-danger">{{ $event->updated_at }}</p>
                            </div>
                        </div>
                        <button type="submit" class="submit btn btn-default position-absolute"><i class="fa fa-save mr-2"></i>Save</button>
                    </div>
                </div>
            </form>
            <div class="modal fade" id="cropper-modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image</h5>
                        </div>
                        <div class="modal-body">
                            <div class="cropper-container">
                                <img id="cropperImage" class="img-fluid" alt="Image to crop">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="crop-button" type="button" class="btn btn-primary">Crop</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('js')
    <script src="{{ asset('js/admin/event/index.js') }}"></script>
@stop
