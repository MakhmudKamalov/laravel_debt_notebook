<div>
  <br>
  <h1>Profile: {{ $user['surname'].' '.$user['name'] }}</h1>
  <br>
  @if($showAlert)
    <div class="alert alert-success" style="text-align: center" role="alert" wire:poll.1000ms="hideAlert">
        Profile updated successfuly!!!
    </div>
@endif


    <div class="row">
    <div class="col"></div>
    <div class="col">
      <form wire:submit.prevent="saveContact">        
        <label for="">Name</label>
        <input type="text" wire:model="name"   class="form-control  @error('name')
        is-invalid
        @enderror">  @error('name')  <span class="error">{{ $message }}</span>   @enderror 
        <label for="">Surname</label>
        <input type="text" wire:model="surname"   class="form-control @error('surname')
        is-invalid
        @enderror"> @error('surname')  <span class="error">{{ $message }}</span>   @enderror
        <label for="">Phone</label>
        <input type="number" wire:model="phone"   class="form-control @error('phone')
        is-invalid
        @enderror">  @error('phone')  <span class="error">{{ $message }}</span>   @enderror
        <label for="">Login</label>
        <input type="text" wire:model="login"    class="form-control @error('login')
        is-invalid
        @enderror">  @error('login')  <span class="error">{{ $message }}</span>   @enderror
        <label for="">Password</label>
        <input type="text" wire:model="password"  placeholder="*Password" class="form-control"><br>
        
        <button class="btn btn-success" type="submit">Save</button>
      </form>
    </div>
    <div class="col"></div>
  </div>
  <script>
    document.addEventListener('livewire:load', function () {
        setTimeout(function () {
            Livewire.emit('hideAlert');
        }, 5000);
    });
</script>

</div>
