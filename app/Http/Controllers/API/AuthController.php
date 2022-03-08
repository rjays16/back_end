<?php
namespace App\Http\Controllers\API;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
      $success['created_at'] = $user->created_at;
      $success['id'] = $user->id;
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

    public function count_user(){

        $count = DB::table('users')->count();
        return response()->json([
        'status' => 'success',
        'data' => $count
    ]);
    }

    public function list_user(){

        $count = DB::table('users')->distinct()->get();
        return response()->json([
            'status' => 'success',
            'data' => $count
        ]);
    }

    public function logout(){
        try{
            Session::flush();
            $success = true;
            $message = 'Successfully logged out';
        }catch (QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }
        return response()->json([
            'success' => $success,
            'data' => $message,
        ]);
    }

}
