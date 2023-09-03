@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h4>
      <font color="#10b981"><b>Gestion des terrain</b></font>
    </h4>
  </div>
  <div class="col-md-12">
    <a style="margin: 19px;" href="{{ route('terrains.create')}}" class="btn btn-primary"><b>Ajouter un nouveau
        terrain</b></a>
  </div>
  <div class="col-md-12">
    <div style="display:block;position:relative;height:300px;overflow:auto;">
      <table class="table table-hover table-condensed ">
        <thead>
          <tr>
            <th style="background-color:#10b981;">
              <font color="white"><b>ID terrain</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>nom</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>espace</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>prix</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>adresse</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>description</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>num tel proprietaire</b></font>
            </th>
            <th style="background-color:#10b981;text-align:center;" colspan="4">
              <font color="white"><b>action</b></font>
            </th>



          </tr>
        </thead>

        <tbody>
          @foreach($terrains as $terrain)
          <tr>
            <td style="vertical-align:middle;">{{$terrain->id}}</td>
            <td style="vertical-align:middle;">{{$terrain->nom}}</td>
            <td style="vertical-align:middle;">{{$terrain->espace}}</td>
            <td style="vertical-align:middle;">{{$terrain->prix}}</td>
            <td style="vertical-align:middle;">{{$terrain->adresse}}</td>
            <td style="vertical-align:middle;">{{$terrain->description}}</td>
            <td style="vertical-align:middle;">{{$terrain->numero_proprietaire}}</td>
            <td colspan="2"></td>
            <td>
              <a href="{{ route('terrains.edit',$terrain->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('terrains.destroy', $terrain->id)}}" method="post">
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