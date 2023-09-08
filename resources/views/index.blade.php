@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Favorite Karaoke Lists</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create') }}">Add</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Code</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($karaokelists as $karaokelist)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $karaokelist-> title }}</td>
            <td>{{ $karaokelist-> artist }}</td>
            <td>{{ $karaokelist-> code }}</td>
            <td>
                <form action="{{ route('destroy', $karaokelist-> id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('show', $karaokelist -> id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('edit', $karaokelist -> id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>    
        @endforeach
    </table>

    {!! $karaokelists->links() !!}

@endsection