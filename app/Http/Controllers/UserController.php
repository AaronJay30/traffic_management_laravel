<?php

namespace App\Http\Controllers;

use App\Models\Covid;
use App\Models\User;
use App\Models\Traffic;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        // $data = DB::table('covids')->get()->paginate(4);

        $data = Covid::paginate(5);

        return view('index')->with("covids",$data);
    } 

    public function login(){
        if(View::exists('User.login')){
            return view('User.login');
        } else {
            // return response()->view('errors.404');
            return abort(404);
        }   
    }

    public function register(){
        return view('User.register');
    }

    public function store(Request $request){

        $validated = $request->validate([
            "name" => ['required', "min:6"],
            "email" => ['required', 'email', Rule::unique('users','email')],
            "role" => ['required'],
            "password" => 'required|confirmed|min:8'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        auth()->login($user);

        return redirect("/");
    }

    public function add(Request $request){

        $validated = $request->validate([
            "name" => ['required', "min:6"],
            "email" => ['required', 'email', Rule::unique('users','email')],
            "role" => ['required'],
            "password" => 'required|confirmed|min:8'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return redirect('/user')->with("message", "New user was added successfully!");
    }

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/')->with('message','Welcome back!');
        }

        return back()->withErrors(['email' => "Login failed"])->onlyInput('email');
    }

    public function authenticated(Request $request, $user) {
        $user->last_login = Carbon::now()->toDateTimeString();
        $user->save();
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message','Logout successful');
    }

    public function traffic(){
        
        $traffic = DB::select('SELECT * FROM traffic ORDER BY location ASC');
        $barangay = DB::select('SELECT location,active FROM covids ORDER BY active DESC');

        $lowestCaseRoute = Covid::orderby('active')->value('location');
        

        Traffic::where('location', $lowestCaseRoute)->update(['state' => 'ON']);

        Traffic::where('location', '!=', $lowestCaseRoute)->update(['state' => 'OFF']);
        
        return view('User.traffic', ['traffic' => $lowestCaseRoute, 'barangay' => $barangay]);
    }

    // public function way(Request $request){
    //     $record = Traffic::findOrFail(1);
        
    //     if ($record->state == "CORE" && $request->route == "DEFAULT"){
    //         $record->state = "BOTH";
    //     } else if ($record->state == "DEFAULT" && $request->route == "CORE"){
    //         $record->state = "BOTH";
    //     } else {
    //         $record->state = $request->route;
    //     }

    //     $record->save();
    //     $traffic = DB::select('SELECT * FROM traffic');

    //     return redirect()->back()->with('message', 'Change Route Successfully')->with(['traffic' => $traffic[0]->state]);
    // }

    public function user(){
        // $data = array('users' => DB::table('users')->sortable()->orderBy('id','asc')->paginate(7),
        // "isPaginate" => "on");

        $data = User::sortable()->paginate(6);

        return view('User.user',['users' => $data, "isPaginate" => "on"]);
    }

    public function search(Request $request){
        $search = $request['search'];
        // $data = array('users' => DB::table('users')->sortable()->where('name', 'LIKE', '%'.$search.'%')->paginate(1000),
        // "isPaginate" => "off");

        $data = User::where('name', 'LIKE', '%'.$search.'%')->sortable()->paginate(6);

        return view('User.user',['users' => $data, "isPaginate" => "off"]);
    }

    public function show($id){
        $data = User::findOrFail($id);

        return view('User.edit',['user' => $data]);
    }

    public function create(){
        return view('User.add');
    }

    public function update(Request $request, User $user){
        $validated = $request->validate([
            "name" => ['required', "min:6"],
            "role" => ['required'],
        ]);
        
        $user->update($validated);

        return redirect('/user')->with("message","User was successfully updated!");
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('/user')->with('message', 'User was successfully deleted!');
    }
}
