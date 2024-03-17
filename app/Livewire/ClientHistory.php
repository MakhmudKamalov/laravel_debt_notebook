<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\ClientHistory as ModelsClientHistory;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class ClientHistory extends Component
{

  use WithPagination;
  public $search;
  protected $ID;



  public function render()
  {
    $this->ID = Session::get('clientID');
    $count = strlen($this->search);
    $clientID = $this->ID;
    $search = $this->search;
    if ($count > 0 and isset($count)) {
      $history = ModelsClientHistory::where('client_id', $clientID)
        ->where(function ($query) use ($search) {
          $query->where("created_at", "like", "%" . $search . "%")
            ->orWhere("money", "like", "%" . $search . "%");
        })
        ->orderBy('created_at', 'ASC')
        ->simplePaginate(20);
      // $this->reset('search');
    } else {
      $id = Session::get('clientID');
      $history = ModelsClientHistory::where('client_id', $id)->orderBy('created_at', 'ASC')->simplePaginate(20);
    }

    $sum = count($history);
    return view('livewire.client-history', compact('history', 'sum', 'clientID', 'count'));
  }
}
