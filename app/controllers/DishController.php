<?php

class DishController extends BaseController
{
    /**
     * Display a randomized listing of the resource.
     * GET dish/rand
     *
     * @return Response
     */
    public function rand()
    {
        $tagged = Input::get('tagged', []);
        $dishes = empty($tagged) ? Dish::all() : Dish::withTags($tagged);
        $tags = Tag::all();
        return View::make('dish.rand', [
            'dishes' => $dishes->shuffle(),
            'tags' => $tags,
            'tagged'=> Input::get('tagged', [])
        ]);
    }

    /**
     * Display a listing of the resource.
     * GET dish/
     *
     * @return Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return View::make('dish.index', [
            'dishes' => $dishes
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     * GET dish/create
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::all();
        return View::make('dish.create', [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * POST dish/
     *
     * @return Response
     */
    public function store()
    {
        $attributes = Input::only(['name', 'description']);
        $dish = Dish::create($attributes);
        $dish->tags()->sync(Input::get('tags', []));
        return Redirect::route('dish.index');
    }

    /**
     * Display the specified resource.
     * GET dish/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        $tags = Tag::all();
        return View::make('dish.show', [
            'dish' => $dish,
            'tags'=> $tags
        ]);
    }    

    /**
     * Show the form for editing the specified resource.
     * GET dish/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        $tags = Tag::all();
        return View::make('dish.edit', [
            'dish' => $dish,
            'tags'=> $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     * PUT dish/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $dish = Dish::find($id);
        $attributes = Input::only(['name', 'description']);
        $dish->fill($attributes)->save();
        $dish->tags()->sync(Input::get('tags', []));
        return Redirect::route('dish.show', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE dish/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->tags()->sync([]);
        $dish->delete();
        return Redirect::route('dish.index');
    }
}
