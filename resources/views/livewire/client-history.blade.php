<div>

  <div class="bd-example">
    <table class="table table-sm" border="1">
      <input type="search" wire:model.live="search" class="form-control" style="width: 30%; float: right; " placeholder="Search date...">
      <br>
      <h4>Count: {{ $sum }}</h4>
{{-- <h1>{{ $search }}</h1>
<h1>{{ $clientID }}</h1>
<h1>{{ $count }}</h1> --}}
        <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">Money</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i=1;
      @endphp
      @foreach ($history as $v)
      <tr>
        <td scope="row">{{ $i++ }}</td>
        <td>{{ $v['money'] }}</td>
        <td>{{ $v['created_at'] }}</td>
      </tr>
      @endforeach
    </tbody>
    {{ $history->links() }}
  
    </table>
    
  </div></div>


