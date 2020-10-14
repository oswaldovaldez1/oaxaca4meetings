<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Role;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{

    public function index(){
        return user::with('roles')->get();//all();
    }

    public function getUser($id){
        //return user::find($id)->with('roles')->first();//all();
        return user::with('roles')->find($id);//all();
    }

    public function signup(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);



        $user = new User();
        $user->name = $request->name;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->aboutMe=$request->aboutMe;
        $user->userImg=$request->userImg;
        $user->nivelAcceso=json_encode($request->nivelAcceso);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status=$request->status;


        $user->save();
        $user->roles()->attach(Role::where('name', $request->tipoUser)->first());
        return response()->json([
            'message' => 'Successfully created user!',
            'user'=>$user
        ], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        if($user->status===null || $user->status===false){
            return response()->json([
            'message' => 'Unauthorized'
            ], 401);
        }
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'id' => $user->id,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'lavel'=>json_decode($user->nivelAcceso,true),
            'name'=>$user->firstName.' '.$user->lastName,
            'image'=>$user->userImg,
            'email'=>$user->email,
            'rol'=>$user->roles()->first(),
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
    public function update($id,Request $request){

        $user = user::find($id);
        if($request->password!=null){
            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->aboutMe=$request->aboutMe;
        $user->userImg=$request->userImg;
        $user->nivelAcceso=json_encode($request->nivelAcceso);
        $user->status=$request->status;
        if($user->update()){
            return response()->json([
            'message' => 'Usuario Actualizado',
            'user'=>$user
            ], 201);
        }
        return response()->json([
        'message' => 'Sucedio algo',
        ], 401);

    }
    public function setImage(Request $request)
    {
        $imagenes = $request->allFiles();
        $user = User::find($request->header('id'));

        if(File::exists(public_path($user->userImg)) && $user->userImg!='/images/icono-oaxaca4meeting.png') {
            File::delete(public_path($user->userImg));
        }
        foreach ($imagenes['name'] as $img) {
            $nombre = Str::lower(Str::random(2)) . time() . $img->getClientOriginalName();
            $img->move('assets/storage/user/', $nombre);
            $user->userImg='/assets/storage/user/'.$nombre;
            $user->update();
        }
        return response()->json(['message' => 'archivo subido con exito', 'user' => $user], 200, [],
        JSON_UNESCAPED_SLASHES);
    }
    public function deleteUser($id){

        $user = User::find($id);

        if(File::exists(public_path($user->userImg)) && $user->userImg!='/images/icono-oaxaca4meeting.png') {
            File::delete(public_path($user->userImg));
        }
        if($user->delete()){
            return response()->json(['message' => 'Usuario Eliminado',], 200, [],
            JSON_UNESCAPED_SLASHES);
        }
        else{
            return response()->json(['message' => 'No se pudo eliminar el usuario',], 401, [],
            JSON_UNESCAPED_SLASHES);
        }
    }
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'

        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
