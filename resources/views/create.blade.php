@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('index') }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul> 
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>
    </div>
@endif

<form action="{{ route('store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Song Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Song title">
            </div>
        </div>
        <div class=col-xs-12 col-sm-12 col-md-12>
            <div class="form-group">
                <strong>Artist:</strong>
                <input type="text" name="artist" class="form-control" placeholder="Artist name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Code">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </div>
    </div>

</form>
@endsection