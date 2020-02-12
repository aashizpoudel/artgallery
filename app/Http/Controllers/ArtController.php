<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Art;

class ArtController extends Controller
{
    //

    public function index(Request $request){
        $query= Art::query();

        if($request->s){
            $query=$query->where('title', 'LIKE', "%{$request->s}%");
            $query=$query->orWhere('description', 'LIKE', "%{$request->s}%");
            // dd($request);
        }
        $arts =$query->latest()->paginate(12);
        return view('welcome',compact('arts'));
    }

    public function create(){
        return view('arts.create');
    }

    public function store(Request $request){
        // dd($request);
        $data = $this->validate($request,[
            'title'=>'required|string|min:3',
            'description'=>'required|string|min:4',
            'price'=>'numeric|required',
            'seller_name'=>'required|string|min:3',
            'seller_address'=>'required|string|min:3',
            'seller_phone'=>'required|numeric|digits:10',
            'image'=>'required|image|max:1000'
        ]);
        if($request->negotiable && $request->negotiable=='on'){
            $data['negotiable'] = true;
        }else{
            $data['negotiable'] = false;
        }


        $data['image'] = $request->image->store('img');
        $data['user_id']=auth()->user()->id;

        $art = Art::create($data);

        return back()->with('success','successfully created an ad listing');

    }

    public function show($id){
        $art = Art::findOrFail($id);
        return view('art',compact('art'));
    }

    public function edit($art){
        $art = Art::findOrFail($art);
        if($art->user_id !=auth()->user()->id) abort(411);

        return view('arts.edit',compact('art'));
    }

    public function update(Request $request,$art){
        // dd($request);
        $art = Art::findOrFail($art);
        if($art->user_id !=auth()->user()->id) abort(411);
        $data = $this->validate($request,[
            'title'=>'required|string|min:3',
            'description'=>'required|string|min:4',
            'price'=>'numeric|required',
            'seller_name'=>'required|string|min:3',
            'seller_address'=>'required|string|min:3',
            'seller_phone'=>'required|numeric|digits:10',
            'image'=>'image|max:1000'
        ]);
        if($request->negotiable && $request->negotiable=='on'){
            $data['negotiable'] = true;
        }else{
            $data['negotiable'] = false;
        }

        if($request->image){
            $data['image'] = $request->image->store('img');

        }



        $art->update($data);

        return redirect()->route('home')->with('status','successfully updated an ad listing');

    }

    public function destroy($art){
        $art = Art::findOrFail($art);
        if($art->user_id == auth()->user()->id ){
            $art->delete();
        }

        return back()->with('status','Successfully deleted');
    }
}
