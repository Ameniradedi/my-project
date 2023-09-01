
 

@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="orange"><b>Modification d'un engin </b></font>
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
        <form name="engin" method="post" action="{{ route('engin.update', $engin->id) }}">
          @method('PATCH')
          @csrf

          <div class="card">

            <div class="row">
              <div class="col-md-6 ">
                <div class="nom-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" name="nom" value="{{ $engin->nom }}" />
                </div>
                <div class="form-group">
                  <label for="caracteristique">caracteristique:</label>
                  <input type="text" class="form-control" name="caracteristique" value="{{ $engin->caracteristique }}" />
                </div>
                <div class="form-group">
                  <label for="ville">prix:</label>
                  <input type="text" class="form-control" name="prix" value="{{ $engin->prix }}" />
                </div>

              </div>
              <div class="col-md-6 ">

                <div class="form-group">
                  <label for="tel">Form:</label>
                  <table>
                    <tr>
                      <td><input type="text" class="form-control" name="forme" value="{{ $engin->forme }}" /></td>
                      <td>&nbsp;</td>
                      <td>
                        <button type="submit" class="btn btn-primary">Modification du engin</button>
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