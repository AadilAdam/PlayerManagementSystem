@extends('layouts.app')

@section('content')

<div class="container">

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-6 btn btn-primary" href="/players">List Players</a>
        </nav>
      </div>
</div>

<div class="container bg-light">
            <form method="post" action=" {{route('players.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="player-fname">First Name<span class="required">*</span></label>
                    <input placeholder="Enter First Name"
                            id="player-fname"
                            required
                            name="fname"
                            spellcheck="false"
                            class="form-control" />
                </div>
                <div class="form-group">
                    <label for="player-lname">Last Name<span class="required">*</span></label>
                    <input placeholder="Enter Last Name"
                            id="player-lname"
                            required
                            name="lname"
                            spellcheck="false"
                            class="form-control" />
                </div>
                <div class="form-group">
                    <label for="player-fname">Age<span class="required">*</span></label>
                    <input placeholder="Enter Age"
                            id="player-age"
                            required
                            name="age"
                            spellcheck="false"
                            class="form-control" />
                </div>
                <div class="form-group">
                    <label for="player-fname">Player Role<span class="required">*</span></label>
                    <input placeholder="Enter Role"
                            id="player-role"
                            required
                            name="role"
                            spellcheck="false"
                            class="form-control" />
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

                            </textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                            value="Submit"/>
                </div>
            </form>
</div>

@endsection