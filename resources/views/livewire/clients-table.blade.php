<div>
  <div class="bd-example">
    <table class="table table-bordered">
      <input type="search" wire:model.live="search" class="form-control" style="width: 30%; float: right; " placeholder="Search client...">
      <br>
    
      <h4>Count: {{ $sum }}</h4>
        <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Phone</th>
        <th scope="col">Debt</th>
        <th scope="col">Payment</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i=1;
      @endphp
      @foreach ($clients as $v)
      <tr>
        <td scope="row">{{ $i++ }}</td>
        <td><a href="{{ Route('client-history',['id'=>$v['id']]) }}" style="text-decoration: none; color:black">{{ $v['name'] }}</a></td>
        <td>{{ $v['surname'] }}</td>
        <td>{{ $v['phone'] }}</td>
        <td><b>{{ $v['debt'] }}</b></td>
        <td>
          @if ($tolewInput == $v['id'])
          <form wire:submit.prevent="tolewSubmit({{ $v['id'] }})">
          <input type="number" max="{{ $v['debt'] }}" wire:model='tolewDebt' class="form-control d-inline" style="width: 150px" placeholder="Qariz tolew" name="" id=" ">
          <button class="btn btn-success btn-sm d-inline ml-2"  type="submit">Tolew</button>
          <button wire:click="tolewClose({{ $v->id }})" class="btn btn-primary btn-sm d-inline ml-2">Close</button>
          </form>
          @elseif ($qarizInput == $v['id'])
          <form wire:submit.prevent="qarizSubmit({{ $v['id'] }})">
          <input type="number" max="{{ $v['debt'] }}" wire:model='qarizDebt' class="form-control d-inline" style="width: 150px" placeholder="Qariz asiriw" name="" id=" ">
          <button class="btn btn-warning btn-sm d-inline ml-2"   type="submit">Asiriw</button>
          <button wire:click="qarizClose({{ $v->id }})" class="btn btn-primary btn-sm d-inline ml-2">Close</button>
          </form>
          @else
          <button class="btn btn-sm btn-success" wire:click="tolewShow({{ $v['id'] }})">
            <i class="fas fa-edit">Tolew</i> 
        </button>
        <button class="btn btn-sm btn-primary" wire:click="qarizShow({{ $v['id'] }})">
            <i class="fas fa-trash">Qarzga</i> 
        </button>
          @endif
        </td>
        <td>
          <button class="btn btn-sm btn-info" wire:click="editClient({{ $v['id'] }})">
            <i class="fas fa-edit">Edit</i> 
        </button>
        <button class="btn btn-sm btn-danger" wire:click="deleteClient({{ $v['id'] }})">
            <i class="fas fa-trash">Delete</i> 
        </button>
        </td>
      </tr>
      @endforeach
    </tbody>
    {{ $clients->links() }}
  
    </table>
    
  </div></div>
  <!-- resources/views/livewire/modal-component.blade.php -->


