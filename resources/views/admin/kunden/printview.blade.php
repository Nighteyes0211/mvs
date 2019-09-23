<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MKHYP') }}</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="/css/foundation.css" media="all" />
    <link rel="stylesheet" href="/css/new.css" media="all" /> -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat');
        * {
            /* font-family: 'Montserrat', sans-serif !important; */
            font-family: 'Roboto', sans-serif;
            /*font-family: 'Open Sans', sans-serif; */
        }
        hr {
            color: #28367b;
            max-width: 350px;
            margin: 10px auto;
        }
        #app{
            background-color: rgba(255,255,255,0.6);
            background-blend-mode: lighten;
            background: url("img/watermark.png") no-repeat right top;
        }
        body{
            margin-top:50px;
            margin-bottom:50px;
        }
        .page_title{
            position: absolute;
            top: -90px;
            left: 0;
        }

        #header { position: fixed; left: 0px; top: -40px; right: 0px; text-align: center; }
        #footer { position: fixed; left: 0px; bottom: 0px; right: 0px; height: 50px; background-color: lightblue; }

        /* .uper_box {
            top:50px;
        } */

        .page_title{
            position: absolute;
            /*position: absolute;
            top: -90px;
            left: 0;
            left: 0;*/
        }
        .labels-line{
            background-color: #e7be86;
            border-color: #e7be86;
            outline-color: #e7be86;
        }

    </style>
</head>
<body>






</span>

    <p style="text-align: center;position:relative;height:780px:width:100%;background:white;">
    <div style="background-color: white; z-index: 2;width: 400px; height: 100px;position:absolute;right:-80px;top:-80px;" ></div>
    <img src="img/bg-newscreen.jpg" style="position:absolute;top: -60px;margin:0 auto;width:94%;" >
    <div style="z-index: 2;width: 260px;position:absolute;left:55px;top:200px;font-size:14px;" >
    <i>Finanzierungskonzept für</i><br/>
    <span>{{ $kunden->vorname }} {{ $kunden->nachname }}</span>
    <hr class="labels-line"/>
    <i>Ihr Berater</i><br/>
    <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
    <hr class="labels-line"/>
    <i>Angebotsdatum</i><br/>
    <span>{{ date('d.m.Y', strtotime($angebotedate->angebotdate)) }}</span>
    <hr class="labels-line"/>
    </div> </p>
    <br/>
    <br/>

    {{--<p class="page_title" style="color: #28377B; font-size: 23px; margin-top: 20px;">Persönliches Angebot für<br>{{ $kunden->vorname }} {{ $kunden->nachname }}</p>--}}
    <div id="header" style="margin-top: 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width: 60%;"></td>
                <td><img width="200px" style="padding-left: 100px; padding-top:20px;" src="img/logo.png"></td>
            </tr>
        </table>
    </div>

    {{-- <div id="footer">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 33%; text-align: left;">Markus Kintzelmann e. Kfm.
    Obere Färberstraße 17a
    D-41334 Nettetal-Lobberich

    02153.95 81 34
    02153.95 81 35</td>
                <td style="width: 33%; text-align: left;">Column2</td>
                <td style="width: 33%; text-align: left;">Column3</td>
            <tr>
        </table>
    </div> --}}

    <div id="app">


        <div class="container" style="padding-top: 10px; ">
            <!-- header -->
            <div style="box-shadow: 0 2px 5px rgba(0,0,0,.2);"></div>
   <!-- <span class="page_title" style="color: #28377B; font-size: 23px; margin-top: 20px;">Persönliches Angebot für<br>{{ $kunden->vorname }} {{ $kunden->nachname }}</span> -->
            <!-- personal info
            <h3 style="color:#c8c0b3; font-size: 1.2em; margin-top: 20px"><span style="background-color: #28367b; color: #fff; padding: 10px; float: left;">Ihr Finanzierungsberater</span></h3> -->

            <div style="text-align: left; margin: 10px 0;width: 100%; line-height: 1 !important; clear: both">
                <!-- <h3 style="color: #c8c0b3;  "><span style="background-color: #28367b ; padding: 10px 20px 10px 20px;">Ihre Daten&nbsp;<span></h3> -->
                <table style="width: 100%; font-size: 12px;">
                    <tr>
                        <td style="font-size:10px;" width="75%">mkhyp Baufinanzierung - Obere Färberstraße. 17 A - 41334 Nettetal-Lobberich</td>
                        <td><b>Ihr Ansprechpartner</b></td>
                    </tr>
                    <tr>
                        <td>Anrede</td>
                        <td>Markus Kintzelmann e. Kfm.n</td>
                    </tr>
                    <tr>
                        <td>{{ $kunden->vorname }} {{ $kunden->nachname }}</td>
                        <td>Obere Färberstraße 17a</td>
                    </tr>
                    <tr>
                        <td>{{ $kunden->strasse }}</td>
                        <td>Tel.: 02153/958134</td>
                    </tr>
                    <tr>
                        <td>{{ $kunden->plz }} {{ $kunden->wohnort }}</td>
                        <td>Fax: 02153/958135</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><b>Unsere Anschrift</b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>mkhyp Baufinanzierung</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Obere Färberstraße 17 A</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>41334 Nettetal-Lobberich</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Angebot ID: {{ $angebote->id }}</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Datum: {{ date('d.m.Y', strtotime($angebotedate->angebotdate)) }}</td>
                    </tr>

                </table>
            </div>
            <!-- /personal info -->



            <!--  <h3 style="color:#c8c0b3; font-size: 1.1em; margin-top: 20px"><span style="background-color: #fff ; color: #28367b; padding: 0px;">Ihre Finanzierungsanfrage</span></h3> -->
