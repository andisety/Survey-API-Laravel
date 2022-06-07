<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;
use Exception;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Survey::all();
        if ($data) {
            // return ApiFormatter::createApi(200, 'succes', $data);
            return ApiFormatter::createApi($data);
        } else {
            return ApiFormatter::createApi(400, 'failed');
        }
        // return $data;
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
        try {
            $request->validate([
                'nokk' => 'required',
                'jumlahAnggota' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
            ]);

            $survey = Survey::create([
                'nokk' => $request->nokk,
                'jumlahAnggota' => $request->jumlahAnggota,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);

            $data = Survey::where('id', '=', $survey->id)->get();

            if ($data) {
                return array('message' => 'created');
            } else {
                return array('message' => 'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed');
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
        $data = Survey::where('id', '=', $id)->get();

        // if ($data) {
        //     return ApiFormatter::createApi(200, 'succes', $data);
        // } else {
        //     return ApiFormatter::createApi(400, 'failed');
        // }
        return $data;
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
        try {
            $request->validate([
                'nokk' => 'required',
                'jumlahAnggota' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
            ]);


            $survey = Survey::findOrFail($id);
            $survey->update([
                'nokk' => $request->nokk,
                'jumlahAnggota' => $request->jumlahAnggota,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);

            $survey->save();

            if ($survey) {
                return array('message' => 'edited');
            } else {
                return array('message' => 'failed');
            }
        } catch (Exception $error) {
            return array('message' => $error);
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
        $survey = Survey::where('id', '=', $id)->first();
        $data = $survey->delete();

        if ($data) {
            return array('message' => 'deleted');
        } else {
            return array('message' => 'failed');
        }
    }
}
