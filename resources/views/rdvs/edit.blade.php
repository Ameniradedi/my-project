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
                                <label for="floatingSelect">Select bureau d'etude :</label>
                                <select name="getbureau d'etude" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    <option>Open bureau d'etude menu</option>
                                    @foreach ($bureau d'etude as $bureau d'etude)
                                    <option value="{{ $bureau d'etude->id }}" selected>{{ $bureau d'etude->prenom }}
                                        {{ $bureau d'etude->nom }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="date">Date :</label>
                                <input type="text" class="form-control" name="date" value="{{ $rdv->date }}" />
                            </div>
                            <div class="form-group">
                                <label for="heure">Heure:</label>
                                <input type="text" class="form-control" name="heure" value="{{ $rdv->heure }}" />
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <button style="margin: 1rem;margin-left: 0;" type="submit" class="btn btn-primary">Modification du
                                            rdv</button>
                                    </td>
                                </tr>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                        </div>
                    </div>
                </form>
            </div>



        </div>


        @endsection