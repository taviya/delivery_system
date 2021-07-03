<?php

namespace App\Http\Controllers\Admin\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Session;

class MenuManagerController extends Controller
{
  public function index() {
    $data['menus'] = Menu::latest()->get();
    return view('admin.menuManager.index', $data);
  }

  public function store(Request $request) {
    $slug = str_replace(' ', '-', $request->name);

    $messages = [
      'sdetails.required' => 'Short details is required',
      'sdetails.max' => 'Short details can have maximum 190 characters',
    ];
    $validatedRequest = $request->validate([
      'name' => 'required',
      'title' => 'required',
      'body' => 'required',
      'menu_position' => 'required',
    ], $messages);

    $menu = new Menu;
    $menu->name = $request->name;
    $menu->title = $request->title;
    $menu->slug = $slug;
    $menu->body = $request->body;
    $menu->menu_position = $request->menu_position;
    $menu->save();

    Session::flash('success', 'Menu added successfully!');
    return redirect()->back();
  }

  public function edit($menuID) {
    $data['menu'] = Menu::find($menuID);
    return view('admin.menuManager.edit', $data);
  }

  public function update(Request $request, $menuID) {
    $slug = str_replace(' ', '-', $request->name);
    $messages = [
      'sdetails.required' => 'Short details is required',
      'sdetails.max' => 'Short details can have maximum 190 characters',
    ];
    $validatedRequest = $request->validate([
      'name' => 'required',
      'title' => 'required',
      'body' => 'required',
      'menu_position' => 'required',
    ], $messages);

    $menu = Menu::find($menuID);
    $menu->name = $request->name;
    $menu->title = $request->title;
    $menu->slug = $slug;
    $menu->menu_status = $request->menu_status;
    $menu->body = $request->body;
    $menu->menu_position = $request->menu_position;
    $menu->save();

    Session::flash('success', 'Menu updated successfully!');
    return redirect()->route('admin.menuManager.index');
  }

  public function delete($menuID) {
    $menu = Menu::find($menuID);
    $menu->delete();
    Session::flash('error', 'Menu deleted successfully!');
    return redirect()->back();
  }
}
