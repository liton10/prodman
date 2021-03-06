<?php

namespace App\Http\Controllers;

use Finao\History\Event as History;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Product;

/**
 *
 * Product Controller.
 */  
class ProductController extends Controller
{
    /**
    * Lists all products
    *
    * @return mixed
    */
    public function index()
    {
    	$products = Product::sortable()->paginate(10);
        return view("home.index", compact('products'));
    }

    /**
    * Adds products
    *
    * @param mixed $request
    * @return mixed
    */
    public function add(Request $request)
    {	
    	if ($request->method() == 'GET') {
    		return view("home.add");
    	}
    	// Validating rules
        $this->validate($request, (new Product)->getRules());

        $image = $request->file('select_file');
        $newName = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path(env("IMAGE_FOLDER", "images")), $newName);

        Product::unguard();
        $data = $request->except(['_token','select_file','submit']);
        $data['original_filename'] = $image->getClientOriginalName();
        $data['file_path'] = env("IMAGE_FOLDER", "images")."/".$newName;
        $product = Product::create($data);
        Product::reguard();
        
        return view("home.view", compact('product'));
    }

    /**
    * Shows products
    *
    * @param integer $id
    * @return mixed
    */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("home.view", compact('product'));
    }

    /**
    * Show edit form for product
    *
    * @param integer $id
    * @return mixed
    */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view("home.edit", compact('product'));
    }

    /**
    * Deletes products
    *
    * @param integer $id
    * @return mixed
    */
    public function delete($id)
    {	
    	$result = [];
    	try {
    		$product = Product::findOrFail($id);
        	$product->delete();
        	$result['status'] = 200;
        	$result['message'] = 'OK';
    	} catch (\Exception $e) {
    		$result['status'] = 400;
        	$result['message'] = 'FAILED';
    	}
    	
    	return response()->json($result);
    }

    /**
    * Deletes products
    *
    * @param  mixed  $request
    * @param integer $id
    * @return mixed
    */
    public function postEdit(Request $request, $id = null)
    {

        $data = $request->except(['_token','select_file','submit']) ;

        $product = Product::findOrFail($id);
        // Validating rules
        $this->validate($request, $product->getRules());
        if ($request->file('select_file')) {
        	$image = $request->file('select_file');
	        $newName = rand() . '.' . $image->getClientOriginalExtension();
	        $image->move(public_path(env("IMAGE_FOLDER", "images")), $newName);
	        $data['original_filename'] = $image->getClientOriginalName();
        	$data['file_path'] = env("IMAGE_FOLDER", "images")."/".$newName;
        }
        Product::unguard();
        $product->update($data);
        return redirect()->route('view', ['id' =>$id]);
    }
}
