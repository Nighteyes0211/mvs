@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

<style type="text/css">


    .buttons .icon {
        margin-top:35px;
    }
</style>

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Benutzer</div>

                <div class="card-body">

                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="put" />
                      <div>
                        <label for="">Vorname:</label>
                        <input type="text" class="form-control" id="" placeholder="Vorname" name="name" value="{{ $users[0]->name }}" readonly>
                      </div>
                      <div>
                        <label for="">Nachname:</label>
                        <input type="text" class="form-control" id="" placeholder="Nachname" name="name" value="{{ $users[0]->surname }}" readonly>
                      </div>
                      <div>
                        <label for="">E-mail:</label>
                        <input type="Email" class="form-control" id="" placeholder="E-mail" name="" value="{{ $users[0]->email }}" readonly>
                      </div>
<!--                      <div>
                        <label for="">Email Address:</label>
                        <input type="text" class="form-control" id="" placeholder="Email Address" name="" value="{{ $users[0]->mail_address }}" readonly>
                      </div>
-->
                      <div>
                        <label for="">Telefon:</label>
                        <input type="text" class="form-control" id="" placeholder="Telefon" name="" value="{{ $users[0]->phone }}" readonly>
                      </div>
                      <div>
                        <label for="">Gruppe:</label>@if($users[0]->status == '1') <strong>(Gruppenleiter)<strong> @else @endif
                        @if(isset($users[0]->mygroup))
                        <input type="text" class="form-control" id="" placeholder="Group" name="" value="{{ $users[0]->mygroup->name }}" readonly>
                        @else
                        <input type="text" class="form-control" id="" placeholder="Group" name="" value="" readonly>
                        @endif
                      </div>


                </div>




            </div>
        </div>
    </div>
</div>

@endsection
