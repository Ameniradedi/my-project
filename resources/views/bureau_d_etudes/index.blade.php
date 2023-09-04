@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h4>
            <font color="#10b981"><b>Gestion des produit agricole</b></font>
        </h4>
    </div>
    <div class="col-md-12">
        <a style="margin: 19px;" href="{{ route('bureau_d_etudes.create')}}" class="btn btn-primary"><b>Ajouter un
                produit agricole</b></a>
    </div>
    <div class="col-md-12">
        <div style="display:block;position:relative;height:300px;overflow:auto;">
            <table class="table table-hover table-condensed ">
                <thead>
                    <tr>
                        <th style="background-color:#10b981;">
                            <font color="white"><b>ID Bureau d'etude</b></font>
                        </th>
                        <th style="background-color:#10b981;">
                            <font color="white"><b>Nom</b></font>
                        </th>
                        <th style="background-color:#10b981;">
                            <font color="white"><b></b></font>
                        </th>
                        <th style="background-color:#10b981;">
                            <font color="white"><b></b></font>
                        </th>
                        <th style="background-color:#10b981;">
                            <font color="white"><b>adresse</b></font>
                        </th>
                        <th style="background-color:#10b981;text-align:center;" colspan="4">
                            <font color="white"><b>Actions</b></font>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($bureau_d_etudes as $bureau_d_etude)
                    <tr>
                        <td style="vertical-align:middle;">{{$bureau_d_etude->id}}</td>
                        <td style="vertical-align:middle;">{{$bureau_d_etude->nom}}</td>
                        <td style="vertical-align:middle;"></td>
                        <td style="vertical-align:middle;"></td>
                        <td style="vertical-align:middle;">{{$bureau_d_etude->adresse}}</td>
                        <td colspan="2"></td>
                        <td>
                            <a href="{{ route('bureau_d_etudes.edit',$bureau_d_etude->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('bureau_d_etudes.destroy', $bureau_d_etude->id)}}" method="post">
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