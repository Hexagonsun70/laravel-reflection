<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('logos.index', [
            //sort by desc 'id' so that the most recent logo is displayed at the top when store returns to index
            'logos' => Logo::all()->sortByDesc('id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logos.create');
    }

    public function messages()
    {
        return [
            'file_path' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'file_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        $imageName = $request->file_path->getClientOriginalName();

        $filePath = '/storage/img/' . $imageName;

        Logo::create(['file_path' => $filePath]);

        $request->file_path->storeAs('public/img', $imageName);

        return back()
            ->withInput()
            ->with('success', 'You have successfully uploaded ' . $imageName)
            ->with('image', $imageName);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo, Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Logo $logo)
    {
        if(preg_match('~company-logo-~' , $logo->file_path) == 0){
        unlink(substr($logo->file_path, 1));
//        Storage::disk('public')->delete($logo->file_path);
        $logo->delete();
        return back()
            ->with('success', substr($logo->file_path, 13) . ' has been deleted!');
        } else {
            return back()
                ->with('failure', 'This logo is too precious, it cannot be deleted!');
        }
    }
}
