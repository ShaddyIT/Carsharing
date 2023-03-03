<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BalanceUpRequest;
use App\Http\Resources\BalanceUpResource;
use App\Models\BalanceUp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BalanceUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BalanceUp::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BalanceUpRequest $request)
    {
        $balance_up = BalanceUp::create($request->validated());
        return $balance_up;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BalanceUp::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BalanceUpRequest $request, BalanceUp $balance_up)
    {
        $balance_up->update($request->validated());
        return $balance_up;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceUp $balance_up)
    {
        $balance_up->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
