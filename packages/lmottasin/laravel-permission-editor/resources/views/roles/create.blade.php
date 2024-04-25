@extends('permission-editor::layouts.app')

@section('content')
    <h1 class="text-xl font-semibold text-gray-900">Create Role</h1>

    @if ($errors->any())
        <div class="text-red-500 text-sm mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('permission-editor.roles.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
        </div>

        @if ($permissions->count())
            <div class="mt-4">
                <label for="permissions">Permissions</label>

                @foreach ($permissions as $id => $name)
                    <input type="checkbox" name="permissions[]" id="permission-{{ $id }}"
                           value="{{ $id }}" @checked(in_array($id, old('permissions', [])))>
                    <label for="permission-{{ $id }}">{{ $name }}</label>
                    <br/>
                @endforeach
            </div>
        @endif

        <div class="mt-4">
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
