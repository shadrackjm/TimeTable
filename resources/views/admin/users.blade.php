@extends('layouts/admin-layout')

@section('space-work')
<div class="pagetitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">manage users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if (Session::has('success'))
    <div class="alert alert-success p-2">{{Session::get('success')}}</div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
    @endif
    <div class="card">
        <div class="card-header">Manage all users</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Registered at</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->role == 2)
                                <td>ADMIN</td>
                            @endif
                            @if ($user->role == 1)
                                <td>TEACHER</td>
                            @endif
                            @if ($user->role == 0)
                                <td>STUDENT</td>
                            @endif
                            <td>{{ $user->created_at }}</td>
                            <td><a href="/edit/user/{{$user->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                            @if ($user->role == 2)
                                <td></td>
                            @else
                            <td>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
