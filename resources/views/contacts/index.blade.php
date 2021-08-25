@extends('layouts.app')
@section('child-1-breadcrumb', 'Contacts')
@section('child-2-breadcrumb', 'index')
@section('style')
    <style>
        .form-group {
            padding-bottom: 0 !important;
            margin-bottom: 5px !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <h4>Filters</h4>
            <hr>
            <form action="{{route('contacts.index')}}" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" value="{{request()->email}}"
                           placeholder="search by email...">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="mobile" value="{{request()->mobile}}"
                           placeholder="search by mobile...">
                </div>
                <div class="form-group">
                    <select name="organization_id" class="form-control" id="">
                        <option value="">Select organization id</option>
                        @foreach($organizations as $organization)
                            <option value="{{$organization->id}}">{{$organization->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="verified" class="form-control" id="">
                        <option>Select email verification statu</option>
                        <option value="1" {{request()->verified ? 'selected' : ''}}>Verified</option>
                        <option value="0" {{!empty(request()->verified) && request()->verified == 0 ? 'selected' : ''}}>
                            Not Empty
                        </option>
                    </select>
                </div>
                <button class="btn btn-secondary btn-block">filter</button>
                <a href="{{route('contacts.index')}}" class="btn btn-outline-secondary btn-block">clear</a>
                <a href="{{route('contacts.create')}}" class="btn btn-outline-primary btn-block">+ Add</a>
            </form>
        </div>
        <div class="col-md-8">
            @forelse($contacts as $contact)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><span class="text-primary">First name:</span> {{$contact->first_name}}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5><span class="text-primary">Last name :</span> {{$contact->last_name}}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5><span
                                        class="text-primary">Mobile numbers:</span> {{$contact->mobile}}
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <h5><span
                                        class="text-primary">Email</span> {{$contact->email}}
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <h5>
                                    <span class="text-primary">Organization:</span>
                                    {{ $contact->organization->name ?? ''}}
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <h5>
                                    <span class="text-primary">Date of Birth:</span>
                                    {{date('d-m-Y', strtotime($contact->date_of_birth))}}
                                </h5>
                            </div>
                            <div class="col-md-6">
                                @php
                                    $emailVerification = [
                                        0 => [
                                            'class' => "danger",
                                            'title' => "Email Not Verified"
                                        ],
                                        1 => [
                                            'class' => "primary",
                                            'title' => "Email Verified"
                                        ]
                                    ]
                                @endphp
                                <h5>
                                    <span class="text-primary">Is Email Verified: </span>
                                    <span
                                        class="badge badge-{{$emailVerification[$contact->is_email_verified]['class']}}">
                                    {{$emailVerification[$contact->is_email_verified]['title']}}
                                </span>
                                </h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('contacts.edit', $contact->id)}}" class="mr-2"><i class="fa fa-edit"></i> Edit</a>
                                <a href="javascript:void(0)" class="delete-btn" data-id="{{$contact->id}}"><i
                                        class="fa fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-100 text-center">
                    <h1>Sorry No Contacts found</h1>
                </div>
            @endforelse
            <div class="row">
                <div class="" style="float: none;margin: 0 auto;">
                    {{$contacts->appends(request()->input())->links()}}
                </div>
            </div>
        </div>
    </div>
    <form id="delete-form" method="POST">@csrf @method('DELETE')</form>
@endsection
@section('scripts')
    <script>
        $('.delete-btn').on('click', function () {
            let id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "You want to delete Contact?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
            }).then((result) => {
                if (result.value) {
                    $('#delete-form').attr('action', `{{url('contacts')}}/${id}`).submit();
                }
            })
        });
    </script>
@endsection

