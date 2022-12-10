@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('home')}}" class="btn btn-primary" style="margin-bottom:20px">Go back</a>
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

                <div class="card-header">LUCKY BINGO</div>

                <div class="card-body">

                <form method="post" action="{{url('/store/ticket')}}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label><strong>Choose numbers:</strong></label><br>
                                @for($i=1; $i<=48; $i++)
                                    <label  style="width: 20%"><input type="checkbox" name="numbers[]" value="{{ $i }}" style="width: 10%">{{$i}}</label>
                                @endfor
                                @error('numbers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>  
                          
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" style="width:20%; float:left">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
        
                
        </div>
    </div>
</div>
</div>



@endsection