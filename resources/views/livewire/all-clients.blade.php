<div>
  <div class="bd-example">
    <table class="table table-sm" border="1">
      <input type="search" wire:model.live="search" class="form-control" style="width: 30%; float: right; " placeholder="Search client...">
      <br>
    {{ $debt }}
    {{ $clientID }}
      <h4>Count: {{ $sum }}</h4>
        <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Phone</th>
        <th scope="col">Add debt</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i=1;
      @endphp
      @foreach ($clients as $v)
      <tr>
        <td scope="row">{{ $i++ }}</td>
        <td>{{ $v['name'] }}</td>
        <td>{{ $v['surname'] }}</td>
        <td>{{ $v['phone'] }}</td>
        <td> 
    
          <div>
            @if($openInputId === $v->id)
                <form wire:submit.prevent="yourSubmitMethod({{ $v['id'] }})">
                  {{-- <input type="hidden" name="" value="{{ $v['id']}}" wire:model.live="clientID" > --}}
                  <input type="number" wire:model='debt' class="form-control d-inline" style="width: 150px" placeholder="{{ $v['debt'] }}" name="" id=" ">
                  <button class="btn btn-success btn-sm d-inline ml-2"  type="submit">Send</button>
                  <button wire:click="closeInput({{ $v->id }})" class="btn btn-primary btn-sm d-inline ml-2">Close</button>
                                  </form>
@else
<button wire:click="showInput({{ $v->id }})" class="btn btn-primary btn-sm">Add</button>

                @endif
        </div>
        
        </td>
      </tr>
      @endforeach
    </tbody>  
    {{ $clients->links() }}
  
    </table>
    
  </div></div>


