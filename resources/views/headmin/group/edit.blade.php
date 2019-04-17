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
                <div class="card-header">Edit Group</div>

                <div class="card-body">

                    <form action="{{route('group.update',$groupdata[0]->id )}}" method="post">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="put" />
                      <div>
                        <label for="">Group Name:</label>
                        <input type="text" class="form-control" id="" placeholder="Group Name" name="name" value="{{ $groupdata[0]->name }}" required>
                        @if ($errors->has('name'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">Postal Code:</label>
                        <input type="number" class="form-control" id="" placeholder="Postal Code" name="postal" value="{{ $groupdata[0]->postal_code }}" required>
                        @if ($errors->has('postal'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('postal') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">City:</label>
                        <input type="text" class="form-control" id="" placeholder="City" name="city" value="{{ $groupdata[0]->city }}" required>
                        @if ($errors->has('city'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">Street:</label>
                        <input type="text" class="form-control" id="" placeholder="Street" name="street" value="{{ $groupdata[0]->street }}" required>
                        @if ($errors->has('street'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">Street Number:</label>
                        <input type="number" class="form-control" id="" placeholder="Street Number" name="streetnum" value="{{ $groupdata[0]->street_num }}" required>

                      </div>

                      <div>
                        <label for="">Group Leader</label>
                        <select name="groupleader" class="form-control">
                          @foreach($users as $user)
                            @if($user->status == '1')
                              <option value="{{$user->id}}" selected>{{$user->name}}</option>
                            @else
                              <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif
                          @endforeach
                        <select>

                      </div>

                      <hr/>
                      <button type="submit" class="btn btn-default">Update</button>
                    </form>

                </div>




            </div>
        </div>
    </div>
</div>

@endsection
