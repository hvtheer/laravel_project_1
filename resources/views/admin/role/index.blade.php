@extends('layouts.master')
@section('content')
<div class="col-md-10 content">
    <div class="container">
        <div class="card bg-light">
            <div class="container">
                <nav class="navbar justify-content-between">
                    <a class="navbar-brand">{{__('role.roleList')}}</a>
                    <div>
                        <a class="btn btn-primary" type="submit" href="{{ route('role.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                            {{__('button.addNew')}}
                        </a>
                    </div>
                </nav>
                <table class="table table-hover table-bordered bg-white">
                    <thead>
                        <tr>
                            <th style="width: 20%;" scope="col">{{__('role.id')}}</th>
                            <th style="width: 20%;" scope="col">{{__('role.name')}}</th>
                            <th style="width: 20%;" scope="col">{{__('role.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($roles))
                        @foreach($roles as $role)
                        <tr>
                            <td>
                                {{$role->id}}
                            </td>
                            <td>
                                {{$role->name}}
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('role.edit', $role->id) }}">{{__('button.edit')}}</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('role.show', $role->id) }}">{{__('button.info')}}</a>
                                <form class="d-inline" method="post" action="{{ route('role.destroy', $role->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Do you want to delete this role?')" class="btn btn-danger btn-sm">{{__('button.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $roles->links() }}
                </div>
            </div> 
        </div> 
    </div>
</div>

@endsection
