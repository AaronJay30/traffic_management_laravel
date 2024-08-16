<?php

namespace App\Http\Controllers;

use App\Models\Covid;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CovidController extends Controller
{
    public function create(){
        return view('covid.add');
    }

    public function store(Request $request){

        $validated = $request->validate([
            "location" => ['required', 'min:3', Rule::unique('covids','location')],
            "recovered" => ['required'],
            "quarantined" => ['required'],
            "active" => ['required'],
        ]);

        Covid::create($validated);
        return redirect('/')->with("message", "New location was added successfully!");
    }

    public function show($id){
        $data = Covid::findOrFail($id);

        return view('covid.edit',['covid' => $data]);
    }

    public function update(Request $request, Covid $covid){
        $validated = $request->validate([
            "location" => ['required', 'min:3'],
            "recovered" => ['required'],
            "quarantined" => ['required'],
            "active" => ['required'],
        ]);

        $covid->update($validated);

        return redirect('/')->with("message","Data was successfully updated!");
    }

    public function destroy(Covid $covid){
        $covid->delete();
        return redirect('/')->with('message', 'Data was successfully deleted!');
    }
}
