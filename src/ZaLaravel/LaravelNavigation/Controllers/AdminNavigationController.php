<?php

namespace ZaLaravel\LaravelNavigation\Controllers;

use ZaLaravel\LaravelNavigation\Events\NavigationWasCreated;
use ZaLaravel\LaravelNavigation\Events\NavigationWasDeleted;
use ZaLaravel\LaravelNavigation\Events\NavigationWasEdited;
use ZaLaravel\LaravelAdmin\Controllers\AbstractAdminController;
use ZaLaravel\LaravelNavigation\Models\Interfaces\NavigationInterface;
use ZaLaravel\LaravelNavigation\Requests\NavigationRequest;

/**
 * Class AdminNavigationController
 * @package ZaLaravel\LaravelNavigation\Controllers
 */
class AdminNavigationController extends AbstractAdminController
{
    /**
     * Index
     *
     * @param NavigationInterface $navs
     * @return \Illuminate\View\View
     */
    public function index(NavigationInterface $navs)
    {
        $navs = $navs::orderBy('id', 'desc')->paginate(10);
        return view('laravel-navigation::index', ['navs' => $navs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param NavigationInterface $nav
     * @return \Illuminate\View\View
     */
    public function create(NavigationInterface $nav)
    {
        $getNav = $nav::all();
        $navs = [0 => '-- Choose parent'];
        foreach ($getNav as $n)
        {
            $navs[$n->id] = $n->name;
        }
        return view('laravel-navigation::create', ['action' => 'create', 'nav' => $nav, 'navs' => $navs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NavigationInterface $nav
     * @param NavigationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(NavigationInterface $nav, NavigationRequest $request)
    {
        $input = $request->all();

        $nav->fill($input);
        if ($input['parent_id']) {
            $parent = $nav::find($input['parent_id']);
            $nav->parent()->associate($parent);
        }
        $nav->save();

        return redirect()->route('admin.navigation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NavigationInterface $nav
     * @return \Illuminate\View\View
     */
    public function edit(NavigationInterface $nav)
    {
        $all_navs = $nav::where('id', '!=', $nav->id)->get();

        $navs = [0 => '-- Parent'];
        foreach ($all_navs as $n)
        {
            $navs[$n->id] = $n->name;
        }
        return view('laravel-navigation::edit',
            ['action' => 'edit', 'nav' => $nav, 'navs' => $navs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NavigationInterface $nav
     * @param NavigationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NavigationInterface $nav, NavigationRequest $request)
    {
        $data = $request->all();
        $data = [
            'name' => $data['name']
        ];
        unset($data['name']);

        $nav->fill($data);

        if ($data['parent_id']) {
            $parent = $nav::find($data['parent_id']);
            $nav->parent()->associate($parent);
        } else {
            $nav->parent()->dissociate();
        }

        $nav->save();

        \Session::flash('message', 'Пункт меню успешно обновлен');

        \Event::fire(new NavigationWasEdited($nav));

        return redirect()->route('laravel-navigation::edit', ['id' => $nav->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param NavigationInterface $nav
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(NavigationInterface $nav)
    {
        $nav->delete();

        return redirect()->route('admin.navigation.index');
    }

}
