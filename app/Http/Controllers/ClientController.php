<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClientFormRequest;
use App\Http\Requests\UpdateClientForm;
use App\Models\Client;
use App\Models\ClientHistory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Validation\Rule as ValidationRule;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
  public function addClient(Client $client = null)
  {
    return view('add-client-page', compact('client'));
  }

  protected function createClient(AddClientFormRequest $request)
  {
    $client = Client::create([
      'name' => $request->name,
      'surname' => $request->surname,
      'phone' => $request->phone,
      'debt' => $request->debt
    ]);
    $id = $client->id;

    ClientHistory::create([
      'client_id' => $id,
      'money' => -$client->debt
    ]);




    FacadesSession::flash('addedClient', 'Клиент успешно создан.');

    return view('add-client-page')->with('showSuccessMessage', true);
  }


  protected function allClientsPage()
  {
    $clients = Client::all();
    return view('all-clients-page', compact('clients'));
  }


  protected function updateClient(Request $request)
  {
    $client = Client::find($request->id);

    $validate = $request->validate([
      'name' => 'required',
      'surname' => 'required',
      'phone' => [
        'required',
        Rule::unique('clients')->ignore($client->id)->where(function ($query) use ($client) {
          return $query->where('phone', '!=', $client->phone);
        })
      ],      'debt' => 'required|numeric|min:1000'
    ]);


    $client->update([
      'name' => $request->name,
      'surname' => $request->surname,
      'phone' => $request->phone,
      'debt' => $request->debt
    ]);


    FacadesSession::flash('success', 'Клиент успешно создан.');

    return view('main')->with('showSuccessMessage', true);
  }

  protected function clientHistoryPage($id)
  {
    FacadesSession::flash('clientID', $id);
    $client = Client::find($id);

    return view('client-hystory', compact('client'));
  }
}
