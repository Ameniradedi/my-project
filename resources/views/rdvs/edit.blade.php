@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="#10b981"><b>Modification d'un rdv </b></font>
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
        <form name="rdv" method="post" action="{{ route('rdvs.update', $rdv->id) }}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="date">Date et heure:</label>
                <input type="text" class="form-control" name="date_et_heure" value="{{ $rdv->date_et_heure }}" />
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card pt-4 border-0">
                    <button type="submit" class="btn btn-primary">Ajouter le rendez vous</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="floatingSelect">Select bureau d'etude :</label>
                <select name="bureau_d_etude_id" class="form-select" id="floatingSelect"
                  aria-label="Floating label select example">
                  <option>Open bureau d'etude menu</option>
                  @foreach ($bureau_d_etudes as $bureau_d_etude)
                  <option value="{{ $bureau_d_etude->id }}" selected>{{ $bureau_d_etude->nom }}</option>
                  @endforeach
                </select>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>












@endsection