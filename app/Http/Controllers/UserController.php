<?php

/**
 * @Author: C Yongky Pranowo
 * @Date:   2019-11-30 22:33:08
 * @Last Modified by:   C Yongky Pranowo
 * @Last Modified time: 2019-12-13 17:02:45
 */

namespace App\Http\Controllers;

use App\Models\MstUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = MstUser::select('id', 'user_name','user_email')->get();
        $data['totals'] = $data['data']->count();
        return response()->json($data, 200);
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
        $MstUser = MstUser::where('user_email', $request->input('user_email'))->first();
        if ($MstUser) {
            return response()->json(['message' => 'user_email already exists.'], 400);
        } else {
            $data = new MstUser();
            $data->user_name = $request->input('user_name');
            $data->user_email = $request->input('user_email');
            $data->user_password = hash::make($request->input('user_password'));
            $data->save();
            return response()->json(['message' => 'Data created'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MstUser::where('id', $id)->get();
        return response()->json($data, 200);
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
        $MstUser = MstUser::where('user_email', $request->input('user_email'))->first();
        if ($MstUser) {
            return response()->json(['message' => 'user_email already exists.'], 400);
        } else {
            $data = MstUser::where('id', $id)->first();
            $data->user_name = $request->input('user_name');
            $data->user_email = $request->input('user_email');
            $data->user_password = hash::make($request->input('user_password'));
            try {
                $data->save();
                return $data ? response(['message' => 'data updated'], 200) : response(['message' => 'data not found'], 404);
            } catch (\Illuminate\Database\QueryException $ex) {
                return response()->json(['message' => 'bad request'], 400);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MstUser::where('id', $id)->first();
        $data->delete();
        return $data ? response(['message' => 'data deleted'], 200) : response(['message' => 'data not found'], 404);
    }
}
