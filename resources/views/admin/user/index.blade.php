@extends('layouts.master')
@section('content')
<div class="col-md-10 content">
    <div class="container">
        <div class="card bg-light">
            <div class="container">
                <nav class="navbar justify-content-between">
                    <a class="navbar-brand">{{__('user.userList')}}</a>
                    <div>
                        <a class="btn btn-default btn-outline-dark" type="submit" href="{{ route('formSendMail') }}">
                            {{__('button.sendMail')}}
                        </a>
                        <a class="btn btn-primary" type="submit" href="{{ route('user.create') }}">
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
                            <th style="width: 10%;" scope="col">{{__('user.id')}}</th>
                            <th style="width: 20%;" scope="col">{{__('user.user')}}</th>
                            <th style="width: 20%;" scope="col">{{__('user.name')}}</th>
                            <th style="width: 30%;" scope="col">{{__('user.email')}}</th>
                            <th style="width: 20%;" scope="col">{{__('user.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(!empty($users))
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->id}}
                            </td>
                            <td style="width:50px" id="user">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $user->id) }}">{{__('button.edit')}}</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('user.show', $user->id) }}">{{__('button.info')}}</a>
                                <form class="d-inline" method="post" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Do you want to delete this user?')" class="btn btn-danger btn-sm">{{__('button.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $users->links() }}
                </div>
            </div> 
        </div> 
    </div>
</div>

@endsection
