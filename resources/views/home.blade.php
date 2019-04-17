@extends('layouts.app')

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

                 <div class="container">
                    <div class="row text-center">
                        <div class="col-md-3 col-md-offset-2 buttons">
                        <a href="admin/kunden"><i class="fas fa-user-friends fa-4x icon"></i><br>
                        <p>Kunden anzeigen</p></a>
                        </div>
                        <div class="col-md-3 col-md-offset-2 buttons">
                        <a href="admin/kunden/create"><i class="fas fa-plus-circle fa-4x icon"></i><br>
                        <p>Kunden anlegen</p></a>
                        </div>
                        <div class="col-md-3 col-md-offset-2 buttons">
                        <a href="admin/baufi"><i class="fas fa-calculator fa-4x icon"></i><br>
                        <p>Baufi-Rechner</p></a>
                        </div>
                        <div class="col-md-3 col-md-offset-2 buttons">
                        <a href=""><i class="fas fa-sliders-h fa-4x icon"></i><br>
                        <p>Einstellungen</p>
                        </div>
                    </div>


                </div>
            </div>

            <hr />


           <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-2">
                            <h4>Vertriebsunterstützende Materialien</h4>
                            <ul>
                                <li><a href="Logo">Logo</a></li>
                                <li><a href="">Briefbogen Word</a></li>

                            </ul>

                        </div>
                    </div>


                </div>



        </div>
    </div>
</div>
@endsection
