<?php

namespace User\API\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Pluma\Controllers\Controller;
use Pluma\Support\Auth\Traits\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Redirect path upon successful login.
     *
     * @var string
     */
    protected $redirectPath = '/admin/dashboard';

    /**
     * Where to redirect users on failed login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Redirect path upon successful logout.
     *
     * @var string
     */
    protected $logoutPath = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth.guest', ['except' => 'logout']);

        $this->logoutPath = config('path.logout', $this->logoutPath);

        $this->redirectPath = config('path.dashboard', $this->redirectPath);

        $this->redirectTo = config('path.login', $this->redirectTo);
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return $this->redirectPath;
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($this->logoutPath);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if ($this->guard()->attempt(
            [$this->username() => $request->username, 'password' => $request->password], $request->has('remember')
        )) {
            return true;
        }

        if ($this->guard()->attempt(
            ['username' => $request->username, 'password' => $request->password], $request->has('remember')
        )) {
            return true;
        }

        if ($this->guard()->attempt(
            ['email' => $request->username, 'password' => $request->password], $request->has('remember')
        )) {
            return true;
        }

        return false;
    }
}
