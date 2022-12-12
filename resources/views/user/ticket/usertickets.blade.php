<table class="table">
  <thead>
    <tr>
      <th>Ticket</th>
      <th>Win</th>
      <th>Date</th>
     
     
    </tr>
  </thead>
  <tbody>
    @if(count($tickets)>0)
   
        @foreach($tickets as $ticket)
        <tr>
        <td>@foreach($ticket['numbers'] as $num)
               <span class="circle"> {{ $num }} </span>
            @endforeach</td>
            <td>
              @foreach($lucky as $luck)
                @if($ticket->id==$luck->ticket_id)
                  @foreach($luck->numbers as $num)
                    <span class="circle2"> {{ $num }} </span>
                  @endforeach
                @endif  

              @endforeach  
          
          </td>
        <td>{{$ticket->created_at->format('d.m.Y H:i:s')}}</td>
        </tr>
        @endforeach
     @else
     <td>No tickets found.</td> 
     @endif  
    
  </tbody>   
  
</table>
{{$tickets->links()}}

<style>
  .circle{
      border-radius: 50%;
      width: 36px;
      height: 36px;
      padding: 8px;
      background: #fff;
      border: 1px solid #666;
      margin-right:3px;
      text-align: center;
      font-weight:bold;
  }
  .circle2{
      border-radius: 50%;
      width: 36px;
      height: 36px;
      padding: 8px;
      background: #fff;
      border: 1px solid #666;
      margin-right:3px;
      text-align: center;
      font-weight:bold;
      background: #C6F0DD;
  }


</style>