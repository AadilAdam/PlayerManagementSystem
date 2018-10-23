@extends('layouts.app')

@section('content')

<div class="container">

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-6 btn btn-primary" href="/players/{{$player->id}}">View Player</a>
          <a class="p-6 btn btn-primary" href="/players">List Players</a>
        </nav>
      </div>
</div>

<div class="container bg-light">
            <form method="post" action=" {{route('players.update', [$player->id]) }}">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="player-fname">First Name<span class="required">*</span></label>
                    <input placeholder="Enter First Name"
                            id="player-fname"
                            required
                            name="fname"
                            spellcheck="false"
                            class="form-control"
                            value="{{ $player->first_name}}" />
                </div>
                <div class="form-group">
                    <label for="player-lname">Last Name<span class="required">*</span></label>
                    <input placeholder="Enter Last Name"
                            id="player-lname"
                            required
                            name="lname"
                            spellcheck="false"
                            class="form-control"
                            value="{{ $player->last_name}}" />
                </div>
                <div class="form-group">
                    <label for="player-fname">Age<span class="required">*</span></label>
                    <input placeholder="Enter Age"
                            id="player-age"
                            required
                            name="age"
                            spellcheck="false"
                            class="form-control"
                            value="{{ $player->age}}" />
                </div>
                <div class="form-group">
                    <label for="player-fname">Player Role<span class="required">*</span></label>
                    <input placeholder="Enter Role"
                            id="player-role"
                            required
                            name="role"
                            spellcheck="false"
                            class="form-control"
                            value="{{ $player->player_role}}" />
                </div>
                <div class="form-group">
                    <label for="player-fname">Description<span class="required">*</span></label>
                    <textarea placeholder="Enter Description"
                            style="resize:vertical"
                            id="player-desc"
                            required
                            name="description"
                            rows="5" spellcheck="false"
                            class="form-control autosize-target text-left">
                            {{ $player->description }} </textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                            value="Submit"/>
                </div>
            </form>
</div>

@endsection