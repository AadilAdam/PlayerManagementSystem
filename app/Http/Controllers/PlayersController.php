<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $players = Player::all();

        return view('players.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $player = Player::create([
                'first_name'=> $request->input('fname'),
                'last_name'=> $request->input('lname'),
                'age'=> $request->input('age'),
                'player_role' => $request->input('role'),
                'description'=> $request->input('description'),
                'user_id' => $request->user()->id
            ]);
            if($player){
                return redirect()->route('players.show', ['player'=> $player->id])
                ->with('success' , 'Player created successfully');
            }
        }

        return back()->withInput()->with('error', 'Error adding new player');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
        $player = Player::where('id', $player->id)->first();

        return view('players.show', ['player'=>$player]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
        $player = Player::where('id', $player->id)->first();

        return view('players.edit', ['player'=>$player]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        // save data
        $playerUpdate = Player::where('id', $player->id)
        ->update([
            'first_name'=> $request->input('fname'),
            'last_name'=> $request->input('lname'),
            'age'=> $request->input('age'),
            'player_role' => $request->input('role'),
            'description'=> $request->input('description')
        ]);

        if($playerUpdate){
            return redirect()->route('players.show', ['player'=>$player->id])
            ->with('success', 'Player data updated successfully');

        }

        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $findPlayer = Player::find( $player->id);
		if($findPlayer->delete()){

            //redirect
            return redirect()->route('players.index')
            ->with('success' , 'Player deleted successfully');
        }

        return back()->withInput()->with('error' , 'Player could not be deleted');
    }
}
