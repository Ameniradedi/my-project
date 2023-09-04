@extends('layouts.app')

@section('content')
<div class="row" style="width:600px;">
    <div class="col-12">
        <div style="width:800px;">
            <h4>
                <font color="#10b981"><b>Modification d'un produit agricole </b></font>
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
                <form name="bureau_d_etude" method="post" action="{{ route('bureau_d_etudes.update', $bureau_d_etude->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="card border-0">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="nom">Nom:</label>
                                    <input type="text" class="form-control" name="nom" value="{{ $bureau_d_etude->nom }}" />
                                </div>
                                <div class="form-group pt-4">
                                    <button type="submit" class="btn btn-primary">Modification du produit agricole</button>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="prix">Adresse:</label>
                                    <input type="text" class="form-control" name="adresse" value="{{ $bureau_d_etude->adresse }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>










        @endsection