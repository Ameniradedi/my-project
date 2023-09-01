@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="orange"><b>Modification terrain </b></font>
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
        <form name="terrain" method="post" action="{{ route('terrain.update', $terrain->id) }}">
          @method('PATCH')
          @csrf

          <div class="card">

            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" name="nom" value="{{$terrain ->nom }}" />
                </div>
                <div class="form-group">
                  <label for="nom">espacee:</label>
                  <input type="text" class="form-control" name="espace" value="{{ $terrain->espace }}" />
                </div>
                <div class="form-group">
                  <label for="ville">prix:</label>
                  <input type="text" class="form-control" name="prix" value="{{ $terrain->prix}}" />
                </div>

              </div>
              <div class="col-md-6 ">

                <div class="form-group">
                  <label for="tel">Form:</label>
                  <table>
                    <tr>
                      <td><input type="text" class="form-control" name="forme" value="{{ $terrain->forme }}" /></td>
                      <td>&nbsp;</td>
                      <td>
                        <button type="submit" class="btn btn-primary">Modification de terrain</button>
                      </td>
                    </tr>
                  </table>
                </div>