<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCrudRequest;
use App\Http\Requests\EditCrudRequest;
use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Crud::paginate(10);
        return view('crud.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCrudRequest $request)
    {
        Crud::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => isset($request->is_active) ? 1 : 0
        ]);

        flash("Post created successfully");
        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        return view('crud.show', compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(Crud $crud)
    {
        return view('crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(EditCrudRequest  $request, Crud $crud)
    {
        $crud->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => isset($request->is_active) ? 1 : 0
        ]);
        flash("Post updated successfully");
        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud)
    {
        $crud->delete();
        flash("Post Deleted Successfully");
        return redirect()->back();
    }
}
