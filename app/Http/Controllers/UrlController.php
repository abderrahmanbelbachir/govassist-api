<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index() {
        $urls = Url::paginate(10);
        return view('dashboard' , compact('urls'));
    }

    public function store(Request $request) {
        $inputs = $request->only(['destination']);
        $str = rand();
        $result = hash("sha256", $str);
        $inputs['slug'] = substr($result,0 , 5);
        $url = Url::create($inputs);
        return redirect()->route('dashboard');
    }

    public function show($id) {
        $url = Url::findOrFail($id);
        return $url;
    }

    public function update(Request $request , $id) {
        $inputs = $request->only(['destination']);
        Url::where('id' , $id)->update($inputs);
        return 'url line updated successfully !!';
    }

    public function destroy($id) {
        Url::destroy($id);
        return 'url line destroyed successfully';
    }
}
