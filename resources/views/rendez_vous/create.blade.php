@extends('layouts.app')

@section('content')
<div class="row" style="width:600px;">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Ajouter un rdv </b></font>
    </h4>
    <div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
      @endif
      <form method="post" action="{{ route('rdvs.store') }}">
        @csrf
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="floatingSelect">Select bureau d'etude :</label>
              <select name="getbureau d'etude" class="form-select" id="floatingSelect"
                aria-label="Floating label select example">
                <option selected>Open bureau d'etude menu</option>
                @foreach ($bureau d'etude as $bureau d'etude)
                <option value="{{ $bureau d'etude->id }}">{{ $bureau d'etude->prenom }} {{ $bureau d'etude->nom }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="floatingSelect">Select client :</label>
              <select name="getclient" class="form-select" id="floatingSelect"
                aria-label="Floating label select example">
                <option selected>Open client menu</option>
                @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->prenom }} {{ $client->nom }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="date">Date:</label>
              <input type="text" class="form-control" name="date" />
            </div>
            <div class="form-group">
              <label for="heure">heure:</label>
              <input type="text" class="form-control" name="heure" />
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <button type="submit" class="btn btn-primary">Ajouter le rdv</button>
                </div>
              </div>
            </div>
            <script>
            </script>
      </form>
    </div>
  </div>
</div>










































@endsection