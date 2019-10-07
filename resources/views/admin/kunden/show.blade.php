@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

@endsection


<style type="text/css">

#button_edit a {
    color: #fff !important;
}


.check {
  cursor: pointer;
  position: relative;
  margin: auto;
  width: 18px;
  height: 18px;
  -webkit-tap-highlight-color: transparent;
  transform: translate3d(0, 0, 0);
}
.check:before {
  content: "";
  position: absolute;
  top: -15px;
  left: -15px;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: rgba(34,50,84,0.03);
  opacity: 0;
  transition: opacity 0.2s ease;
}
.check svg {
  position: relative;
  z-index: 1;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke: #c8ccd4;
  stroke-width: 1.5;
  transform: translate3d(0, 0, 0);
  transition: all 0.2s ease;
}
.check svg path {
  stroke-dasharray: 60;
  stroke-dashoffset: 0;
}
.check svg polyline {
  stroke-dasharray: 22;
  stroke-dashoffset: 66;
}
.check:hover:before {
  opacity: 1;
}
.check:hover svg {
  stroke: #4285f4;
}
.cbx:checked + .check svg {
  stroke: #4285f4;
}
.cbx:checked + .check svg path {
  stroke-dashoffset: 60;
  transition: all 0.3s linear;
}
.cbx:checked + .check svg polyline {
  stroke-dashoffset: 42;
  transition: all 0.2s linear;
  transition-delay: 0.15s;
}
</style>

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection



@section('content')

<?php
    function stringReplace($string, $from = '.', $to=',')
    {
        for ($i=0; $i < strlen($string); $i++) {
            if($string[$i] == $from) $string[$i] = $to;
        }
        return $string;
    }
?>

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
@foreach ($CalData as $key=> $cal)
<h3 class="mt-15">Finance Module# {{ $key+1 }}</h3>
<h5><b>Calculation </b></h5>
<div style="max-height: 300px; overflow-y: scroll">
        <table style="width:100%; max-height: 500px !important;">
            <thead>
                <tr>
                    <th scope="col">Kreditsumme </th>
                    <th scope="col">Zinsbindung</th>
                    <th scope="col">Auszahlungstermin</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</td>
                    <td>{{ $cal->loan_period }}</td>
                    <td>{{ $cal->payment_month }} / {{ $cal->payment_year}}</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <th scope="col">Auszahlungsbetrag</th>
                    <th scope="col">Sollzinssatz (Prozent)</th>
                    <th scope="col">Tilgungssatz (Prozent)</th>
                    <th scope="col">Monatsrate</th>
                    <th scope="col">Restschuld</th>
                </tr>
                <tr>
                    <td>{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</td>
                    <td>{{ $cal->borrowing_rate }} &#37;</td>
                    <td>{{ $cal->repayment_date_inp}} &#37;</td>
                    <td>{{ $cal->montly_deposit_val }} &euro;</td>
                    <td>{{ $cal->outstanding_balance }} &euro;</td>
                </tr>
                <tr>
                    <th scope="col">Neuer Sollzinssatz (Prozent)</th>
                    <th scope="col">Neuer Tilgungssatz (Proz.)</th>
                    <th scope="col">Neue Rate (Euro)</th>
                    <th scope="col">Gesamtlaufzeit (Jahre/Monate)</th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <td>{{ $cal->new_borrowing_rate }} &#37;</td>
                    <td>{{ $cal->new_repayment_rate_inp }} &#37;</td>
                    <td>{{ $cal->new_rate_inp }} &euro;</td>
                    <td>{{ $cal->total_maturity }} J / M</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="col">Effektivzins (Prozent)  </th>
                    <th scope="col">Anschlusskredit</th>
                    @if ( $cal->annual_unsheduled_val != 0 || $cal->onetime_unsheduled_val != 0 )
                        <th scope="col">Jährliche Sondertilgungen ab</th>
                        <th scope="col">bis</th>
                        <th scope="col">Einmalige Sondertilgung </th>
                    @else
                        <th scope="col" colspan="3"></th>
                    @endif -->
                </tr>
                <tr>
                    <td>{{ $cal->effective_interest }} &#37;</td>
                    <td>{{ $cal->connection_credit }}</td>
                    @if ( $cal->annual_unsheduled_val != 0 || $cal->onetime_unsheduled_val != 0 )
                        <td>{{ $cal->annual_unsheduled_val }} / {{ $cal->annual_unsheduled_month }} / {{ $cal->annual_unsheduled_year }}</td>
                        <td>{{ $cal->annual_to_month }}/ {{ $cal->annual_to_year }}</td>
                        <td>{{ $cal->onetime_unsheduled_val }} / {{ $cal->onetime_unsheduled_month }} / {{ $cal->onetime_unsheduled_year}}</td>
                    @else
                        <td colspan="3"></td>
                    @endif -->
                </tr>
            </tbody>
        </table>
    </div>
<h5><b>Tilgungsplan </b></h5>
<div style="max-height: 300px; overflow-y: scroll">
    <table style="width:100%; max-height: 500px !important;">
        <thead>
            <tr>
                <th>Rückzahlungsdatum</th>
                <th>Rate</th>
                <th>Sondertilgung</th>
                <th>Zinsen</th>
                <th>Tilgung</th>
                <th>Darlehensrest</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repayments as $repayment)
            <tr>
                <td>{{ stringReplace(number_format((float)$repayment->repayment_date, 2, ',', '.'), '.', ',') }}</td>
                <td>{{ stringReplace(number_format((float)$repayment->rate, 2, ',', '.'), '.', ',') }}</td>
                <td>{{ stringReplace(number_format((float)$repayment->sonder_tilgung, 2, ',', '.'), '.', ',')}}</td>
                <td>{{ stringReplace(number_format((float)$repayment->zinsen, 2, ',', '.'), '.', ',') }}</td>
                <td>{{ stringReplace(number_format((float)$repayment->tilgung, 2, ',', '.'), '.', ',') }}</td>
                <td>{{ stringReplace(number_format((float)$repayment->darlehensrest, 2, ',', '.'), '.', ',') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endforeach
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
