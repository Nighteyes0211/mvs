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
                <div class="card-header">Benutzer bearbeiten</div>

                <div class="card-body">

                    <form action="{{ route('user.update' ,$user[0]->id)}}" method="post">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="put" />
                      <div>
                        <label for="">Vorname:</label>
                        <input type="text" class="form-control" placeholder="User Name" name="name" value="{{ $user[0]->name }}" required>
                        @if ($errors->has('name'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">Nachname:</label>
                        <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{ $user[0]->surname }}">

                      </div>

                      <div>
                        <label for="">Telefon:</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ $user[0]->phone }}">
                        @if ($errors->has('phone'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">E-mail:</label>
                        <input type="email" class="form-control" id="" placeholder="Email" name="email" value="{{ $user[0]->email }}" required readonly>
                        @if ($errors->has('email'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>

  <!--                    <div>
                        <label for="">Mail Address:</label>
                        <input type="text" class="form-control" id="" placeholder="Mail Address" name="mail_address" value="{{ $user[0]->mail_address }}">
                        @if ($errors->has('mail_address'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('mail_address') }}</strong>
                            </span>
                        @endif
                      </div>
-->
                       <div>
                        <label for="">Passwort:</label>
                        <input type="password" class="form-control" id="" placeholder="Passwort" name="password" value="">
                        @if ($errors->has('address'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">Passwort bestätigen:</label>
                        <input type="password" class="form-control" id="" placeholder="Passwort bestätigen" name="password_confirmation" value="">

                      </div> 

                      <div>
                        <label for="">Gruppe:</label>
                        <select name="group" class="form-control">
                          @foreach($groups as $group)
                            @if(isset($user[0]->mygroup))
                              @if($user[0]->mygroup->id == $group->id)
                                <option value="{{$group->id}}" selected>{{$group->name}}</option>
                              @else
                                <option value="{{$group->id}}">{{$group->name}}</option>
                              @endif
                            @else
                              <option value="{{$group->id}}">{{$group->name}}</option>
                            @endif
                          @endforeach
                        <select>

                      </div>

                      <hr/>
                      <button type="submit" class="btn btn-default">Speichern</button>
                    </form>

                </div>




            </div>
        </div>
    </div>
</div>

@endsection
