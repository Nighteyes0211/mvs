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
                <div class="card-header">Show Group</div>

                <div class="card-body">

                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="put" />
                      <div>
                        <label for="">Group Name:</label>
                        <input type="text" class="form-control" id="" placeholder="Group Name" name="name" value="{{ $groupdata[0]->name }}" readonly>

                      </div>

                      <div>
                        <label for="">Postal Code:</label>
                        <input type="text" class="form-control" id="" placeholder="Address" name="address" value="{{ $groupdata[0]->postal_code }}" readonly>

                      </div>

                      <div>
                        <label for="">City:</label>
                        <input type="text" class="form-control" id="" placeholder="Address" name="address" value="{{ $groupdata[0]->city }}" readonly>

                      </div>

                      <div>
                        <label for="">Street:</label>
                        <input type="text" class="form-control" id="" placeholder="Address" name="address" value="{{ $groupdata[0]->street }}" readonly>

                      </div>

                      <div>
                        <label for="">Street Number:</label>
                        <input type="text" class="form-control" id="" placeholder="Address" name="address" value="{{ $groupdata[0]->street_num }}" readonly>

                      </div>


                      <div>
                        <label for="">Group Leader:</label>

                        @forelse($users as $user)

                            <input type="text" class="form-control" id="" placeholder="Group Leader" name="address" value="{{ $user->name }}" readonly>

                        @empty
                          <input type="text" class="form-control" id="" placeholder="Group Leader" name="address" readonly>
                        @endforelse
                      </div>



                </div>




            </div>
        </div>
    </div>
</div>

@endsection
