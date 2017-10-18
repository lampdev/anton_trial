@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($contacts) == 0)
        <div class="alert alert-warning">Empty contacts...</div>
    @else
        <div class="row">
            <div class="col-md-2">
                First name
            </div>
            <div class="col-md-2">
                Last name
            </div>
            <div class="col-md-3">
                Email
            </div>
            <div class="col-md-2">
                Phone
            </div>
            <div class="col-md-2">
                Address
            </div>
            <div class="col-md-1">
                Actions
            </div>

        </div>


        @foreach ($contacts as $item)
            <div class="row">
                <div class="col-md-2">
                    {{ $item->first_name }}
                </div>
                <div class="col-md-2">
                    {{ $item->last_name }}
                </div>
                <div class="col-md-3">
                    {{ $item->email }}
                </div>
                <div class="col-md-2">
                    {{ $item->phone }}
                </div>
                <div class="col-md-2">
                    {{ $item->address }}
                </div>
                <div class="col-md-1">
                    <a href="{{ route('edit_contact',['id' => $item->id]) }}">Edit</a>
                    <a href="{{ route('delete_contact',['id' => $item->id]) }}">Delete</a>
                </div>

            </div>
        @endforeach
    @endif


</div>
@endsection
