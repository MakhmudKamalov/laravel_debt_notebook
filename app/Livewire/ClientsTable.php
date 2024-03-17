<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\ClientHistory;
use Livewire\Component;
use Livewire\WithPagination;

class ClientsTable extends Component
{
  use WithPagination;

  public $search;
  public $tolewInput = null;
  public $qarizInput = null;
  public $tolewDebt;
  public $qarizDebt;

  public function tolewShow($id)
  {
    $this->tolewInput = $id;
    $this->qarizInput = '';
  }

  public function tolewClose($id)
  {
    $this->tolewInput = '';
  }

  public function qarizShow($id)
  {
    $this->qarizInput = $id;
    $this->tolewInput = '';
  }
  public function qarizClose($id)
  {
    $this->qarizInput = '';
  }

  public function tolewSubmit($id)
  {
    $client = Client::find($id);
    $debt = $client->debt;
    if ($this->tolewDebt > 0 and $this->tolewDebt <= $debt) {
      $sum = $debt - $this->tolewDebt;
      $client->update([
        'debt' => $sum
      ]);
      ClientHistory::create([
        'client_id' => $id,
        'money' => +$this->tolewDebt
      ]);
      $this->tolewClose($id);
      $this->reset('tolewDebt');
    }
  }

  public function qarizSubmit($id)
  {
    $client = Client::find($id);
    $debt = $client->debt;
    if ($this->qarizDebt > 0) {
      $sum = $debt + $this->qarizDebt;
      $client->update([
        'debt' => $sum
      ]);
      ClientHistory::create([
        'client_id' => $id,
        'money' => -$this->qarizDebt
      ]);
      $this->qarizClose($id);
      $this->reset('qarizDebt');
    }
  }

  public function editClient($id)
  {
    return redirect()->route('add-client', ['client' => $id]);
  }


  public function deleteClient($id)
  {
    $client = Client::find($id);
    $debt = $client->debt;
    $client->update([
      'debt' => 0
    ]);

    ClientHistory::create([
      'client_id' => $client->id,
      'money' => +$debt
    ]);
  }


  public function render()
  {
    $count = strlen($this->search);
    if ($count > 0) {
      $clients = Client::where(function ($query) {
        $query->where('name', 'like', '%' . $this->search . '%')
          ->orWhere('surname', 'like', '%' . $this->search . '%')
          ->orWhere('phone', 'like', '%' . $this->search . '%')
          ->orWhere('debt', 'like', '%' . $this->search . '%');
      })
        ->where('debt', '>', 0)
        ->orderBy('debt', 'DESC')
        ->simplePaginate(20);
    } else {
      $clients = Client::where('debt', '>', 0)->orderBy('debt', 'DESC')->Simplepaginate(20);
    }
    $sum = count($clients);


    return view('livewire.clients-table', compact('clients', 'sum'));
  }
}
