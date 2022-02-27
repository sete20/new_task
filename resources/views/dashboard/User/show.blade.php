@extends('layouts.admin_app')
@section('content')
        <div class="container-fluid">
  <div class="container mt-5">
      <div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Users</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ route('admin.user.create') }}" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Users</span></a>
					</div>
				</div>
			</div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">created at</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('admin.user.edit',$user) }}"  class="btn btn-danger"> edit</a></td>
                    <td><form action="{{ route('admin.user.destroy',$user) }}">
                    <button type="submit" class="btn btn-danger">delete</button>
                    </form></td>


                </tr>
            </tbody>
        </table>
        {{-- Pagination --}}

    </div>
                </div>
@endsection
