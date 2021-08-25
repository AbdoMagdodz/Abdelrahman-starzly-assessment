@php $isEditing = $action != route('organizations.store') @endphp
@extends('layouts.app')
@section('bread-1-link', url("organizations"))
@section('child-1-breadcrumb', 'Organizations')
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
                    <h4 class="mb-0 text-white">{{$isEditing? 'Edit' : 'Create'}} Organization</h4>
                </div>
                <div class="card-body">
                    <form action="{{$action}}" method="POST" enctype="multipart/form-data"
                          class="form-horizontal form-bordered needs-validation" novalidate>
                        @csrf
                        @if($isEditing) @method('PUT') @endif
                        <div class="form-body m-b-40">
                            @include('includes.messages')
                            <div class="form-group row">
                                <label class="control-label text-dark text-right col-md-3">Name<code>*</code></label>
                                <div class="col-md-9">
                                    <input type="text" required value="{{old('name', $organization->name ?? '')}}"
                                           name="name"
                                           placeholder="ex: org1"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="control-label text-dark text-dark text-right col-md-3">Category<code>*</code></label>
                                <div class="col-md-9">
                                    <select name="category" id="" required class="form-control">
                                        @for($i = 1; $i<5;$i++)
                                            @php $value = "Category $i"@endphp
                                            <option
                                                {{isset($organization) && $organization->category == $value ? 'selected' : '' }}
                                                value="{{$value}}"
                                                {{in_array(request()->category, [$value, old('category') ?? ' ' ])
                                                  ? 'selected' : ''}}>
                                                {{$value}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-dark text-dark text-right col-md-3">Trade License<code>*</code></label>
                                <div class="col-md-9">
                                    <input type="text" name="trade_licence"
                                           value="{{old('trade_licence', $organization->trade_licence ?? '')}}" required
                                           placeholder="ex: 3242342342"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-dark text-right col-md-3">Logo<code>*</code></label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" name="logo"
                                               accept="image/*"
                                               {{$isEditing ? '' : 'required'}}
                                               class="custom-file-input"
                                               id="validatedCustomFile">
                                        <label class="custom-file-label"
                                               for="validatedCustomFile">Choose Organization
                                            Logo...</label>
                                    </div>
                                    <small class="form-control-feedback">
                                        Upload Organization <Code>Logo</Code> only accepts <code>.jpg, .jpeg,
                                            .gif</code>
                                    </small>

                                    @if(isset($organization))
                                        <div>
                                            <img src="{{asset('storage/'.$organization->logo)}}" class="rounded shadow"
                                                 width="200"
                                                 height="200" alt="">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-dark text-right col-md-3">
                                    Licensed Date<code>*</code></label>
                                <div class="col-md-9">
                                    <input type="text" name="licenced_date"
                                           value="{{old('licenced_date', $organization->licenced_date ?? '')}}" required
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
                                                <a href="{{url('organizations')}}" class="btn btn-inverse">Cancel</a>
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
            $(".custom-file-input").on("change", function () {
                let i = $(this).val();
                $(this).next(".custom-file-label").html(i)
            });
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
