@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="orange"><b>Modification d'un produit agricole </b></font>
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
        <form name="fproduit agricole" method="post" action="{{ route('produit agricoles.update', $produit agricole->id) }}">
          @method('PATCH')
          @csrf

          <div class="card">

            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" name="nom" value="{{ $produit agricole->nom }}" />
                </div>
                <div class="form-group">
                  <label for="prix">:</label>
                  <input type="text" class="form-control" name="prix" value="{{ $produit agricole->prix }}" />
                </div>
                <div class="form-group">
                  <label for="ville">description:</label>
                  <input type="text" class="form-control" name="desciption" value="{{ $produit agricole->desciption }}" />
              </div>
              <div class="col-md-6 ">

                <div class="form-group">
                  <label for="tel">Form:</label>
                  <table>
                    <tr>
                      <td><input type="text" class="form-control" name="forme" value="{{ $produit agricole->forme }}" /></td>
                      <td>&nbsp;</td>
                      <td>
                        <button type="submit" class="btn btn-primary">Modification du produit agricole</button>
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