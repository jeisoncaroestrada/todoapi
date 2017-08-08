<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;
use JWTAuthException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\LoginForm;
use App\Http\Requests\SignupForm;
use Lang;
class UserController extends Controller
{   
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    /**
     * Crear un nuevo usuario
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(SignupForm $request)//se usa formulario de validación
    {
        //Guarda el registro en la base de datos
        User::create([
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password'))
        ]);
        //Retorna mensaje de éxito según el idioma seleccionado
        return response()->json(['success'=>Lang::get('auth.success', ['email' => $request->get('email')])], 200);
    }
    
    public function login(LoginForm $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['invalid_email_or_password'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['user' => $user['email']]);
    }
}  
