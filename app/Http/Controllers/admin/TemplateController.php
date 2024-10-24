<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemplateRequest;
use App\Http\Requests\TemplateUpdateRequest;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use FileUploadTrait;

    public function index()
    {
        $templates = Template::latest()->get();
        return view('admin.template.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TemplateRequest $request)
    {

        $imagePath = $this->uploadFile($request, 'image');

        $validatedData = $request->validated();

        if ($imagePath) {

            $validatedData['image'] = $imagePath;
        }

        Template::create($validatedData);

        return redirect()->route('template.index')->with('success', 'Template created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $templates = Template::find($id);
        return view('admin.template.edit', compact('templates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TemplateUpdateRequest $request, string $id)
    {
        $template = Template::findOrFail($id);
        $imagePath = $this->uploadFile($request, 'image');


        $validatedData = $request->validated();


        if ($imagePath) {

            if ($template->image) {
                // Delete the old image from the public directory
                $oldImagePath = public_path($template->image); // Full path of the old image

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }

            $validatedData['image'] = $imagePath;
        }



        $template->update($validatedData);

        return redirect()->back()->with('success', 'Template updated successfully!');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Template::find($id)->delete();
        return redirect()->back()->with('success', 'Template deleted successfully!');

    }
}
