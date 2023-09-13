@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="#10b981"><b>Modification d'un engin </b></font>
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
        <form name="engin" method="post" action="{{ route('engins.update', $engin->id) }}">
          @method('PATCH')
          @csrf

          <div class="row">
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="client">Nom:</label>
                <input type="text" class="form-control" name="nom" value="{{ $engin->nom }}" />
              </div>
              <div class="form-group">
                <label for="client">caracteristique:</label>
                <input type="text" class="form-control" name="caracteristique" value="{{ $engin->caracteristique }}" />
              </div>

            </div>
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="prix">prix:</label>
                <input type="text" class="form-control" name="prix" value="{{ $engin->prix }}" />
              </div>
              <div class="form-group">
                <label for="ville">Adresse:</label>
                <input type="text" class="form-control" name="adresse" value="{{ $engin->adresse }}" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mt-3">
              <div class="card">
                <button type="submit" class="btn btn-primary">Ajouter l'engin</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    @endsection
