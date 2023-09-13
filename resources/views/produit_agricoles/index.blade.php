@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h4>
      <font color="#10b981"><b>Gestion des produit agricole</b></font>
    </h4>
  </div>
  <div class="col-md-12">
    <a style="margin: 19px;" href="{{ route('produit_agricoles.create')}}" class="btn btn-primary"><b>Ajouter un
        produit agricole</b></a>
  </div>
  <div class="col-md-12">
    <div style="display:block;position:relative;height:300px;overflow:auto;">
      <table class="table table-hover table-condensed ">
        <thead>
          <tr>
            <th style="background-color:#10b981;">
              <font color="white"><b>ID produit agricole</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>Nom</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>Adresse</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>Prix</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>Nom d'utilisateur</b></font>
            </th>

            <th style="background-color:#10b981;text-align:center;" colspan="4">
              <font color="white"><b>Actions</b></font>
            </th>
          </tr>
        </thead>

        <tbody>
          @foreach($produit_agricoles as $produit_agricole)
          <tr>
            <td style="vertical-align:middle;">{{$produit_agricole->id}}</td>
            <td style="vertical-align:middle;">{{$produit_agricole->nom}}</td>
            <td style="vertical-align:middle;">{{$produit_agricole->adresse}}</td>
            <td style="vertical-align:middle;">{{$produit_agricole->prix}}</td>
            <td style="vertical-align:middle;">{{$produit_agricole->user_name}}</td>
            <td colspan="2"></td>
            <td>
              <a href="{{ route('produit_agricoles.edit',$produit_agricole->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('produit_agricoles.destroy', $produit_agricole->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">X</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
    </div>
    <div class="col-sm-12">

      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
    </div>

    @endsection
