@extends('layouts.admin_app')
@section('content')
          <div class="container-fluid">
           <form method="POST" action="{{ route('admin.user.update',$user) }}">
        @csrf
@method('PUT')
                <div class="form-row">

                    <div class="col">
                    <input type="text" class="form-control" name="name"  value="{{ $user->name }}"placeholder=" name">
                    </div>

       <div class="col">
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder=" email">
                    </div>

                    <div class="col">
                        <input type="password"  class="form-control" name="password">
                        <input type="password"  class="form-control" name="password_confirmation">

                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>
        </div>
@endsection
