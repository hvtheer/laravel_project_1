@extends ('layouts.master')
@section ('content')
<div class="col-md-10 content">
    <div class="container">
        <nav class="navbar justify-content-between">
    @if(empty($role))
            <a class="navbar-brand">{{__('role.createARole')}}</a>
            <a class="btn btn-primary" type="submit" href="{{ route('role.index') }}">{{__('button.back')}}</a>
        </nav>
        <form action="{{ route('role.store') }}" method="post">
    @else
            <a class="navbar-brand">{{__('role.editARole')}}</a>
            <a class="btn btn-primary" type="submit" href="{{ route('role.index') }}">{{__('button.back')}}</a>
        </nav>
        <form action="{{ route('role.update', $role->id) }}"  method="post">
        @method('PUT')
    @endif
            @csrf
            @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
            @endif

            <div class="form-group">
                <label for="InputName">{{__('role.name')}}</label>
                @if(empty($role))
                <input type="text" class="form-control" id="InputName" name="name" value="{{ old('name') }}">
                @else
                <input type="text" class="form-control" id="InputName" name="name" value="{{ $role->name }}">
                @endif
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="add-button">
                <button type="submit" class="btn btn-primary btn-sm">{{__('button.save')}}</button>
            </div>
        </form>
    </div>
</div>
@endsection