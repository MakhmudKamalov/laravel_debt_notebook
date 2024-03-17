<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileEdit extends Component
{
  public $name;
  public $surname;
  public $phone;
  public $login;
  public $password;
  public $client;
  public $id;


  public function mount(Request $request)
  {
    $user = $request->user();
    $this->client = $user;
    $this->id = $user['id'];
    $this->name = $user['name'];
    $this->surname = $user['surname'];
    $this->phone = $user['phone'];
    $this->login = $user['login'];
  }
  protected $rules = [
    'name' => 'required',
    'surname' => 'required',
    'phone' => 'required',
    'login' => 'required'
    // 'password' => 'required|min:5'
  ];
  public $showAlert = false;
  public function showAlert()
  {
    $this->showAlert = true;
  }

  public function hideAlert()
  {
    $this->showAlert = false;
  }



  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function saveContact()
  {
    $validatedData = $this->validate();

    $count = strlen($this->password);
    if (isset($this->password) and $count > 4) {
      $this->client->update([
        'name' => $validatedData['name'],
        'surname' => $validatedData['surname'],
        'phone' => $validatedData['phone'],
        'login' => $validatedData['login'],
        'password' => $this->password
      ]);
    } else {
      $this->client->update([
        'name' => $validatedData['name'],
        'surname' => $validatedData['surname'],
        'phone' => $validatedData['phone'],
        'login' => $validatedData['login'],
      ]);
    }
    $this->name = $validatedData['name'];
    $this->surname = $validatedData['surname'];
    $this->phone = $validatedData['phone'];
    $this->login = $validatedData['login'];
    $this->reset('password');
    $this->showAlert();
  }
  public function render(Request $request)
  {
    $user = ['name' => $this->name, 'surname' => $this->surname];

    return view('livewire.profile-edit', compact('user'));
  }
}
