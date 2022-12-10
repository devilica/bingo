@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{url('/admin/home')}}" class="btn btn-primary" style="margin-bottom:20px">Go back</a>


            <div class="card">
            <div class="card-header">All tickets</div>


                <table class="table">
                <thead>
                    <tr>
                    <th>User</th>
                    <th>Combination</th>
                    <th>Date</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    @if(count($lists)>0)
                
                        @foreach($lists as $list)
                        <tr>
                        <td>{{$list->user->name}}</td>
                        <td>@foreach($list['numbers'] as $num)
                            <span> {{ $num }} </span>
                            @endforeach</td>
                        <td>{{$list->created_at->format('d.m.Y H:i:s')}}</td>
                        </tr>
                        @endforeach
                    @else
                    <td>No tickets found.</td> 
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
