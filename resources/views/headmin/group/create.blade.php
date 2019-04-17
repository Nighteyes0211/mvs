@extends('layouts.headmin')

<style type="text/css">


    .buttons .icon {
        margin-top:35px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Group</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h3>This page is for creating a new Group...</h3>
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
@endsection
