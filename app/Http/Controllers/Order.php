<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class Order extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'email' => 'string|nullable|email|max:200',
            'phone' => 'required|numeric|max_digits:13',
            'description' => 'string|nullable|max:5000',
            'cart.*.flourType' => ['required', 'string', Rule::in(['Albă', 'Integrală', 'Fără gluten'])],
            'cart.*.colorType' => ['required', 'string'],
            'cart.*.pastaType' => ['required', 'string', Rule::in(['Tagliatelle', 'Spaghete'])],
            'cart.*.packType' => ['required', 'string'],
            'cart.*.quantity' => ['required', 'numeric', 'integer', 'min:1'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 404);
        }

        $item = $validator->validated();
        
        return response()->json($item, 200);

        //aici
        // Mail::to($user->email)->send(new ResetPassword($remember_token, $user));

        // return response()->json(['created' => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
