<?php namespace App\Http\Controllers\Auth;
use Hash;
use Session;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller {

    /**
     * the model instance
     * @var User
     */
    protected $user;
    /**
     * The Guard implementation.
     * @var Authenticator
     */
    protected $auth;

    protected $account;
    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator  $auth
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->account=new User;
        $this->middleware('guest', ['except' => ['getLogout']]);
    }

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
        //code for registering a user goes here.
        $this->account->email=$request["email"];
        $this->account->password=Hash::make($request["password"]);
        $this->account->login_count=0;
        $this->account->save();
        $this->auth->login($this->user);
        return redirect('/dash-board');
    }

    /**
     * Show the application login form.
     * @return Response
     */
    public function getLogin(Request $url)
    {
        $url=$url->get('url');
        return view('auth.login',compact('url'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
        if ($this->auth->attempt($request->only('email', 'password'),true))
        {
            //update login-count here
            $this->account=User::where('email','=',$request['email'])->first();
            $login_count=$this->account->login_count;
            $this->account->login_count=$login_count+1;
            $this->account->save();
            //create a session
            Session::put('email', $request['email']);
            $this->account=Profile::where('email','=',$request['email'])->first();

            if((string)$this->account==null){//if the user has no profile yet
                return redirect('/profile/create');
            }
            else{
                if(is_null($request->get('url')))
                    return redirect('/');
                else
                    return redirect($request->get('url'));
            }
        }
        return redirect('/login')->withErrors([
            'email' => 'The credentials you entered did not match our records. Try again?',
        ])->withInput();
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout(Request $input)
    {
        $url=$input->get('url');
        $this->auth->logout();
        Session::flush();
        if(is_null($input)){
            return redirect('/');
        }
        return redirect($url);
    }

}