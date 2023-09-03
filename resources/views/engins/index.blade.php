@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h4>
      <font color="#10b981"><b>Gestion des engins</b></font>
    </h4>
  </div>
  <div class="col-md-12">
    <a style="margin: 19px;" href="{{ route('engins.create')}}" class="btn btn-primary"><b>Ajouter un nouveau
        engins</b></a>
  </div>
  <div class="col-md-12">
    <div style="display:block;position:relative;height:300px;overflow:auto;">
      <table class="table table-hover table-condensed ">
        <thead>
          <tr>
            <th style="background-color:#10b981;">
              <font color="white"><b>ID engins</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>Nom</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>caracteristique</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>prix</b></font>
            </th>
            <th style="background-color:#10b981;">
              <font color="white"><b>Form</b></font>
            </th>
            <th style="background-color:#10b981;text-align:center;" colspan="4">
              <font color="white"><b>Actions</b></font>
            </th>



          </tr>
        </thead>

        <tbody>
          @foreach($engins as $engin)
          <tr>
            <td style="vertical-align:middle;">{{$engin->id}}</td>
            <td style="vertical-align:middle;">{{$engin->nom}}</td>
            <td style="vertical-align:middle;">{{$engin->caracteristique}}</td>
            <td style="vertical-align:middle;">{{$engin->prix}}</td>
            <td style="vertical-align:middle;">{{$engin->adresse}}</td>
            <td colspan="2"></td>
            <td>
              <a href="{{ route('engins.edit',$engin->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('engins.destroy', $engin->id)}}" method="post">
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