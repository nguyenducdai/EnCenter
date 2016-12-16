<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use Validator;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
	use AuthenticatesUsers;


    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
     protected $redirectTo = 'cp/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
   public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin () {
    	return view('Admin.Auth.login');
    }
    public function postLogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            //$this->handleUserWasAuthenticated($request, $throttles);
            $redirectTo = 'cp/home';
            return redirect($redirectTo);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

       protected function isUsingThrottlesLoginsTrait()
    {
        return in_array(
            ThrottlesLogins::class, class_uses_recursive(static::class)
        );
    }
     protected function getCredentials(Request $request)
    {
        return $request->only($this->loginUsername(), 'password');
    }
public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }
 protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

        return redirect()->intended($this->redirectPath());
    }


    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }


}
