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
                    @if($category->parent != null)
                    <th scope="col">parent</th>
                    @endif
                    <th scope="col">delete</th>

                </tr>
            </thead>
            <tbody>
                <tr>
            <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                       @if($category->parent != null)
                    <td>{{ $category->parent->name }}</td>

                              @endif
                    <td><a href="{{ route('admin.category.edit',$category) }}" class="btn btn-primary">edit</a></td>
                    <td><form action="{{ route('admin.category.destroy',$category)}}" method="POST">
                        @csrf
                    <button type="submit"  class="btn btn-danger">delete</button>
                    </form></td>

                </tr>


                </tr>
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
        </div>
    </div>
                </div>
@endsection
