@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-0">
                        <li class="breadcrumb-item active" aria-current="page">
                            Sites
                        </li>
                    </ol>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($sites))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sites as $site)
                                <tr>
                                    <td>{{ $site->id }}</td>
                                    <td>
                                        <a href="/sites/{{ $site->id }}">{{ $site->name }}</a>
                                    </td>
                                    <td>Vessel</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            <p>You have not created any sites yet.</p>
                        </div>
                    @endif
                        <hr>
                        <div class="text-center">
                            <a class="btn btn-primary" href="/sites/create">New site</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
