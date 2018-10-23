@extends('layouts.app')

@section('content')

<div class="col-md-9 col-md-offset-2 col-lg-9 col-lg-offset-3">
  <div class="card">
    <div class="card-header">Players <a class="btn btn-primary btn-sm float-right" href="/players/create">
    Add New Player</a></div>
    <div class="card-body">

      <ul class="list-group">
      @foreach($players as $player)
        <li class="list-group-item"><a href="/players/{{ $player->id }}">{{$player->first_name }} {{$player->last_name}}</a></li>
      @endforeach
      </ul>
    </div>
  </div>
</div>


@endsection