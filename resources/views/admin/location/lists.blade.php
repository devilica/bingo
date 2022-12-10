@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{url('/admin/home')}}" class="btn btn-primary" style="margin-bottom:20px">Go back</a>


            <div class="card">
            <div class="card-header">Add location</div>


                <table class="table">
                <thead>
                    <tr>
                    <th>Admin</th>
                    <th>Admin email</th>
                    <th>Location</th>
                    <th>Date</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    @if(count($lists)>0)
                
                        @foreach($lists as $list)
                        <tr>
                        <td>{{$list->admin->name}}</td>
                        <td>{{$list->admin->email}}</td>
                        <td>{{$list->location}}</td>
                        <td>{{$list->created_at->format('d.m.Y H:i:s')}}</td>
                        </tr>
                        @endforeach
                    @else
                    <td>No locations found.</td> 
                    @endif  
                    
                </tbody>   
                
                </table>
                {{$lists->links()}}


                </div>
            <br>
           

        </div>
    </div>
</div>
@endsection
