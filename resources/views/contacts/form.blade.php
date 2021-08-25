@php $isEditing = $action != route('contacts.store') @endphp
@extends('layouts.app')
@section('bread-1-link', url("Contacts"))
@section('child-1-breadcrumb', 'Contacts')
@section('child-2-breadcrumb', $isEditing ? 'Edit' : 'Create')

@section('style')
    <link
        href="{{asset('/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
        rel="stylesheet">
    <style>
        .form-group {
            padding-bottom: 12px !important;
            margin-bottom: 12px !important;
        }

        form label {
            font-weight: 400;
        }

        .form-control {
            min-height: 35px !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="background-color: #455A64">
                    <h4 class="mb-0 text-white">{{$isEditing? 'Edit' : 'Create'}} Contact</h4>
                </div>
                <div class="card-body">
                    <form action="{{$action}}" method="POST" enctype="multipart/form-data"
                          class="form-horizontal form-bordered needs-validation" novalidate>
                        @csrf
                        @if($isEditing) @method('PUT') @endif
                        <div class="form-body m-b-40">
                            @include('includes.messages')
                            <div class="form-group row">
                                <label class="control-label text-dark text-right col-md-3">First
                                    Name<code>*</code></label>
                                <div class="col-md-9">
                                    <input type="text" required
                                           value="{{old('first_name', $contact->first_name ?? '')}}"
                                           name="first_name"
                                           placeholder="Ahmed"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-dark text-right col-md-3">Last
                                    Name<code>*</code></label>
                                <div class="col-md-9">
                                    <input type="text" required value="{{old('last_name', $contact->last_name ?? '')}}"
                                           name="last_name"
                                           placeholder="Mohamed"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-dark text-right col-md-3">Mobiles<code>*</code></label>
                                <div class="col-md-9">
                                    <input type="text" required value="{{old('mobile', $contact->mobile ?? '')}}"
                                           name="mobile"
                                           placeholder="ex: 01114988158,01231231231"
                                           class="form-control">
                                    <small class="form-control-feedback">
                                        if you have more than one number, write them separated with <Code>,</Code>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-dark text-right col-md-3">Email<code>*</code></label>
                                <div class="col-md-9">
                                    <input type="email" required value="{{old('email', $contact->email ?? '')}}"
                                           name="email" placeholder="ex: 123@g.com" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-dark text-dark text-right col-md-3">Organization<code>*</code></label>
                                <div class="col-md-9">
                                    <select required name="organization_id" class="form-control" id="">
                                        @foreach($organizations as $organization)
                                            <option
                                                value="{{$organization->id}}"
                                                {{$organization->id == old('organization_id',$contact->organization_id ?? '')}}>
                                                {{$organization->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-dark text-right col-md-3">
                                    Date of Birth<code>*</code></label>
                                <div class="col-md-9">
                                    <input type="text" name="date_of_birth"
                                           value="{{old('date_of_birth', $contact->date_of_birth ?? '')}}" required
                                           class="form-control mdate" placeholder="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-9">
                                                <button type="submit" class="btn btn-primary submit-btn disable"><i
                                                        class="fa fa-check"></i>
                                                    Submit
                                                </button>
                                                <a href="{{url('contacts')}}" class="btn btn-inverse">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script
        src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <script>
        // MAterial Date picker
        $('.mdate').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            format: 'YYYY-MM-DD'
        });
    </script>
    <script>
        (function () {
            'use strict';
            let spinner = '<i class="fa fa-spinner fa-spin"></i> loading';
            // window.addEventListener('load', function () {
            $('.needs-validation').on('submit', function (e) {
                let that = this;
                if (that.checkValidity() === false) {
                    e.preventDefault();
                    e.stopPropagation();
                } else {//submitted successfully
                    $('.submit-btn').html(spinner);
                    $('.disable').prop('disabled', true);
                }
                that.classList.add('was-validated');
            });
        })();
    </script>
@endsection