<p>Sehr geehrter Kunde,<br>
den nachfolgenden Finanzierungsvorschlag habe ich für Sie zusammengestellt. Schauen Sie sich die Unterlagen bitte in Ruhe an.</p>
<p>Die Immobilienfinanzierung soll passend auf Ihre Wünsche zugeschnitten sein. Daher begleite ich Sie, bis die Finanzierung auf Ihre Bedürfnisse abgestimmt ist. Wenn Sie sich für eine Finanzierung entschieden haben, leite ich alles Weitere für Sie in die Wege . </p>



            <!-- personal info -->
            <h3 style="color:#c8c0b3; font-size: 1.1em; margin-top: 20px"><span style="background-color: #fff ; color: #28367b; padding: 0px; float: left;">Ihre Daten</span></h3>

            <div style="text-align: left; margin: 10px 0; width: 100%; line-height: 1 !important; clear: both">
                <table style="width: 100%; font-size: 12px;">
                    <tr>
                        <td style="text-align: left;">Vorname </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->vorname }}</td>
                        <td style="text-align: left; padding-left: 2%;">E-mail </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->mail }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Nachname </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->nachname }}</td>
                        <td style="text-align: left;padding-left: 2%;">Telefon </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->telefon }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Strasse </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->strasse }}</td>
                        <td style="text-align: left;padding-left: 2%;">PLZ </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->plz }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Geburtsdatum </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->geburtsdatum }}</td>
                    </tr>
                </table>
            </div>
            <!-- /personal info -->
            <h3 style="color:#28367b; font-size: 1.2em; margin-top: 20px; float: left; width: 100%;">Ihr Finanzierungsbedarf</h3>
            <table style="width:100%;border: 2px solid #a2a5aa;border-collapse: collapse; font-size: 12px; clear: both;">
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Kaufpreis des Objekts</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format ($kunden->kaufpreis, 2, ',', '.')  }}&euro;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Umbau/Modernisierung</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format ($kunden->kostenumbau, 2, ',', '.')  }}&euro;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Notar/Gericht</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format ($kunden->kostennotar, 2, ',', '.')  }}&euro;</td>
                </tr>

                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Grunderwerbssteuer</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format ($kunden->grunderwerbssteuer, 2, ',', '.')  }}&euro;</td>
                </tr>

                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Maklerkosten</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format ($kunden->maklerkosten, 2, ',', '.')  }}&euro;</td>
                </tr>
                <tr style="background: #a2a5aa;font-weight: bold;">
                    <td style="padding: 4px;">Gesamtkosten</td>
                    <td style="text-align: right;padding: 4px;">{{ number_format ($kunden->gesamtkosten, 2, ',', '.') }}&euro;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Eigenkapital</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format($kunden->eigenkapital, 2, ',', '.') }}</td>
                </tr>
                <tr style="background: #a2a5aa;font-weight: bold;">
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Finanzierungsbedarf</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format($kunden->finanzierungsbedarf, 2, ',', '.') }}</td>
                </tr>
            </table>
        <div>
            <h3 style="color:#28367b; font-size: 1,2em; margin-top: 20px">Ihre Finanzierungsbausteine</h3>
            <table style="width:100%; max-height: 500px !important; border-collapse: collapse; font-size: 12px;">
                <thead>
                <tr style="background: #a2a5aa;font-weight: bold;">
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach( $Calculations as $calculation )
                        <tr><td><div><b>{{ 'Finance Module# ' . $i }}</b></div><span style="float:left; width: 200px">Kreditsumme</span><span style="text-align: right">{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Zinsbindung</span><span style="text-align: right">{{$calculation->loan_period}} </span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Auszahlungstermin</span><span style="text-align: right">{{ $calculation->payment_month }} / {{ $calculation->payment_year}}</span></td></tr>
                        <!-- <tr><td><span style="float:left; width: 200px">Land Registry Costs</span><span style="text-align: right">{{ $calculation->registery_fees }} &euro;</span></td></tr> -->
                        <!-- <tr><td><span style="float:left; width: 200px">Discount (percent)</span><span style="text-align: right">{{$calculation->payment_discount}} &#37;</span></td></tr> -->
                        <tr><td><span style="float:left; width: 200px">Auszahlungsbetrag</span><span style="text-align: right">{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Sollzinssatz</span><span style="text-align: right">{{ $calculation->borrowing_rate }} &#37;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Tilgungssatz (Prozent)</span><span style="text-align: right">{{$calculation->repayment_date_inp}} &#37;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Monatliche Rate</span><span style="text-align: right">{{ $calculation->montly_deposit_val }} &euro;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Jährliche Sondertilgung</span><span style="text-align: right">{{$calculation->annual_unsheduled_month}} / {{ $calculation->annual_unsheduled_year }}</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">to</span><span style="text-align: right">{{ $calculation->annual_to_month }}/ {{ $calculation->annual_to_year }}</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Einmalige Sondertilgung</span><span style="text-align: right">{{ $calculation->onetime_unsheduled_month }} / {{ $calculation->onetime_unsheduled_year}}</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Restschuld</span><span style="text-align: right">{{ $calculation->outstanding_balance }} &euro;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Effektivzins (Prozent)</span><span style="text-align: right">{{ $calculation->effective_interest }} &#37;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Anschlusskredit</span><span style="text-align: right">{{ $calculation->connection_credit }}</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Neuer Sollzinssatz (Prozent)</span><span style="text-align: right">{{ $calculation->new_borrowing_rate }} &#37;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Neuer Tilgungssatz (Proz.)</span><span style="text-align: right">{{ $calculation->new_repayment_rate_inp }} &#37;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Neue Rate (Euro)</span><span style="text-align: right">{{ $calculation->new_rate_inp }} &euro;</span></td></tr>
                        <tr><td><span style="float:left; width: 200px">Gesamtlaufzeit (Jahre/Monate)</span><span style="text-align: right">{{ $calculation->total_maturity }} J / M</span></td></tr>
                         @if ( $calculation->timeline != null )
                            <tr>
                                <td>
                                    <div class="uper_box">
                                        <div class="container">
                                            <table style="width: 100%; font-size: 18px; margin-top: 30px;" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:10px">{{ $calculation->timeline->finanzierungsbedarf_phase_eins }}&euro;</td>
                                                    <td style="border-left: 4px solid #f1ac38; border-right: 4px solid #f1ac38;">
                                                        <table style="width: 100%; border-spacing: 0">
                                                            <tr style="border: 1px solid #f1ac38; height: 50px; width: 100%;">
                                                                <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                    <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->timeline->laufzeit_phase_eins }} Jahre</p>
                                                                </td>
                                                                <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 13%;">
                                                                    <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->timeline->jahreszins_phase_eins }}%</p>
                                                                </td>
                                                                <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                    <p style="margin-top:0;margin-bottom:20px;font-size:10px">dann</p>
                                                                </td>
                                                                {{-- <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 0%;">
                                                                    <p style="margin-top:0;margin-bottom:10px;font-size:10px"></p>
                                                                </td> --}}
                                                                <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                    <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->timeline->laufzeit_phase_zwei }} Jahre</p>
                                                                </td>
                                                                <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 12%;">
                                                                    <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->timeline->jahreszins_phase_zwei }}%</p>
                                                                </td>
                                                            </tr>
                                                            <tr style="border: 4px solid #f1ac38; width: 100%; height: 70px;">
                                                                <td style="text-align: center;width: 33.334%;font-size:10px" colspan="2">{{ $calculation->timeline->rate_monatlich_phase_eins }}&euro;</td>
                                                                <td width="33%" align="center" style="position: relative;">
                                                                    <div style="height:26px;padding-top: 10px;font-size:10px"> -> <br>Restschuld <br>{{ $calculation->timeline->restschuld_phase_eins }}&euro;</div>
                                                                    <span style="display: inline-block; width: 5px; height: 27px; border-right:4px solid #f1ac38; position: absolute;  z-index:99;top: -18px;left: 47%;"></span>
                                                                </td>
                                                                <td style="text-align: center; width: 33.334%;font-size:10px">{{ $calculation->timeline->rate_monatlich_phase_zwei }}&euro;</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td style="text-align: center;font-size:10px">30 jahre</td>
                                                    <td style="text-align: center;"><span style="text-align: center; padding:5px; display: block; border: 4px solid #f1ac38;font-size:10px">Restschuld <br>{{ $calculation->timeline->restschuld_ende }}&euro;</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <br><br>
                                </td>
                            </tr>
                        @else
                            <tr><td><strong></strong></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                        @endif -->
                         @if ( $calculation->customerTimeline != null )
                            <tr>
                                <td>
                                    <div class="uper_box">
                                        <div class="container">
                                            <table style="width: 100%; font-size: 18px; margin-top: 30px;" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-size:10px; text-align: right; padding: 0 50px; ">{{ $calculation->customerTimeline->darlehen }}&euro;</td>
                                                    <td style="border-left: 4px solid #f1ac38; border-right: 4px solid #f1ac38;">
                                                        <table style="width: 100%; border-spacing: 0">
                                                            <tr style="border: 1px solid #f1ac38; height: 50px; width: 100%;">
                                                                <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                    <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->customerTimeline->laufzeit }} Jahre</p>
                                                                </td>
                                                                <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 13%;">
                                                                    <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->customerTimeline->zinsstaz }}%</p>
                                                                </td>
                                                                <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                    <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->customerTimeline->tilgung }} Jahre</p>
                                                                </td>
                                                            </tr>
                                                            <tr style="border: 4px solid #f1ac38; width: 100%; height: 70px;">
                                                                <td style="text-align: center;width: 33.334%;font-size:10px" colspan="3">{{ $calculation->customerTimeline->rate_monatl }}&euro;</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td style="text-align: center;font-size:10px; width: 50px;"> </td>
                                                    <td style="text-align: center;"><span style="text-align: center; padding:5px; display: block; border: 4px solid #f1ac38;font-size:10px">Restschuld <br>{{ $calculation->customerTimeline->restschuld }}&euro;</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <br><br>
                                </td>
                            </tr>
                        @else
                            <tr><td><strong></strong></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                        @endif -->
                        @php($i++)
                    @endforeach
                </tbody>
            </table>
