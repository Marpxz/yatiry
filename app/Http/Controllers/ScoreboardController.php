<?php

namespace App\Http\Controllers;

use App\College;
use App\Scoreboard;
use Illuminate\Http\Request;
use App\Http\Resources\Scoreboard as ScoreboardResource;

class ScoreboardController extends Controller
{
    public function index()
    {
        $rankings = Scoreboard::orderBy('score', 'desc')->take(5)->get();
        return ScoreboardResource::collection($rankings);
    }
    public function Scoreboard(Request $request)
    {
        $college = College::find($request->college_id);
        $scores = Scoreboard::where('college_id', $request->college_id);
        $rankings = $scores->orderBy('score', 'desc')->take(10)->get();
        return ScoreboardResource::collection($rankings);
    }
    public function create()
    { }
    public function store(Request $request)
    {
        $Scoreboard = new Scoreboard();
        $Scoreboard->score = $request->input('score');
        $Scoreboard->user_id = $request->input('user_id');
        $Scoreboard->college_id = $request->input('college_id');
        if ($Scoreboard->save()) {
            return new ScoreboardResource($Scoreboard);
        }
    }
    public function show(Request $request)
    {
        if ($Scoreboard = Scoreboard::find($request->input('user_id'))) {
            return new ScoreboardResource($Scoreboard);
        } else {
            return response()->json([
                'message' => 'No existe registro de este jugador'
            ], 200);
        }
    }
    public function edit(Request $request)
    {
        $Scoreboard = Scoreboard::find($request->input('user_id'));
        $Scoreboard->score = $request->input('score');
        if ($Scoreboard->save()) {
            return new ScoreboardResource($Scoreboard);
        }
    }
    // public function update(Request $request)
    // {
    //     $Scoreboards = Scoreboard::where('user_id', $request->input('user_id'))->get();
    //     foreach ($Scoreboards as $Scoreboard) {
    //         $Scoreboard->score = $request->input('score');
    //         if ($Scoreboard->save()) {
    //             return new ScoreboardResource($Scoreboard);
    //         }
    //     }
    // }
    public function destroy(Scoreboard $Scoreboard)
    { }
}
