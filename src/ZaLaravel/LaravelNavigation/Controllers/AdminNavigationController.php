<?php

namespace ZaLaravel\LaravelNavigation\Controllers;

use App\Events\NavigationWasCreated;
use App\Events\NavigationWasDeleted;
use App\Events\NavigationWasEdited;
use ZaLaravel\LaravelNavigation\Models\Navigation;
use ZaLaravel\LaravelNavigation\Requests\NavigationRequest;
use ZaLaravel\LaravelAdmin\Controllers\AbstractAdminController;

/**
 * Class AdminNavigationController
 * @package ZaLaravel\LaravelNavigation\Controllers
 */
class AdminNavigationController extends AbstractAdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $navs = Navigation::orderBy('id', 'desc')->paginate(10);
        return view('laravel-navigation::index', ['navs' => $navs]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Navigation $nav)
	{
        $all_navs = Navigation::all();
        $navs = [0 => '-- Родитель'];
        foreach($all_navs as $n) {
            $navs[$n->id] = $n->name;
        }

        return view('laravel-navigation::create',
            ['action'=> 'create','nav' => $nav, 'navs'=> $navs]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Navigation $nav, NavigationRequest $request)
	{
        $data = $request->all();
        $data = [
            'name' => $data['name']
        ];
        unset($data['name']);

        $nav->fill($data);

        if ($data['parent_id']) {
            $parent = Navigation::find($data['parent_id']);
            $nav->parent()->associate($parent);
        }

        $nav->save();

        \Session::flash('message', 'Пункт меню успешно создан');

        \Event::fire(new NavigationWasCreated($nav));

        return redirect()->route('admin.navigation.edit', ['id' => $nav->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Navigation $nav)
	{
        $all_navs = Navigation::where('id', '!=', $nav->id)->get();

        $navs = [0 => '-- Родитель'];
        foreach($all_navs as $n) {
            $navs[$n->id] = $n->name;
        }

        return view('admin.navigation.edit',
            ['action'=> 'edit','nav' => $nav, 'navs'=> $navs]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Navigation $nav, NavigationRequest $request)
	{
        $data = $request->all();
        $data = [
            'name' => $data['name']
        ];
        unset($data['name']);

        $nav->fill($data);

        if ($data['parent_id']) {
            $parent = Navigation::find($data['parent_id']);
            $nav->parent()->associate($parent);
        } else {
            $nav->parent()->dissociate();
        }

        $nav->save();

        \Session::flash('message', 'Пункт меню успешно обновлен');

        \Event::fire(new NavigationWasEdited($nav));

        return redirect()->route('admin.navigation.edit', ['id' => $nav->id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Navigation $nav)
	{
        \Event::fire(new NavigationWasDeleted($nav));
		$nav->delete();
        return redirect()->route('admin.navigation.index');
	}

}
