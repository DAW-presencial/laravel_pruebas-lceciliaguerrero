<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        /**
         * Todo
         *  @method index()
         *  query builder (funciona)
         *  $prod = DB::table('products')->where('deleted_at', null)->orderBy('id', 'desc')->get();
         *  return view('product.index', compact('prod'));
         *  raw (funciona)
         *  $prod = DB::table('products')->selectRaw('id, name, description, photo, trademark_name, type_stock, available_stock, minimum_stock, date_expiry, type_product_unit')->where('deleted_at', null)->orderBy('id', 'desc')->get();
         *  return view('product.index', compact('prod'));
         */
        $prod = Product::all()->sortKeysDesc();
        return view('product.index', compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(ProductRequest $request)
    {

        $userId = auth()->user()->id;
        if ($request->file('photo')->isValid()) {
            $fotografia = $request->file('photo');
            $fotografia->storeAs('images', $fotografia->getClientOriginalName(), 'public');
            $produc = [
                'name' => $request->name,
                'description' => $request->description,
                'photo' => $request->file('photo')->getClientOriginalName(),
                'trademark_name' => $request->trademark_name,
                'trademark_email' => $request->trademark_email,
                'date_expiry' => $request->date_expiry,
                'type_stock' => $request->type_stock,
                'type' => $request->has('type') ? $request->get('type') : [],
                'available_stock' => $request->available_stock,
                'minimum_stock' => $request->minimum_stock,
                'id_user' => $userId,
                'type_product_unit' => $request->type_product_unit
            ];
        }

        $ifExist = DB::table('products')
            ->where('name', $request->name)
            ->where('description', $request->description)
            ->where('photo', $request->file('photo')->getClientOriginalName())
            ->where('trademark_name', $request->trademark_name)
            ->where('trademark_email', $request->trademark_email)
            ->where('date_expiry', $request->date_expiry)
            ->where('type_stock', $request->type_stock)
            ->where('type_product_unit', $request->type_product_unit)
            ->value('id');
        $ifRestore = Product::onlyTrashed()->where('id', $ifExist)->first();
        if (boolval($ifExist) !== false) {
            $ifRestore->restore();
            return redirect('/product')->with(['mensaje' => 'El producto se ha restablecido correctamente.', 'info' => 'El producto ya fue creado y eliminado anteriormente, se ha restablecido, si dicho producto no lo ha hecho usted, no podrá ni actualizarlo ni eliminarlo.']);
        } else {
            Product::create($produc);
            return redirect('/product')->with(['mensaje' => 'El producto se ha creado correctamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        /**
         * Todo
         *  @method show(Product $product)
         *  query builder (no me funciona)
         *  error 'Property [photo] does not exist on this collection instance.'
         *  $prod = DB::table('products')->where('id', $product->id)->where('deleted_at', null)->get();
         *  return view('product.show', compact('prod'));
         *  raw (no me funciona)
         *  error 'Attempt to read property "photo" on array'
         *  $prod = DB::select('select * from products where id = ? and deleted_at is not null', [$product->id]);
         *  return view('product.show', compact('prod'));
         */
        $prod = $product;
        return view('product.show', compact('prod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Product $product)
    {
        $prod = $product;/*$prod = Product::find($product);*//*return dd($prod);*/
        $this->authorize('update-product', $prod);
        return view('product.edit', compact('prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return Application|Redirector|RedirectResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        $userId = auth()->user()->id;
        $prod = $product;
        $prod->name = $request->name;
        $prod->description = $request->description;
        if ($request->file('photo')->isValid()) {
            $fotografia = $request->file('photo');
            $fotografia->storeAs('images', $fotografia->getClientOriginalName(), 'public');
            $prod->photo = $request->file('photo')->getClientOriginalName();

        }
        $prod->trademark_name = $request->trademark_name;
        $prod->trademark_email = $request->trademark_email;
        $prod->date_expiry = $request->date_expiry;
        $prod->type_stock = $request->type_stock;
        $prod->type = $request->has('type') ? $request->get('type') : [];
        $prod->available_stock = $request->available_stock;
        $prod->minimum_stock = $request->minimum_stock;
        $prod->id_user = $userId;
        $prod->type_product_unit = $request->type_product_unit;
        /*$prod->save();*/

        return redirect('/product')->with('mensaje', 'producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Application|Redirector|RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Product $product)
    {
        $prod = $product;
        $this->authorize('delete-product', $prod);
        $prod->delete();
        return redirect('/product')->with('mensaje', 'producto eliminado');
    }
}
