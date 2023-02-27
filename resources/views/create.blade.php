@extends('Layouts.main')

@section('content')
    <form method="post" class="bg-dark text-white" style="width: 70%; margin: auto; border: 1px solid white; border-radius: 10px; padding: 10px;" action="{{ route('todo.create') }}">
        @csrf
        @method('POST')
        <br>
        <div class="form-group">
            <div class="d-flex">
                <label>For the user: </label>
                <select name="targetuser" style="width: fit-content" required class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="d-flex">
                <label>By user: </label>
                <select name="fromuser" style="width: fit-content" required class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label>Content</label>
        <textarea name="content" class="form-control" cols="30" rows="10" required placeholder=""></textarea>
        <br>
        <button type="submit" style="margin: auto; display: block" class="btn btn-success">Create</button>
        <br>
    </form>
@endsection
