@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="#10b981"><b>Modification terrain </b></font>
      </h4>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br />
    @endif
    <div class="row">
      <div class="col-12">
        <form name="terrain" method="post" action="{{ route('terrains.update', $terrain->id) }}">
          @method('PATCH')
          @csrf

          <div class="row">
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="client">Nom:</label>
                <input type="text" class="form-control" name="nom" value="{{ $terrain->nom }}" />
              </div>
              <div class="form-group">
                <label for="client">Numero proprietaire:</label>
                <input type="text" class="form-control" name="numero_proprietaire"
                  value="{{ $terrain->numero_proprietaire }}" />
              </div>
              <div class="form-group">
                <label for="client">espace:</label>
                <input type="text" class="form-control" name="espace" value="{{ $terrain->espace }}" />
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="ville">prix:</label>
                <input type="text" class="form-control" name="prix" value="{{ $terrain->prix }}" />
              </div>
              <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" name="adresse" value="{{ $terrain->adresse }}" />
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value="{{ $terrain->description }}" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 py-4">
              <div class="card border-0">
                <button type="submit" class="btn btn-primary" style="max-width: 200px;">Ajouter le terrain</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




@endsection