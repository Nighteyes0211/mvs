@extends('layouts.headmin')

<style type="text/css">


    .buttons .icon {
        margin-top:35px;
    }
    .active {
      color: red !important;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Group</div>
                <div class="card-body">
                    <p>Willkommen <span style="text-transform: capitalize; font-weight: 600;">{{ Auth::user()->name }},</span><br />
                    was möchtest du erledigen?</p>
                  <div class="row">
                    <div class="col-3">      
                        <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link active" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Gruppen
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                <a class="d-block w-100 " href="{{ url('headmin/group') }}" style="padding: .25rem 1.5rem;">
                                    Gruppen Anzeigen
                                </a>
                                <a class="d-block w-100 card-header active" href="{{ url('headmin/group/create') }}" style="padding: .25rem 1.5rem;">
                                    Neue Gruppe hinzufügen
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Benutzer
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                <div class=" dropdown-menu-right">
                                    <a class="d-block w-100" href="{{ url('headmin/user') }}" style="padding: .25rem 1.5rem;">
                                        Benutzer Anzeigen
                                    </a>
                                    <a class="d-block w-100" href="{{ url('headmin/user/create') }}" style="padding: .25rem 1.5rem;">
                                        Neuen Benutzer hinzufügen
                                    </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <a class="btn btn-link" href="{{ url('headmin/checklist') }}">
                                  Checkliste
                                </a>
                              </h5>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-9">
                      <div class="card">
                        <div class="card-header">
                          <h3>This page is for creating a new Group...</h3>
                        </div>
                        <div class="card-body">
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                          @if(!empty($success))
                            <div class="alert alert-success">
                              <strong>Group Created successfully.</strong>
                            </div>
                          @endif
                          <form action="{{ route('creategroup') }}" method="post">
                            {!! csrf_field() !!}

                            <div>
                              <label for="">Name:</label>
                              <input type="text" class="form-control" id="" placeholder="Group Name" name="name" value="" required>
                              @if ($errors->has('name'))
                                  <span class="" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                            </div>

                            <div>
                              <label for="">Postal Code:</label>
                              <input type="number" class="form-control" id="" placeholder="Postal Code" name="postal" value="" required>
                              @if ($errors->has('postal'))
                                  <span class="" role="alert">
                                      <strong>{{ $errors->first('postal') }}</strong>
                                  </span>
                              @endif
                            </div>

                            <div>
                              <label for="">City:</label>
                              <input type="text" class="form-control" id="" placeholder="City" name="city" value="" required>
                              @if ($errors->has('city'))
                                  <span class="" role="alert">
                                      <strong>{{ $errors->first('city') }}</strong>
                                  </span>
                              @endif
                            </div>

                            <div>
                              <label for="">Street:</label>
                              <input type="text" class="form-control" id="" placeholder="Street" name="street" value="" required>
                              @if ($errors->has('street'))
                                  <span class="" role="alert">
                                      <strong>{{ $errors->first('street') }}</strong>
                                  </span>
                              @endif
                            </div>

                            <div>
                              <label for="">Street Number:</label>
                              <input type="number" class="form-control" id="" placeholder="Street Number" name="streetnum" value="" required>

                            </div>

                            <hr/>
                            <button type="submit" class="btn btn-default">Create</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
