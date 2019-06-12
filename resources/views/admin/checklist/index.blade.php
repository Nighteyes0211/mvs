
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
                      <div class="col-6" style="margin: auto">
                          <h3>Unterlagen</h3>
                          <form class="" action="{{route('checklist')}}" method="post">
                            @csrf
                            <input type="text" name="body" value="{{old('body')}}" class="form-control" style="margin-bottom: 15px" placeholder="">
                            @if ($errors->has('body'))
                                <span class="alert">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                            <p class="text-right p-10"><button class="btn btn-primary">Neuen Punkt hinzufügen</button></p>
                          </form>
                          <ul>
                            @foreach($checklists as $checklist)
                            <li class="form-control mb-2">
                                <div class="row checklist-item">
                                  <div class="col-8">
                                    <span>{{$checklist->body}}</span>
                                  </div>
                                  <div class="col-4 text-right">
                                      <a href="javascript:void(0)" data-id="{{$checklist->id}}" data-body="{{$checklist->body}}" onclick="editFunction(this)"><i class="fas fa-pencil-alt"></i> bearbeiten</a> |
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
    let id = $(th).data('id');
    let content= `
          <div class="col-8">
            <form class="updateForm" style="margin: 0;" action="{{route('checklistUpdate')}}" method="post">
              @csrf
              <input type="hidden" name="data_id" value="`+id+`">
              <input type="text" name="body" value="`+body+`" class="w-100" placeholder="body text">
            </form>
          </div>
          <div class="col-4 text-right">
              <a href="javascript:void(0)" onclick="updateFunction(this)"><i class="fas fa-list"></i> Update</a> |
              <a href="javascript:void(0)" data-id="`+id+`" data-body="`+body+`" onclick="cancelFunction(this)"><i class="fas fa-times"></i> abbrechen</a>
          </div>
          `;
          $(th).parents('.checklist-item').html(content);
  }
  function updateFunction(th){
      $(th).parents('.checklist-item').find('form').submit();
  }
  function cancelFunction(th) {
    let body = $(th).data('body');
    let id = $(th).data('id');
    let content= `
          <div class="col-9">
            <span>`+body+`</span>
          </div>
          <div class="col-3 text-right">
              <a href="javascript:void(0)" data-id="`+id+`" data-body="`+body+`" onclick="editFunction(this)"><i class="fas fa-pencil-alt"></i> bearbeiten</a> |
              <a href="javascript:void(0)" data-id="`+id+`" onclick="deleteFunction(this)"><i class="fas fa-trash"></i> löschen</a>
          </div>
          `;
          $(th).parents('.checklist-item').html(content);
  }
</script>
@endsection
