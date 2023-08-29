@extends('layouts.app')
@section('content')
<div class="row d-flex p-2">
    <div class="d-flex" style="margin: auto;">
    <chat-view :user="{{ auth()->user() }}"/>
    </div>
</div>

@endsection