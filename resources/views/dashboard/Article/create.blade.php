@extends('layouts.admin_app')
@section('content')
        <div class="container-fluid">
           <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.article.store') }}">
            @csrf
            <div class="form-row">
                    <div class="col">
                    <input type="text" name='title' class="form-control" placeholder="title">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="details" placeholder="details">
                    </div>
                                        <div class="col">
                    <input type="file" accept="image/*" class="form-control" name="img" >
                    </div>


                    <div class="col">
                   <select class="form-control" name="category_id" id="">
                     @forelse ($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @empty
                           <option value="" disabled>no categories found</option>
                     @endforelse
                   </select>
                    </div>

                    <button type="submit" class="btn btn-primary">create</button>
                </div>
            </form>
        </div>
@endsection
