@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="orange"><b>Modification d'un client </b></font>
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
        <form name="fclient" method="post" action="{{ route('clients.update', $client->id) }}">
          @method('PATCH')
          @csrf

          <div class="card">

            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" name="nom" value="{{ $client->nom }}" />
                </div>
                <div class="form-group">
                  <label for="nom">Prenom:</label>
                  <input type="text" class="form-control" name="prenom" value="{{ $client->prenom }}" />
                </div>

              </div>
              <div class="col-md-6 ">

                <div class="form-group">
                  <label for="adresse">Adresse:</label>
                  <input type="text" class="form-control" name="adresse" value="{{ $client->adresse }}" />
                </div>

                <div class="form-group">
                  <label for="adresse">Email:</label>
                  <input type="text" class="form-control" name="email" value="{{ $client->email }}" />
                </div>


                <div class="form-group">
                  <label for="tel">Tel:</label>
                  <table>
                    <tr>
                      <td><input type="text" class="form-control" name="tel" value="{{ $client->tel }}" /></td>
                      <td>&nbsp;</td>
                      <td>
                        <button type="submit" class="btn btn-primary">Modification du client</button>
                      </td>
                    </tr>
                  </table>
                </div>





              </div>
            </div>

          </div>
        </form>
      </div>
    </div>

    @endsection