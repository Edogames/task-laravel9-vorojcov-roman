@extends('Layouts.main')

@section('content')
    <main>
        <div class="container">
            @foreach ($todos as $todo)
                <div class="card">
                    <div style="display: block" id="normal-view-{{$todo->id}}">
                        <div class="card-header bg-dark text-white d-flex justify-content-between">
                            @foreach ($users as $user)
                                @if ($todo->fromuser == $user->id)
                                    <h1>Assigned by: {{$user->name}}</h1>
                                @endif
                            @endforeach
                            @foreach ($users as $user)
                                @if ($todo->targetuser == $user->id)
                                    <h1>For: {{$user->name}}</h1>
                                @endif
                            @endforeach
                        </div>
                        <h1 class="card-body">{{$todo->content}}</h1>
                        <div class="card-footer bg-dark text-white">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <h1>Status:</h1><br>
                                    @if ($todo->status == 'failed')
                                        <h1 class="text-danger">Failed</h1>
                                    @elseif ($todo->status == 'complete')
                                        <h1 class="text-success">Complete</h1>
                                    @else
                                        <h1 style="color: gray">in progress</h1>
                                    @endif
                                </div>
                                <div class="d-flex">
                                    <button onclick="toggleEditFor();toggleEditFor(null, '{{ $todo->id }}');" class="btn btn-success">Edit</button>
                                    <form action="{{ URL::route('todo.delete', $todo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('You really want to delete this task?')" style="display: inline;">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: block" id="edit-view-{{$todo->id}}">
                        <form action="{{ route('update') }}" method="post">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="id" value="{{$todo->id}}">
                            <div class="card-header bg-dark text-white d-flex justify-content-between">
                                <div class="d-flex">
                                    <h1>Assigned by: </h1>
                                    <select name="fromuser" class="form-control">
                                        @foreach ($users as $user)
                                            @if ($user->id == $todo->fromuser)
                                                <option value="{{$user->id}}" selected="selected">{{$user->name}}</option>
                                            @else
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex">
                                    <h1>For: </h1>
                                    <select name="targetuser" value class="form-control">
                                        @foreach ($users as $user)
                                            @if ($user->id == $todo->targetuser)
                                                <option value="{{$user->id}}" selected="selected">{{$user->name}}</option>
                                            @else
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <textarea name="content" class="form-control" cols="30" rows="10" style="height: fit-content; resize: none;">{{$todo->content}}</textarea>
                            <div class="card-footer bg-dark text-white">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <h1>Status:</h1><br>
                                        <select name="status" class="form-control">
                                            @if ($todo->status == 'failed')
                                                <option value="3" selected>Failed</option>
                                                <option value="2">complete</option>
                                                <option value="1">in progress</option>
                                            @elseif ($todo->status == 'complete')
                                                <option value="3">Failed</option>
                                                <option value="2" selected>complete</option>
                                                <option value="1">in progress</option>
                                            @else
                                                <option value="3">Failed</option>
                                                <option value="2">complete</option>
                                                <option value="1" selected>in progress</option>
                                            @endif
                                        </select>
                                    </div>
                                    <button onclick="toggleEditFor(event, '{{ $todo->id }}');" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-warning text-white" style="display: inline;">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </main>
@endsection
