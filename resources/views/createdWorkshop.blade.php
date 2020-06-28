@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Workshop created
            </div>
            <div class="card-body">
                {{$workshop->name}}<br>
                {{$workshop->key}}
            </div>
        </div>
    </div>
@endsection
