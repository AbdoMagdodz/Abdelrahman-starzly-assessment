@extends('layouts.app')
@section('child-1-breadcrumb', 'Organization')
@section('child-2-breadcrumb', 'index')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <h4>Filters</h4>
            <hr>
            <form action="{{route('organizations.index')}}" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{request()->name}}"
                           placeholder="search name...">
                </div>
                <button class="btn btn-secondary btn-block">filter</button>
                <a href="{{route('organizations.index')}}" class="btn btn-outline-secondary btn-block">clear</a>
                <a href="{{route('organizations.create')}}" class="btn btn-outline-primary btn-block">+ Add</a>
            </form>
        </div>
        <div class="col-md-8">
            @forelse($organizations as $organization)
                <div class="card">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('storage/'.$organization->logo)}}" class="rounded" width="150"
                                 height="150" alt="">
                        </div>
                        <div class="col-md-8 d-flex flex-column  justify-content-around">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5><span class="text-primary">Name:</span> {{$organization->name}}</h5>
                                    <h5><span class="text-primary">Category :</span> {{$organization->category}}</h5>
                                    <h5><span
                                            class="text-primary">Trade License:</span> {{$organization->trade_licence}}
                                    </h5>
                                    <h5>
                                        <span class="text-primary">Licensed Date:</span>
                                        {{date('d-m-Y', strtotime($organization->licenced_date))}}
                                    </h5>
                                </div>
                                <div class="col-md-2 d-flex flex-column">
                                    <a href="{{route('organizations.edit', $organization->id)}}">
                                        <small><i class="fa fa-edit"></i> Edit</small>
                                    </a>
                                    <a href="javascript:void(0)" class="delete-btn" data-id="{{$organization->id}}">
                                        <small><i class="fa fa-trash"></i> Delete</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-100 text-center">
                    <h1>Sorry No Organizations found</h1>
                </div>
            @endforelse
            <div class="row">
                <div class="" style="float: none;margin: 0 auto;">
                    {{$organizations->appends(request()->input())->links()}}
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
                text: "You want to delete Organization?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
            }).then((result) => {
                if (result.value) {
                    $('#delete-form').attr('action', `{{url('organizations')}}/${id}`).submit();
                }
            })
        });
    </script>
@endsection

