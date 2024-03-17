<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\ClientHistory;
use Livewire\Component;
use Livewire\WithPagination;

class AllClients extends Component
{
  use WithPagination;

  public $search;
  public $debt;
  public $clientID;
  public $openInputId = null;

  public function showInput($id)
  {
    $this->openInputId = $id;
  }

  public function closeInput($id)
  {
    $this->openInputId = '';
  }

  public function yourSubmitMethod($id)
  {
    $client = Client::find($id);
    $debt = $client->debt;
    if ($debt != $this->debt  and  isset($this->debt)) {
      $client->update([
        'debt' => $this->debt
      ]);
    }

    $this->closeInput($id);

    $this->reset('debt');
  }


  public function render()
  {
    $count = strlen($this->search);
    if ($count > 0) {
      $clients = Client::orWhere('name', 'like', '%' . $this->search . '%')
        ->orWhere('surname', 'like', '%' . $this->search . '%')
        ->orWhere('phone', 'like', '%' . $this->search . '%')
        ->orWhere('debt', 'like', '%' . $this->search . '%')
        ->orderBy('debt', 'DESC')
        ->simplePaginate(20);
    } else {
      $clients = Client::orderBy('debt', 'DESC')->Simplepaginate(20);
    }
    $sum = count($clients);



    return view('livewire.all-clients', compact('clients', 'sum'));
  }
}
