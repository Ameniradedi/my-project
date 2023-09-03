@extends('layouts.app')

@section('content')
<div class="row" style="width:600px;">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Ajouter un produit agricole </b></font>
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
      <form method="post" action="{{ route('produit agricoles.store') }}">
        @csrf

        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="produit agricole">Nom:</label>
              <input type="text" class="form-control" name="nom" />
            </div>
            <div class="form-group">
              <label for="produit agricole">produit agricole:</label>
              <input type="text" class="form-control" name="produit agricole" />
            </div>
            <div class="form-group">
              <label for="prix">prix:</label>
              <input type="text" class="form-control" name="prix" />
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="adresse">Form:</label>
              <input type="text" class="form-control" name="adresse" />
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <button type="submit" class="btn btn-primary">Ajouter le produit agricole  </button>
        </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
