<?php

namespace App\Http\Controllers;
use Auth;
use \Input;
use App\User;
use App\Doc;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function search(Request $request){
		if (!Auth::check()) return redirect('/login');
		$results = Doc::where('title', request()->query('query'))->orWhere('title', 'like', '%' . request()->query('query') . '%')->orderBy('title', 'ASC')->paginate(15);
		return view('search', ['results' => $results, 'query' => request()->query('query')]);
	}

}
