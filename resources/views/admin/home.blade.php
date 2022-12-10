@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                <div class="card-header">    Welcome ADMIN</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{url('/create/location')}}" class="btn btn-primary" style="width:30%; margin:0.5px;">Add location </a><br><br>
                    <a href="{{url('/show/locations')}}" class="btn btn-primary" style="width:30%;   margin:0.5px;">See locations </a><br><br>
                    <a href="{{url('/show/tickets')}}" class="btn btn-primary" style="width:30%;   margin:0.5px;">See all tickets </a>

                </div>
        

            </div>
            <br>
           

        </div>
    </div>
</div>
@endsection
