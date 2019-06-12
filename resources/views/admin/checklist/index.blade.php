
@extends('layouts.headmin')

<style type="text/css">


    .buttons .icon {
        margin-top:35px;
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
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Willkommen <span style="text-transform: capitalize; font-weight: 600;">{{ Auth::user()->name }},</span><br />
                    was möchtest du erledigen?</p>

                    <div class="row">
                      <div class="col-6">
                        <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Gruppen
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h3 class="w-100">Alle Gruppen
                                  <a href="{{ url('headmin/group/create') }}" class="pull-right btn btn-primary">Neue</a>
                                </h3>
                                <div class="table-responsive">
                                    <table style="width:100%;" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Street</th>
                                            <th style="width: 25%;">Options</th>
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
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <h3 class="w-100">Alle Benutzer
                                  <a href="{{ url('headmin/user/create') }}" class="pull-right btn btn-primary">Neue</a>
                                </h3>
                                <div class="table-responsive">
                                    <table style="width:100%;" class="table">
                                        <thead>
                                        <tr>
                                            <th>Vorname</th>
                                            <th>E-Mail</th>
                                            <th style="width: 25%;">Optionen</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>

                                                <td>
                                                    <ul id="optionen">
                                                        <li><a href="{{route('user.show' ,$user->id)}}"><i class="fas fa-eye fa-lg icon"></i></a></li>
                                                        <li><a href="{{route('user.edit' ,$user->id)}}"><i class="fas fa-pencil-alt fa-lg icon"></i></a></li>
                                                        <li><a href="javascript: return false;" data-toggle="modal" data-target="#exampleModal" id='{{route('user.destroy' ,$user->id)}}' class="delete"><i class="fas fa-trash-alt fa-lg icon" style="color: red;"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>No Group</tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    @if($users)
                                      <div class="text-center">
                                        {!! $users->render() !!}
                                      </div>
                                    @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6" style="margin: auto">
                          <h3>Unterlagen Checkliste</h3>
                          <form class="w-100" action="{{route('checklist')}}" method="post">
                            @csrf
                            <div class=" row">
                              <div class="col-8">
                                <input type="text" name="body" value="{{old('body')}}" class="form-control" style="margin-bottom: 15px" placeholder="">
                                @if ($errors->has('body'))
                                    <span class="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <div class="col-4">
                                <select class="custom-select" name="category">
                                  <option value="Personal">Personal</option>
                                  <option value="Work">Work</option>
                                </select>
                              </div>
                            </div>
                            <p class="text-right p-10"><button class="btn btn-primary">Neuen Punkt hinzufügen</button></p>
                          </form>
                          <ul>
                            @foreach($checklists as $checklist)
                            <li class="form-control mb-2">
                                <div class="row checklist-item">
                                  <div class="col-8">
                                    <span>{{$checklist->body}}</span> | 
                                    <span>{{$checklist->category}}</span>
                                  </div>
                                  <div class="col-4 text-right">
                                      <a href="javascript:void(0)" data-id="{{$checklist->id}}" data-body="{{$checklist->body}}" data-category="{{$checklist->category}}" onclick="editFunction(this)"><i class="fas fa-pencil-alt"></i> bearbeiten</a> |
                                      <a href="javascript:void(0)" data-id="{{$checklist->id}}" onclick="deleteFunction(this)"><i class="fas fa-trash"></i> löschen</a>
                                  </div>
                                </div>
                            </li>
                            @endforeach
                          </ul>
                      </div>
                    </div>
            </div>

        <div class="container">


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
           <button  i style="padding: 5px !important;" type="submit" class="btn btn-danger btn-sm"> Löschen</button>
        </form>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  function deleteFunction(th) {
    $.ajax({
        url: "{{route('deleteChecklist')}}",
        type: 'post',
        data: {
            _token: $('[name="_token"]').val(),
            data_id: $(th).data('id')
        },
        success: function (res) {
          if(res.success == true) {
            $(th).parents('li').fadeOut();
          }
        }
    });
  }
  function editFunction(th) {
    let body = $(th).data('body');
    let category = $(th).data('category');
    let id = $(th).data('id');

    let content= `
          <div class="col-8">
            <form class="updateForm" style="margin: 0;" action="{{route('checklistUpdate')}}" method="post">
              @csrf
              <input type="hidden" name="data_id" value="`+id+`">
              <div class=" row">
                <div class="col-8">
                  <input type="text" name="body" value="`+body+`" class="w-100" placeholder="body text">
                </div>
                <div class="col-4">
                  <select class="custom-select" name="category">
                    <option value="Personal">Personal</option>
                    <option value="Work">Work</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
          <div class="col-4 text-right">
              <a href="javascript:void(0)" onclick="updateFunction(this)"><i class="fas fa-list"></i> Update</a> |
              <a href="javascript:void(0)" data-id="`+id+`" data-body="`+body+`"  data-category="`+category+`" onclick="cancelFunction(this)"><i class="fas fa-times"></i> abbrechen</a>
          </div>
          `;
          var masterDiv = $(th).parents('.checklist-item')
          $(th).parents('.checklist-item').html(content);
          $(masterDiv).find('select[name="category"]').val(category);
  }
  function updateFunction(th){
      $(th).parents('.checklist-item').find('form').submit();
  }
  function cancelFunction(th) {
    let body = $(th).data('body');
    let category = $(th).data('category');
    let id = $(th).data('id');
    let content= `
          <div class="col-8">
            <span>`+body+`</span> | 
            <span>`+category+`</span>
          </div>
          <div class="col-4 text-right">
              <a href="javascript:void(0)" data-id="`+id+`" data-body="`+body+`" data-category="`+category+`"  onclick="editFunction(this)"><i class="fas fa-pencil-alt"></i> bearbeiten</a> |
              <a href="javascript:void(0)" data-id="`+id+`" onclick="deleteFunction(this)"><i class="fas fa-trash"></i> löschen</a>
          </div>
          `;
          $(th).parents('.checklist-item').html(content);
  }
</script>
@endsection
