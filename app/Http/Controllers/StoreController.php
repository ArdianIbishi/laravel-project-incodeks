<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */


    public function index()
    {
        $stores = Store::orderBy('created_at')->get();

        return view('store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(SaveStoreRequest $request)
    {
        $store = new Store();
        $path = "";
        if ($request->file('logo') != null) {
            $path = $request->file('logo')->store('store_logo');
        }


        $store->store_name = $request->input('store_name');
        $store->email = $request->input('email');
        if ($path != null) {
            $store->logo = $path;
        }
        $store->website = $request->input('website');

        if ($store->save()) {
            return redirect(route('store.create'))->with('status', "Store saved with success");
        } else {
            return redirect(route('store.create'))->with('nostatus', "Store is not saved");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('store.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $store = Store::find($store)->first();
        return view('store.edit', compact('store'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(UpdateStoreRequest $request, $id)
    {
        $store = Store::find($id);
        $path = "";
        if ($request->file('logo') != null) {
            @unlink(storage_path('app/') . $store->logo);

            $path = $request->file('logo')->store('store_logo');
        }
        $store->store_name = $request->input('store_name');
        $store->email = $request->input('email');

        if ($path != null) {
            $store->logo = $path;
        }
        $store->website = $request->input('website');

        if ($store->save()) {
            return redirect(route('store.create'))->with('status', "Store is updated successfully");
        } else {
            return redirect(route('store.create'))->with('nostatus', "Store is not updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $store = Store::find($id)->first();


        if ($store) {
            @unlink(storage_path('app/') . $store->logo);
            $store->delete();
            return redirect(route('store.index'))->with('status', "Store is deleted successfully");
        } else {
            return redirect(route('store.create'))->with('nostatus', "Store is not deleted successfully");
        }
    }
}
