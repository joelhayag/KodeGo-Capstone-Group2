<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\AppUser;

class Login extends Component
{

    public $username;
    public $password;

    public $error = null;

    public function login()
    {
        $user = AppUser::all()->where('email_address', '=', $this->username)->where('password', '!=', '');
        $pass = null;
        $id = null;
        if (count($user) > 0) {
            foreach($user as $p){
                $id = $p->id;
                $pass = $p->password;
            }
        }
        $user = AppUser::all()->where('mobile_number', '=', $this->username)->where('password', '!=', '');
        if (count($user) > 0) {
            foreach($user as $p){
                $id = $p->id;
                $pass = $p->password;
            }
        }

        if($pass != null){
            if (Hash::check($this->password, $pass)) {
                session()->put('longIn_user', $id);
                $this->error = null;
                return redirect('/');
            }else{
                $this->error = 'Incorrect password';
            }
        }else{
            session()->forget('longIn_user');
            $this->error = 'Account not found';
        }
    }
    public function render()
    {
        return view('livewire.login')->with('error', $this->error != null ? $this->error : null);
    }
}
