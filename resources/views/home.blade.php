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

                <div class="card-header">    Welcome to BINGO!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            
                  <a href="{{url('/create/ticket')}}"  class="btn btn-primary btn-lg">Create a ticket</a>

                </div>
        

            </div>
            <br>
            <div class="card">
            <div class="card-header">Your tickets</div>

                @include('user.ticket.usertickets')
            </div>

        </div>
    </div>
</div>
@endsection
