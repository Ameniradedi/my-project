@extends('layouts.app')

@section('content')
<div class="row" style="width:600px;">
  <div class="col-md-12">
    <h4>
      <font color="#10b981"><b>Ajouter un rdv </b></font>
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
              <label for="date">Date et heure:</label>
              <input type="text" class="form-control" name="date_et_heure" />
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card pt-4 border-0">
                  <button type="submit" class="btn btn-primary">Ajouter le render vous</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="floatingSelect">Select client :</label>
              <select name="bureau_d_etude_id" class="form-select" id="floatingSelect"
                aria-label="Floating label select example">
                <option selected>Open bureau d'etude menu</option>
                @foreach ($bureau_d_etudes as $bureau_d_etude)
                <option value="{{ $bureau_d_etude->id }}">{{ $bureau_d_etude->nom }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>





























































@endsection