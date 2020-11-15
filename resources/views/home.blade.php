@section('css')
@endsection
@extends('layouts.global')

@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!
</div>

 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
    Dashboard
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>
<section class="content">
    @endsection

