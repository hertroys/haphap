<?php

class HapController extends BaseController
{
    public function rand()
    {
        $hapjes = Hap::rand(2)->get();
        return View::make('hap.rand', ['hapjes' => $hapjes]);    
    }

    public function index()
    {
        $hapjes = Hap::all();
        return View::make('hap.index', ['hapjes' => $hapjes]);
    }

    public function create()
    {
        return View::make('hap.create');
    }

    public function store()
    {
        Hap::create([
            'naam' => Input::get('naam'),
            'beschrijving' => Input::get('beschrijving'),
        ]);
        return Redirect::to('hap');
    }

    public function edit($id)
    {
        $hapje = Hap::find($id);
        return View::make('hap.edit', ['hapje' => $hapje]);
    }

    public function update($id)
    {
        $hap = Hap::find($id);
        $hap->fill([
            'naam' => Input::get('naam'),
            'beschrijving' => Input::get('beschrijving'),
        ])->save();
        return Redirect::to('hap');
    }

    public function delete($id)
    {
        Hap::destroy($id);
        return Redirect::to('hap');
    }
}
