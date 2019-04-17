@extends('layouts.app')

@section('content')



    <div class="container" style="background-color: #fff; padding-top: 10px;">

        <div class="row">
            <div class="col-md-8 col-md-offset-8">
                <div class="panel-heading"><h2 class="angebot">Persönliches Angebot für
                        <br> {{ $kunden->vorname }} {{ $kunden->nachname }}</h2></div>
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
@foreach ($timeline as $timeline)


<div id="wrapper">

<div class="uper_box">
        <div class="container">
            <div class="box">
                <h2>{{$timeline->finanzierungsbedarf_phase_eins}}€</h2>
            </div>
            <div class="box">
                <div class="top">
                    <ul>
                        <li>{{$timeline->laufzeit_phase_eins}} Jahre</li>
                        <li>{{$timeline->jahreszins_phase_eins}}%</li>
                        <li>dann</li>
                        <li>{{$timeline->laufzeit_phase_zwei}} Jahre</li>
                        <li>{{$timeline->jahreszins_phase_zwei}}%</li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="bottom">
                    <ul>
                        <li>{{$timeline->rate_monatlich_phase_eins}}€</li>
                        <li>- ><br>Restschuld<br>{{$timeline->restschuld_phase_eins}}€</li>
                        <li class="add">{{$timeline->rate_monatlich_phase_zwei}}€</li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="box">
                <ul>
                    <li>30jahre</li>
                    <li>Restschuld<br>{{$timeline->restschuld_ende}}€</li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div></div>
<form method="post" action="{{ $timeline->id }}">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
         <button  i style="padding: 5px !important;" type="submit" class="btn btn-danger btn-sm"> Löschen</button></li>
       </form>


        <a href="{{ $kunden->id }}/edit"> <button  i style="padding: 5px !important;" type="submit" class="btn btn-danger btn-sm">Ändern</button></li></a>


@endforeach


                <hr>

                <br>
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
                <button class="btn btn-danger" style="color: #fff"><a style="color: #fff"
                                                                      href="{{asset('admin/generate_offer')}}{{ '/'.$kunden->id }}">Angebot
                        erstellen</a></button>

   <hr />
    <h5><b>Angebote </b></h5>


                <ul id="angebote">
                    @foreach($kunden['offer'] as $offer)
                        <li><i class="fa fa-file-pdf" style="font-size:25px;color:red; vertical-align: middle; padding-right: 5px;"></i>Auftragsnummer: <a href="{{asset('admin/download_pdf')}}{{ '/'.$offer->id }}" download="">{{$offer->id}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </div>
@endsection