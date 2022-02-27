<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Str;
class AuthController extends Controller
{

private $apiToken;
public function __construct()
{
$this->apiToken = uniqid(base64_encode(Str::random(40)));
}
/**
*
* @return \Illuminate\Http\Response
*/

    public function register(Request $request)
    {

        //data validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        $postArray = $request->all();

        $postArray['password'] = bcrypt($postArray['password']);
        $user = User::create($postArray);

        $success['token'] = $this->apiToken;
        $success['name'] =  $user->name;
        // send output data to vue3
        return response()->json([
            'status' => 'success',
            'data' => $success,
        ]);
    }
public function login(Request $request){
//User check
if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
$user = Auth::user();
//Setting login response
$success['token'] = $this->apiToken;
$success['name'] =  $user->name;
return response()->json([
'status' => 'success',
'data' => $success
]);
} else {
return response()->json([
'status' => 'error',
'data' => 'Unauthorized Access'
]);
}
}

    public function user()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $success['token'] = $this->apiToken;
            $success['name'] = $user->name;
            return response()->json([
                'status' => 'success',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'data' => 'Unauthorized Access'
            ]);
        }
        }
}
