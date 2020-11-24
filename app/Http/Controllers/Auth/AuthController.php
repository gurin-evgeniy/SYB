<?php namespace App\Http\Controllers\Auth;

use App\Code;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CodeController;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

//  use AuthenticatesAndRegistersUsers;

    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'lgn_usuario' => 'required|min:3|alpha_dash', 'lgn_senha' => 'required|min:6',
        ]);

        $credentials = [
            'lgn_usuario' => $request->input('lgn_usuario'),
            'password' => $request->input('lgn_senha'),
            'lgn_ativo' => 1
        ];

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect()->intended('/admin');
        }

        return redirect('/auth/login')
            ->withInput($request->only('lgn_usuario', 'remember'))
            ->withErrors([
                'Usuário e/ou senha inválidos.',
            ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }
}

protected function validator(array $data)
{
    return Validator::make($data, [
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
    ]);
}

public function postRegister(Request $request)
{
    $validator = $this->validator($request->all());
    if ($validator->fails()) {          
        throwValidationException($request, $validator);
    };
    $user = $this->create($request->all());
    //создаем код и записываем код
    $code = CodeController::generateCode(8);
    Code::create([
        'user_id' => $user->id,
        'code' => $code,
    ]);
    //Генерируем ссылку и отправляем письмо на указанный адрес
    $url = url('/').'/auth/activate?id='.$user->id.'&code='.$code;      
    Mail::send('emails.registration', array('url' => $url), function($message) use ($request)
    {          
        $message->to($request->email)->subject('Registration');
    });
    
    return 'Регистрация прошла успешно, на Ваш email отправлено письмо со ссылкой для активации аккаунта';
}