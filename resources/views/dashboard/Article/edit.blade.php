@extends('layouts.admin_app')
@section('content')
          <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.article.update',$article) }}">
         @method('post')
         @csrf
         <div class="form-row">
                    <div class="col">
                    <input type="text" name='title' class="form-control" value="{{ $article->title }}" placeholder="title">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="details" value="{{ $article->details }}" placeholder="details">
                    </div>
                                        <div class="col">
                    <input type="file" accept="image/*" class="form-control" name="img" >
                    </div>


                    <div class="col">
                   <select class="form-control" name="category_id" id="">
                     @forelse ($categories as $category)

                           <option value="{{ $category->id }}"
      @if($category->id == $article->category_id)
                     selected

                      @endif
                                >{{ $category->name }}</option>
                     @empty
                           <option value="" disabled>no categories found</option>
                     @endforelse
                   </select>
                    </div>

                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>
@endsection
