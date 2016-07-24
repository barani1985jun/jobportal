<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    public function index(Request $request) {
    	$input = $request->all();
    	if($request->search) {
    		$items = Item::where('title','LIKE',"%{$request->get('search')}%")->paginate(5);
    	} else {
    		$items = Item::paginate(5);
    	}
    	return response($items);
    }

    public function test(Request $request) {
    	
    }

    public function store(Request $request) {
    	$input = $request->all();
    	$create = Item::create($input);
    	return response($create);
    }
}
