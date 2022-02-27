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
                @foreach($Users as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->created_at }}</td>
              <td><a href="{{ route('admin.user.edit',$data) }}"  class="btn btn-primary"> edit</a></td>
                    <td><form action="{{ route('admin.user.destroy',$data) }}" method="post">
                        @csrf
                    <button type="submit" class="btn btn-danger">delete</button>
                    </form></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $Users->links() !!}
        </div>
    </div>
                </div>
@endsection