<br><br><br>

        <div>
            <h3 id="tilgungsplan" style="color:#28367b; font-size: 1.2em; margin-top: 50px">Tilgungsplan</h3>
            <table style="width:100%; max-height: 500px !important;border-collapse: collapse; font-size: 12px;">
                <thead>
                <tr style="background: #a2a5aa;font-weight: bold;">
                    <th style="padding: 5px 0;">Rückzahlungsdatum</th>
                    <th>Zinsen</th>
                    <th>Rate</th>
                    <th>Sonder-tilgung</th>
                    <th>Tilgung</th>
                    <th>Darlehensrest</th>
                </tr>
                </thead>
                <tbody>
                    @php($payments = [])
                    @foreach($repayments as $repayment)

                    <tr style="text-align: left;">
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$repayment->repayment_date}}</td>
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$repayment->rate}}</td>
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$repayment->sonder_tilgung}}</td>
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$repayment->zinsen}}</td>
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$repayment->tilgung}}</td>
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$repayment->darlehensrest}}</td>
                    </tr>
                    {{--@endif--}}
                    @endforeach
 {{--                   @foreach($payments as $key=>$value)
                    @if($key > date('Y'))
                    <tr style="text-align: left;">
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$key}}</td>
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$payments[$key]['zinsen']}} </td>
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$payments[$key]['tilgung']}} </td>
                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{$payments[$key]['darlehensrest']}}</td>
                    </tr>
                    @endif
                    @endforeach--}}
                </tbody>
            </table>
            <br>
        </div>
        @if(count($kunden->checklists)>0)
        <div>
            <h3 id="" style="color:#28367b; font-size: 1,2em; margin-top: 50px">Folgende Unterlagen werden benötigt</h3>

                    @php($i=1)
                    <ul>
                    @foreach($kunden->checklists as $checklist)
                    <li>
                        <!-- {{$i++}} -->
                        {{$checklist->body}}
                    </li>
                    @endforeach
        </div>
        @endif
        @if(count($kunden->ehepartnerChecklists)>0)
        <div>
            <h3 id="" style="color:#28367b; font-size: 1,2em;">Checkliste (Ehepartner)</h3>
                <ul>
                    @php($i=1)
                    @foreach($kunden->ehepartnerChecklists as $checklist)
                    <li>
                        <!-- {{$i++}} -->
                        {{$checklist->body}}
                    </li>
                    @endforeach
                </ul>
            <br>
        </div>
        @endif
        </div>
    </div>
</body>
</html>
