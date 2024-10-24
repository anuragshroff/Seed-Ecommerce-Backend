<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeOption;
use Illuminate\Http\Request;

class AttributeOptionController extends Controller
{
    //
   

    public function storeAtributeOption(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'attribute_id' => 'required'
        ]);

        AttributeOption::create($validated);
        return redirect()->route('createAttribute')->with('success', 'Attribute option added successfully!');


    }

    public function createAtributeOption($attribute_id){
        return view('admin.attribute.option.create', compact('attribute_id'));

    }

    public function attributeOptionEdit($id){
        $attributeOption = AttributeOption::where('id', $id)->first();
        return view('admin.attribute.option.view', compact('attributeOption'));

    }

    public function attributeOptionUpdate(Request $request){

      

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'attribute_option_id' => 'required',
        ]);

        $attribute_option = AttributeOption::findOrFail($request->attribute_option_id);

        $attribute_option->update($validated);

        return redirect()->route('attribute')->with('success', 'Data deleted successfully!');

    }

    public function attributeOptionDelete($id){

        $attributeOption = AttributeOption::findOrFail($id);
        $attributeOption->delete();


        return redirect()->route('attribute')->with('success', 'Data deleted successfully!');

    }


}
