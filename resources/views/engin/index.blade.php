@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Gestion des engins</b></font>
    </h4>
  </div>
  <div class="col-md-12">
    <a style="margin: 19px;" href="{{ route('engin.create')}}" class="btn btn-primary"><b>Ajouter un nouveau
        engins</b></a>
  </div>
  <div class="col-md-12">
    <div style="display:block;position:relative;height:300px;overflow:auto;">
      <table class="table table-hover table-condensed ">
        <thead>
          <tr>
            <th style="background-color:orange;">
              <font color="white"><b>ID engins</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Nom</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>caracteristique</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>prix</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Form</b></font>
            </th>
            <th style="background-color:orange;text-align:center;" colspan="4">
              <font color="white"><b>Actions</b></font>
            </th>



          </tr>
        </thead>

        <tbody>
          @foreach($engin as $engins)
          <tr>
            <td style="vertical-align:middle;">{{$engins->id}}</td>
            <td style="vertical-align:middle;">{{$engins->nom}}</td>
            <td style="vertical-align:middle;">{{$engins->caracteristique}}</td>
            <td style="vertical-align:middle;">{{$engins->prix}}</td>
            <td style="vertical-align:middle;">{{$engins->adresse}}</td>
            <td colspan="2"></td>
            <td>
              <a href="{{ route('engin.edit',$engins->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('engin.destroy', $engins->id)}}" method="post">
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