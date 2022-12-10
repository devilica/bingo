@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('/admin/home')}}" class="btn btn-primary" style="margin-bottom:20px">Go back</a>
            <div class="card">
            @if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
                 @elseif(session()->has('error'))
					<div class="alert alert-danger">
						{{ session()->get('error') }}
					</div>    

				@endif

                <div class="card-header">Add new location and choose administrator</div>

                <div class="card-body">

                <form method="POST" action="{{ url('/store/location') }}">
                    @csrf
                    <div class="form-group col-md-6">
                    <label for="admin_id">Choose admin</label>

                            <select class="form-control" id="admin_id" name="admin_id">
                                <option value="zero">Choose admin</option>
                                @foreach($admins as $admin)
                                    <option value="{{$admin->id}}">{{$admin->name}} {{$admin->email}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                    <div class="form-group col-md-6" style="margin-left: 10px">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>

                </div>
        
                
        </div>
    </div>
</div>
</div>



@endsection