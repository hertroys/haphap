<?php
namespace App\Controllers;

use View;
use Input;
use Redirect;
use Controller;
use App\Models\Tag;
use App\Models\Dish;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DishController extends Controller
{
    /**
     * Display a filtered shuffle of the resource.
     * GET dish/home
     *
     * @return Response
     */
    public function home()
    {
        $tagged = Input::get('tagged', []);
        $dishes = Dish::withAllTags($tagged)->shuffle();
        // If $tagged is empty, the having threshold is 0,
        // i.e. the clause is vacuously true.

        $tags = Tag::all();
        return View::make('dish.home', [
            'dishes' => $dishes,
            'tags' => $tags,
            'tagged'=> $tagged
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
        $dishes = Dish::with('tags')->get();
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
        $dish = new Dish;
        $tags = Tag::all();
        return View::make('dish.create', [
            'dish' => $dish,
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
        $dish = new Dish;
        return $this->update($dish);
    }

    /**
     * Display the specified resource.
     * GET dish/{id}
     *
     * @param  App\Models\Dish  $dish
     * @return Response
     */
    public function show(Dish $dish)
    {
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
     * @param  App\Models\Dish  $dish
     * @return Response
     */
    public function edit(Dish $dish)
    {
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
     * @param  App\Models\Dish  $dish
     * @return Response
     */
    public function update(Dish $dish)
    {
        $attributes = Input::only(['name', 'description']);
        $dish->fill($attributes);

        // Validate and redirect back if invalid.
        $validator = $dish->validate();
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()->withErrors($validator);
        }

        // If valid, save and sync the associated tags.
        $dish->save();
        $dish->tags()->sync(Input::get('tags', []));

        // Store the image, if present, and save its name.
        if (Input::hasFile('image')
            && $name = $this->upload($dish, Input::file('image'))
        ) {
            $dish->fill(['image' => $name])->save();
        }

        return Redirect::route('dish.show', $dish->id)
            ->withSuccess(trans('confirmation.dish_saved'));
    }

    /**
     * Remove the specified resource from storage.
     * DELETE dish/{id}
     *
     * @param  App\Models\Dish  $dish
     * @return Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return Redirect::route('dish.index')
            ->withSuccess(trans('confirmation.dish_deleted'));
    }

    /**
     * Validate and, if valid, store the uploaded image.
     *
     * @param  App\Models\Dish  $dish
     * @param  Symfony\Component\HttpFoundation\File\UploadedFile  $file
     * @return string
     */
    private function upload(Dish $dish, UploadedFile $file)
    {
        if ($file->isValid() && isImage($file)) {
            $name = $dish->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/img', $name);
            return $name;
        }
    }
}
