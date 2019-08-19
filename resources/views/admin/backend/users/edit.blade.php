@extends('admin.backend.users.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-lg-2 float-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
            </div>
            <div class="col-lg-12 float-left">
                <h2>Edit User</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('user.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

        <div class="row">
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $data->name }}">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Email:</strong>
                    <input type="email" name="email" value="{{ old('email')!==null ? old('email') : $data->email }}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Username Instagram :</strong>
                    <input type="text" name="username_instagram" value="{{ old('username_instagram')!==null ? old('username_instagram') : $data->username_instagram }}" class="form-control" placeholder="username instagram">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Password:</strong>
                    <input type="password" name="password" value="" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="col-md-7">
                <strong>Confirmed Password:</strong>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select multiple="true" class="form-control select2" data-placeholder="Roles" name="role_id[]">
                        <option></option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </form>
@endsection
