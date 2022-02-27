@extends('layouts.admin_app')
@section('content')
          <div class="container-fluid">
           <form method="POST" action="{{ route('admin.category.store') }}">
               @csrf
                <div class="form-row">

                    <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="category name">
                    </div>



                    <div class="col">
                   <select class="form-control" name="parent_id" id="">
                           <option value="" disabled></option>

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
