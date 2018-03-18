<?php

namespace GiapHiep\Productcrud\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;

use GiapHiep\Productcrud\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        return view('giaphiep::productcrud.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create(['name' => $request->name, 'price' => $request->price]);
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->update(['name' => $request->name, 'price' => $request->price]);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return response()->json(['message' => 'success']);
    }


    public function list() {

        $products = Product::orderBy('id', 'desc');

        return DataTables::of($products)


            ->addColumn('action', function ($product) {

                return '<a href="javascript:;" data-id='. $product->id .' class="btn btn-xs btn-info" >
                            <i class="fa fa-eye" aria-hidden="true"></i> Show
                        </a>
                        <a href="javascript:;" data-id='. $product->id .' class="btn btn-xs btn-warning">
                            <i class="fa fa-edit"></i> Edit 
                        </a>

                          <a href="javascript:;" data-id='. $product->id .' type="button" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash-o"></i> Delete 
                          </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
