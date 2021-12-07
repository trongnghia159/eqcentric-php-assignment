@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-0">
                        <li class="breadcrumb-item active" aria-current="page">
                            Site's Detail
                        </li>
                    </ol>
                </div>

                <div class="card-body">
                    @if($site->user_id == Auth::user()->id)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Creator's Name</th>
                                <th>Creator's Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $site->name }}</td>
                                <td>{{ $site->type }}</td>
                                <td>{{ $site->user->name }}</td>
                                <td>{{ $site->user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">
                        <p>You do not have permission to view this page.</p>
                    </div>
                    @endif
                    <hr>
                    <div class="text-left">
                        <a class="btn btn-primary" href="{{ route('sites.export', ['id' => $site->id]) }}">Export </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
