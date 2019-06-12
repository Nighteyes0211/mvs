@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

@section('content')

<style type="text/css">
    #button_edit a {
        color: #fff !important;
    }

</style>


<div class="container" style="background-color: #fff; padding-top: 10px;">

    <div class="row">
        <div class="col-md-8 col-md-offset-8">
            <div class="panel-heading"><h2 class="angebot">Persönliches Angebot für
                <br> {{ $kunden->vorname }} {{ $kunden->nachname }}</h2>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <img style="width: 300px !important;"
            src="https://www.mkhyp.de/wp-content/uploads/2017/08/logo_positiv.svg">

        </div>
    </div>
    <hr/>


    <div class="row">
        <div class="col-md-12 col-md-offset-12">
            <h4>Übersicht</h4>
            <h5>Persönliche Daten</h5>
            {{ $kunden->vorname }}<br>
            {{ $kunden->nachname }}<br>
            {{ $kunden->strasse }}<br>
            {{ $kunden->plz }}
            {{ $kunden->wohnort }}<br>
            <h5><b>Finanzierungsbedarf</b></h5>
            <table style="width:100%">
                <tr>
                    <td>Kaufpreis des Objekts</td>
                    <td>{{ number_format(  $kunden->kaufpreis, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Umbau/Modernisierung</td>
                    <td>{{ number_format( $kunden->kostenumbau, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Notar/Gericht</td>
                    <td>{{ number_format( $kunden->kostennotar, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Grunderwerbssteuer</td>
                    <td>{{ number_format( $kunden->grunderwerbssteuer, 2, ',', '.') }}€</td>
                </tr>

                <tr>
                    <td>Maklerkosten</td>
                    <td>{{ number_format( $kunden->maklerkosten, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Gesamtkosten</td>
                    <td>{{ number_format( $kunden->gesamtkosten, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Eigenkapital</td>
                    <td>{{ number_format( $kunden->eigenkapital, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Finanzierungsbedarf</td>
                    <td>{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }}€</td>
                </tr>
            </table>
            <hr>
            <br>


        <div id="button_edit" style="position: fixed; right: 0px; margin-top: -270px; z-index: 111111; ">

<li class="nav-item"><a href="{{route('kunden.edit',$kunden->id)}}" class=" btn btn-mkhyp" style="border-radius: 0px;">Kunden bearbeiten</a></li>

</div>
            <h5><b>Tilgungsplan </b></h5>
            <div style="max-height: 300px; overflow-y: scroll">
                <table style="width:100%; max-height: 500px !important;">
                    <thead>
                        <tr>
                            <th>Rückzahlungsdatum</th>
                            <th>Zinsen</th>
                            <th>Tilgung</th>
                            <th>Darlehensrest</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repayments as $repayment)
                        <tr>
                            <td>{{$repayment->repayment_date}}</td>
                            <td>{{$repayment->zinsen}}</td>
                            <td>{{$repayment->tilgung}}</td>
                            <td>{{$repayment->darlehensrest}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <a  class="btn btn-danger" style="color: #fff" href="{{asset('admin/generate_offer')}}{{ '/'.$kunden->id }}"> Angebot erstellen </a>
            <hr/>

            @if(count($kunden->checklists)>0)
            <br>
            <h5><b>Checkliste </b></h5>
            <div style="max-height: 300px; overflow-y: scroll">
                <table style="width:100%; max-height: 500px !important;">
                    <thead>
                        <tr>
                            <th>S/L</th>
                            <th>List item</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($kunden->checklists as $checklist)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$checklist->body}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @if(count($kunden->ehepartnerChecklists)>0)
            <br>
            <h5><b>Checkliste (Ehepartner) </b></h5>
            <div style="max-height: 300px; overflow-y: scroll">
                <table style="width:100%; max-height: 500px !important;">
                    <thead>
                        <tr>
                            <th>S/L</th>
                            <th>List item</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($kunden->ehepartnerChecklists as $checklist)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$checklist->body}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <hr/>
            @endif

            <div class="row" style="max-height: 500px; overflow-y: scroll; overflow-x: hidden">
                <div class="col-12" style="margin: 20px 20px 40px 20px;">
                    <h5><b>Angebote </b></h5>
                    <ul style="width: 100%">
                        @foreach($kunden['offer'] as $offer)
                        <li style="padding: 10px; float: left"><i class="fa fa-file-pdf" style="font-size:25px;color:red; vertical-align: middle; padding-right: 5px;"></i>Auftragsnummer: <a href="{{asset('admin/download_pdf')}}{{ '/'.$offer->id }}" download="">{{$offer->id}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
