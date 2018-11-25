<?php

namespace App\Http\Controllers\Auth;

use App\Email;
use App\Info;
use App\Member;
use App\Premium;
use App\Rules\PasswordRule;
use App\Rules\TelRule;
use App\Tel;
use App\Token;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'    => 'required|string|min:2|max:20',
            'last_name'     => 'required|string|min:2|max:20',
            'tel'           => ['bail','required','min:10','max:10',new TelRule(),'unique:tels'],
            'address'       => 'nullable|string|min:10|max:100',
            'city'          => 'bail|required|int|exists:cities,id',
            'birth'         => 'bail|nullable|date|before:' . date('d-m-Y',strtotime("-18 years")),
            'token'         => 'required|min:20|exists:tokens,token',
            'name'          => 'bail|required|string|max:25|unique:members',
            'email'         => 'required|string|email|max:80|unique:emails',
            'password'      => ['bail','required','string','min:6','max:18','confirmed',new PasswordRule()],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // user
        $user = User::create([
            'login' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
        // info
        $info = Info::create([
            'last_name'     => $data['last_name'],
            'first_name'    => $data['first_name'],
            'birth'         => $data['birth'],
            'address'       => $data['address'],
            'city_id'       => $data['city']
        ]);
        // email
        $info->emails()->create(['email'  => $data['email'],'default'   =>  true]);
        // tel
        $info->tels()->create(['tel'  => $data['tel'],'default' =>  true]);
        // token
        $token = Token::where('token',$data['token'])->first();
        // premium
        $premium = Premium::create([
            'limit' => gmdate("Y-m-d",strtotime("+$token->range days")),
            'category_id'   => $token->category_id,
            'status_id'     => 2
        ]);
        // members
        $member = $premium->member()->create([
            'name'      => $data['name'],
            'info_id'   => $info->id,
            'user_id'   => $user->id,
            'company_id'=> $token->company_id
        ]);
        $member->update(['slug'=> str_slug($data['name'] . $member->id)]);
        // activate company
        if($token->category->category == 'pdg'){
            $token->company->activate();
        }
        $token->delete();

        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $page = '';
        return view('auth.register',compact('page'));
    }
}
