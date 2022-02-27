@extends('layouts.admin_app')
@section('content')
        <div class="container-fluid">
  <div class="container mt-5">
      <div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Article</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ route('admin.article.create') }}" class="btn btn-success" ><i class="fa fa-plus"></i> <span>Add New Article</span></a>
					</div>
				</div>
			</div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">titel</th>
                    <th scope="col">details</th>
                    <th scope="col">img</th>
                    <th scope="col">category</th>

                    <th scope="col">created at</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach($articles as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td><a href="{{ route('admin.article.show',$data) }}">{{ $data->title }}</a></td>
                    <td>{{ $data->details }}</td>
                    <td><img src="{{ asset('storage/'.$data->img) }}" width="50" height="50" alt=""></td>
      <td>{{ $data->category->name }}</td>

                    <td>{{ $data->created_at }}</td>
                    <td><a href="{{ route('admin.article.edit',$data) }}" class="btn  btn-success">edit</a></td>
                    <td>
                          <form id="logout-form" action="{{ route('admin.article.destroy',$data) }}" method="post" class="">
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>
                        </form></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $articles->links() !!}
        </div>
    </div>
                </div>
@endsection
