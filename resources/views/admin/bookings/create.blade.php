@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h1 class="h3 mb-0 text-gray-800">{{ __('create booking') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bookings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" value="" />
                    </div>
                    <div class="form-group">
                        <label for="dosen_id">{{ __('Dosen') }}</label>
                        <select class="form-control" name="dosen_id" id="dosen_id">
                            <!-- make dropdown to show role  2 = dosen -->
                                <option value="{{ $users->id=2 }}">{{ $users->name="pak alim" }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time_from">{{ __('Time From') }}</label>
                        <input type="text" class="form-control datetimepicker" id="time_from" name="time_from" value="{{ old('time_from', $timeFrom) }}" />
                    </div>
                    <div class="form-group">
                        <label for="time_to">{{ __('Time to') }}</label>
                        <input type="text" class="form-control datetimepicker" id="time_to" name="time_to" value="{{ old('time_to', $timeTo) }}" />
                    </div>
                    <div class="form-group">
                        <label for="additional_information">{{ __('Additional Information') }}</label>
                        <textarea class="form-control" name="additional_information" id="additional_information"  cols="30" rows="10">{{ old('additional_information') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <select class="form-control" name="status" id="status">
                                <option value="0">Created</option>
                                <option value="1">Completed</option>
                                <option value="2">Concelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection

@push('style-alt')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endpush

@push('script-alt')
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'en',
            sideBySide: true,
            icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
            },
            stepping: 10
        });
    </script>
@endpush