@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Task list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form class="col-xs-12 col-sm-12 col-md-12" style="margin: 15px 0;">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <strong>Sort by:</strong>
                <select name="sort" id="tasks_sort">
                    <option value="desc">Started new</option>
                    <option value="asc">Started old</option>
                </select>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <strong>Filter by:</strong>
                @foreach ($statuses as $status)
                    <label>
                        <input 
                        type="checkbox" 
                        name="statuses[]" 
                        value="{{ $status->id }}" 
                        {{ in_array($status->id, $select_statuses) ? 'checked' : '' }}
                        > {{ $status->title }}
                    </label>
                @endforeach
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <button class="btn btn-primary" type="submit">Apply</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->status->title }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection