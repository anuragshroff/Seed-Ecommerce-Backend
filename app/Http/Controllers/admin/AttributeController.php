<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function attribute(){
        $attributes = Attribute::with('attribute_options')->get();
        return view('admin.attribute.index', compact('attributes'));
     }

     public function createAttribute(){

        $attributes = Attribute::with('attribute_options')->get();
         return view('admin.attribute.create', compact('attributes'));

     }

     public function attributeStore(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Attribute::create([
            'name' => $validated['name'],
        ]);

        return redirect('/create-attribute')->with('success', 'Attribute created successfully!');

    }

    public function updateAttribute(Request $request){

      

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'attribute_id' => 'required',
        ]);

        $attribute = Attribute::findOrFail($request->attribute_id);

        $attribute->update($validated);

        return redirect('/create-attribute')->with('success', 'Attribute created successfully!');

    }

    public function deleteAttribute($id){

        $attribute = Attribute::findOrFail($id);
        $attribute->delete();


        return redirect()->route('attribute')->with('success', 'Data deleted successfully!');

    }

   



    public function editAttribute($attribute_id){

        $attributes = Attribute::where('id', $attribute_id)->with('attribute_options')->first();
        return view('admin.attribute.option.edit', compact('attribute_id', 'attributes'));

    }


}
