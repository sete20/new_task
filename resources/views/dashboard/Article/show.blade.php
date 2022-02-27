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
                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td><a href="{{ route('admin.article.show',$article) }}">{{ $article->title }}</a></td>
                    <td>{{ $article->details }}</td>
                    <td><img src="{{ asset('storage/'.$article->img) }}" width="50" height="50" alt=""></td>
                    <td>{{ $article->category->name }}" width="50" height="50" alt="">}}</td>

                    <td>{{ $article->created_at }}</td>
                    <td><a href="{{ route('admin.article.edit',$article) }}" class="btn  btn-success">edit</a></td>
                    <td>

                          <form id="logout-form" action="{{ route('admin.article.destroy',$article) }}" method="DELETE" class="">
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>
                        </form></td>

                </tr>
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
        </div>
    </div>
                </div>
@endsection
