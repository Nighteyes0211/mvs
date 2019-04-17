@extends('layouts.headmin')

<style type="text/css">


.btn-primary {
  background: none !important;
  color: #666 !important;
  border: none !important;
}

#optionen li {
  float: left;
  margin: 0px 10px 0px 10px;
}

#optionen li:first-child {
  margin: 0px 10px 0px 0px
}
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Group</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table style="width:100%;" class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>City</th>
                                <th>Street</th>
                                <th style="width: 15%;">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($groups as $group)
                                <tr>
                                    <td>{{$group->name}}</td>
                                    <td>{{$group->city}}</td>
                                    <td>{{$group->street}}</td>
                                    <td>
                                        <ul id="optionen">
                                            <li><a href="{{route('group.show',$group->id)}}"><i class="fas fa-eye fa-lg icon"></i></a></li>
                                            <li><a href="{{route('group.edit', $group->id)}}"><i class="fas fa-pencil-alt fa-lg icon"></i></a></li>
                                            <li><a href="javascript: return false;" data-toggle="modal" data-target="#exampleModal" id='{{ route('group.destroy', $group->id) }}' class="delete"><i class="fas fa-trash-alt fa-lg icon" style="color: red;"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @empty
                                <tr>No Group</tr>
                            @endforelse
                            </tbody>
                        </table>
                        @if($groups)
                          <div class="text-center">
                            {!! $groups->render() !!}
                          </div>
                        @endif
                    </div>


            </div>




        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kunde löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sind Sie sicher das Sie den Kunden löschen wollen? <br>
        <span style="color: red">Dieser Vorgang kann nicht rückgängig gemacht werden!</span>
      </div>
      <div class="modal-footer">
        <form method="post" action="">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
       <button  i style="padding: 5px !important;" type="submit" class="btn btn-danger btn-sm"> Löschen</button></li>
    </form>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>
  </div>
</div>

@endsection
