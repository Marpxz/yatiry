<?php

namespace App\Http\Controllers;

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
        $rankings = Scoreboard::orderBy('score', 'desc')->where('exam_id', $request->input('exam_id'))->take(5)->get();
        return ScoreboardResource::collection($rankings);
    }
    public function create()
    { }
    public function store(Request $request)
    {
        $Scoreboard = new Scoreboard();
        $Scoreboard->score = $request->input('score');
        $Scoreboard->user_id = $request->input('user_id');
        if ($Scoreboard->save()) {
            return new ScoreboardResource($Scoreboard);
        }
    }
    public function show(Request $request)
    {
        $Scoreboards = Scoreboard::where('user_id', $request->input('user_id'))->get();
        return ScoreboardResource::collection($Scoreboards);
    }
    public function edit(Request $request)
    {
        $Scoreboard = Scoreboard::find($request->input('user_id'));
        $Scoreboard->score = $request->input('score');
        if ($Scoreboard->save()) {
            return new ScoreboardResource($Scoreboard);
        }
    }
    public function update(Request $request)
    {
        $Scoreboards = Scoreboard::where('user_id', $request->input('user_id'))->get();
        foreach ($Scoreboards as $Scoreboard) {
            $Scoreboard->score = $request->input('score');
            if ($Scoreboard->save()) {
                return new ScoreboardResource($Scoreboard);
            }
        }
    }
    public function destroy(Scoreboard $Scoreboard)
    { }
}
