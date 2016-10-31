<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Meeting;

class MeetingController extends Controller
{
    public function __construct()
    {
        //$this->middleware('name');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = Meeting::all();

        echo config('app.name');

        return response()->json($meetings, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'time' => 'required'
        ]);

        $rules = [

        ];

        $title = $request->input('title');
        $description = $request->input('description');
        $time = $request->input('time');
        $userId = $request->input('user_id');

        $modelMeeting = new Meeting();

        $modelMeeting->title = $title;
        $modelMeeting->description = $description;
        $modelMeeting->time = $time;

        if($modelMeeting->save()) {

            $meeting = [

                'title' => $modelMeeting->title,
                'description' => $modelMeeting->description,
                'time' => $modelMeeting->time,
                'view_meeting' => [
                    'url' => 'api/v1/meeting/'.$modelMeeting->id,
                    'method' => 'GET'
                ]
            ];

            $response = [
                'msg' => 'Meeting created successfully',
                'meeting' => $meeting
            ];

            return response()->json($response, 201);
        }

        $response = [
                'msg' => 'An error occured'
            ];

        return response()->json($response, 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
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
        return 'patch '.$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'delete';
    }
}
