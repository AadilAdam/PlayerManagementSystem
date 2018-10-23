@extends('layouts.app')

@section('content')
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-6 btn btn-primary" href="/players/{{$player->id}}/edit">Edit</a>

          <a class="p-6 btn btn-primary" href="#"
            onclick=
            "var result = confirm('Are you sure you want to delete this player?');
                if (result){
                    event.preventDefault();
                    document.getElementById('delete-form').submit();
                    }
                    "
                    >
            Delete</a>

            <form id="delete-form" action="{{ route('players.destroy', [$player->id]) }}"
            method="POST" style="display:none;">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
            </form>

            <a class="p-6 btn btn-primary" href="/players">List Players</a>
        </nav>
      </div>

      <div class="jumbotron p-3 p-md-5 text-light rounded bg-secondary">
        <div class="col-md-6 px-0">
          <h1 class="display-4"> {{ $player->first_name }} {{ $player->last_name }}</h1>
          <p class="lead my-3">Age: {{$player->age}}</p>
          <p class="lead my-3">Role: {{$player->player_role}}</p>
          <p class="lead my-3 text-justify">{{$player->description}}</p>
        </div>
      </div>
    </div>

@endsection

