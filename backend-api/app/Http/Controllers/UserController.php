<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*'password' => bcrypt($request['password']);
    /**
     * Show a list of all of the application's users.
     *
     * @return JsonResponse
     */
    public function all()
    {
        Log::info('Retrieving all user profiles');
        return response()->json(User::with('boards')->get());
    }

     /**
     * Create a new board instance.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $userValidator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string','max:255'],
            'username' => ['required', 'string','max:255'],
            'first_name' => ['required', 'string','max:255'],
            'last_name' => ['required', 'string','max:255']
            ]);
          
            
        if($userValidator->fails()) {
            $errors = $userValidator->errors()->getMessages();
            $code = Response::HTTP_NOT_ACCEPTABLE; // 406
            return response()->json(['error' => $errors, 'code' => $code], $code);
        }

        $user = User::create([
            
                'email' => $request->email,
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'bio' => $request->bio,
                'password' => bcrypt($request->password),
        ]);

        $user->save();
        return response()->json("Created"  );
    }

    /**
     * Return a given user by id.
     *
     * @param $id
     * @return JsonResponse
     */
    public function getById($id)
    {
        Log::info('Retrieving user profile for user: '.$id);
        return response()->json(User::findOrFail($id));
    }

    /**
     * Return a given user by email.
     *
     * @param $email
     * @return JsonResponse
     */
    public function getByEmail($email)
    {
        Log::info('Retrieving user profile for user: '.$email);
        return response()->json(User::where('email', $email) -> first());
    }

    /**
     * Return a given user by username.
     *
     * @param $username
     * @return JsonResponse
     */
    public function getByUsername($username)
    {
        Log::info('Retrieving user profile for user: '.$username);
        return response()->json(User::where('username', $username) -> first());
    }
}
