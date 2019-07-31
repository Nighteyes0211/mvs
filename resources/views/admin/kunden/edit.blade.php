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

    <script>

        $(document).ready(function(){
            $('.new_form').hide();
            $('.ten_fields').hide();
            $('.ct_fields').hide();

            $('#add_calcualtion_form').click(function(){
                $('.new_form').show();
            });

            $('#ten_field_controller').click(function(){
                $('.ten_fields').show();
                $('#new_form_controller').val(1);
            });

            $('#angebotdate').change(function(){
                $('.angebotdate').val($(this).val());
            });

            $('#finanzierungsbedarf input').on('keypress change', function(e){
                let _this = this;
                setTimeout(function(){
                    $(_this).val(formatNumbers(onlyNumbers($(_this).val())));
                    recalculate();
                }, 200);
            });

            $('input[name="kostennotar"], input[name="grunderwerbssteuer"], input[name="maklerkosten"]').change(function(){
                let _this = this;
                setTimeout(function(){
                    let val = $(_this).val();
                    val = val.split('.').join('');
                    val = val.split(',').join('.');
                    val = parseFloat(val);
                    if(val<0.01) val = '0,01';
                    else if(val>30) val = '30';
                    else val = val.toString();
                    $(_this).val(formatNumbers(onlyNumbers(val)));
                    recalculate();
                }, 200);
            });

            // Set angebotdate in edit more
            var angebotdate = $('.angebotdate').val();
            $('#angebotdate').val(angebotdate);
        });

        function onlyNumbers(string) {
            let number = '';
            for(let i = 0; i<string.length; i++) {
                if((string[i] >='0' && string[i] <= '9') || string[i] == '.' || string[i] == ',') {
                    number+=string[i];
                }
            }
            return number;
        }

        function formatNumbers(string) {
            let number = '';
            let firstComma = false;
            let count = 0;
            for(let i = string.length-1; i>=0; i--) {
                if(string[i] == ',' && !firstComma) {
                    firstComma = true;
                    let temp = '';
                    for(let j = 0; j <= number.length ; j++) {
                        if (number[j] >='0' && number[j] <= '9') {
                            temp += number[j];
                        }
                    }
                    number = temp;
                    number+=string[i];
                    count = 0;
                } else if (string[i] >='0' && string[i] <= '9') {
                    number+=string[i];
                    count++;
                }
                if(count == 3 && i!=0) {
                    count = 0;
                    number+='.';
                }
            }
            return number.split('').reverse().join('');
        }

        function recalculate() {
            let kaufpreis = parseFloat($('input[name=kaufpreis]').val().replace(".", "").replace(",", "."));
            if(isNaN(kaufpreis)) kaufpreis=0;

            let kostenumbau = parseFloat($('input[name=kostenumbau]').val().replace(".", "").replace(",", "."));
            if(isNaN(kostenumbau)) kostenumbau=0;

            let kostennotar = parseFloat($('input[name=kostennotar]').val().replace(".", "").replace(",", "."));
            if(isNaN(kostennotar)) kostennotar=0;

            let grunderwerbssteuer = parseFloat($('input[name=grunderwerbssteuer]').val().replace(".", "").replace(",", "."));
            if(isNaN(grunderwerbssteuer)) grunderwerbssteuer=0;

            let maklerkosten = parseFloat($('input[name=maklerkosten]').val().replace(".", "").replace(",", "."));
            if(isNaN(maklerkosten)) maklerkosten=0;

            let eigenkapital = parseFloat($('input[name=eigenkapital]').val().replace(".", "").replace(",", "."));
            if(isNaN(eigenkapital)) eigenkapital=0;

            let calculatedGesamtkosten = kaufpreis + kostenumbau + kaufpreis*kostennotar/100.0 + kaufpreis*grunderwerbssteuer/100.0  + kaufpreis*maklerkosten/100.0;

            if(calculatedGesamtkosten < eigenkapital) {
                eigenkapital = calculatedGesamtkosten;
                $('input[name=eigenkapital]').val(formatNumbers(eigenkapital.toString().replace(".", ",")));
            }

            let calculatedFinanzierungsbedarf = calculatedGesamtkosten - eigenkapital;
            let plusMinus = calculatedFinanzierungsbedarf<0? '-':'';


            kostennotar = (kaufpreis*kostennotar/100.0).toFixed(2).toString().replace(".", ",");
            grunderwerbssteuer = (kaufpreis*grunderwerbssteuer/100.0).toFixed(2).toString().replace(".", ",");
            maklerkosten = (kaufpreis*maklerkosten/100.0).toFixed(2).toString().replace(".", ",");


            calculatedGesamtkosten = calculatedGesamtkosten.toFixed(2).toString().replace(".", ",");
            calculatedFinanzierungsbedarf = calculatedFinanzierungsbedarf.toFixed(2).toString().replace(".", ",");


            $('span[name=kostennotar]').html(formatNumbers(kostennotar));
            $('span[name=grunderwerbssteuer]').html(formatNumbers(grunderwerbssteuer));
            $('span[name=maklerkosten]').html(formatNumbers(maklerkosten));

            $('input[name=gesamtkosten]').val(formatNumbers(calculatedGesamtkosten));
            $('input[name=finanzierungsbedarf]').val(plusMinus+formatNumbers(calculatedFinanzierungsbedarf));
        }

        function openTimeLine(cardNo){
            $('.ten_fields-'+cardNo).show();
            $('.isTM-'+cardNo).val(1);

            var timeLinerBtnText = $('.addTimeLiner-'+cardNo).text();
            if ( timeLinerBtnText == "Baufi Zeitstrahl hinzufügen" ) {
                $('.addTimeLiner-'+cardNo).text('Baufi Zeitstrahl entfernen');
                $('.addTimeLiner-'+cardNo).removeClass('btn-primary');
                $('.addTimeLiner-'+cardNo).addClass('btn-danger');

                var timeLiner = `<div class="row ten_fields-`+cardNo+` mt-35">
                                        <div class="col-sm-12">
                                            <h5>Zeitstrahl Phase 1</h5>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Finanzierungsbedarf</label>
                                            <input type="text" id="finanzierungsbedarf_phase_eins" name="Cal[`+cardNo+`][timeline][finanzierungsbedarf_phase_eins]" class="form-control" placeholder="0€" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Zins p.a.</label>
                                            <input type="text" id="jahreszins_phase_eins" name="Cal[`+cardNo+`][timeline][jahreszins_phase_eins]" class="form-control" placeholder="%" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Laufzeit</label>
                                            <input type="text" id="laufzeit_phase_eins" name="Cal[`+cardNo+`][timeline][laufzeit_phase_eins]" class="form-control" placeholder="Jahre" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">monatliche Rate</label>
                                            <input type="text" id="rate_monatlich_phase_eins" name="Cal[`+cardNo+`][timeline][rate_monatlich_phase_eins]" class="form-control" placeholder="0€" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Restschuld Phase 1</label>
                                            <input type="text" id="restschuld_phase_eins" name="Cal[`+cardNo+`][timeline][restschuld_phase_eins]" class="form-control" placeholder="" value="" required>
                                        </div>
                                    </div>
                                    <div class="row ten_fields-`+cardNo+`">
                                        <div class="col-sm-12">
                                            <h5>Zeitstrahl Phase 2</h5>
                                        </div>

                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Finanzierungsbedarf</label>
                                            <input type="text" id="finanzierungsbedarf_phase_zwei" name="Cal[`+cardNo+`][timeline][finanzierungsbedarf_phase_zwei]" class="form-control" placeholder="0€" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Zins p.a.</label>
                                            <input type="text" id="jahreszins_phase_zwei" name="Cal[`+cardNo+`][timeline][jahreszins_phase_zwei]" class="form-control" placeholder="%" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Laufzeit</label>
                                            <input type="text" id="laufzeit_phase_zwei" name="Cal[`+cardNo+`][timeline][laufzeit_phase_zwei]" class="form-control" placeholder="Jahre" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">monatliche Rate</label>
                                            <input type="text" id="rate_monatlich_phase_zwei" name="Cal[`+cardNo+`][timeline][rate_monatlich_phase_zwei]" class="form-control" placeholder="0€" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Restschuld</label>
                                            <input type="text" id="restschuld_ende" name="Cal[`+cardNo+`][timeline][restschuld_ende]" class="form-control" placeholder="Jahre" value="" required>
                                        </div>
                                    </div>`;
                                    $('.thisTimeline-'+cardNo).html(timeLiner);
            }

            else if ( timeLinerBtnText == "Baufi Zeitstrahl entfernen" ) {
                $('.addTimeLiner-'+cardNo).text('Baufi Zeitstrahl hinzufügen');
                $('.addTimeLiner-'+cardNo).removeClass('btn-danger');
                $('.addTimeLiner-'+cardNo).addClass('btn-primary');
                $('.thisTimeline-'+cardNo).html('');
            }
        }

        function openCtTimeLine(cardNo){
            $('.ct_fields-'+cardNo).show();
            $('.isTM-'+cardNo).val(1);

            var ctTimeLinerBtnText = $('.addCtTimeLiner-'+cardNo).text();
            if ( ctTimeLinerBtnText == "Angepasster Zeitstrahl hinzufügen" ) {
                $('.addCtTimeLiner-'+cardNo).text('Angepasster Zeitstrahl entfernen');
                $('.addCtTimeLiner-'+cardNo).removeClass('btn-primary');
                $('.addCtTimeLiner-'+cardNo).addClass('btn-danger');

                var ctTimeLiner = `<div class="row ct_fields-`+cardNo+` mt-35">
                                        <div class="col-sm-12">
                                            <h5>Zeitstrahl Phase 1 (Angepasster)</h5>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Darlehen</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][darlehen]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Zinsstaz</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][zinsstaz]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Tilgung</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][tilgung]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Laufzeit</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][laufzeit]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Rate monatl</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][rate_monatl]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Restschuld</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][restschuld]" class="form-control" placeholder="" value="" required>
                                        </div>
                                    </div>`;
                                    $('.thisCtTimeline-'+cardNo).html(ctTimeLiner);
            }

            else if ( ctTimeLinerBtnText == "Angepasster Zeitstrahl entfernen" ) {
                $('.addCtTimeLiner-'+cardNo).text('Angepasster Zeitstrahl hinzufügen');
                $('.addCtTimeLiner-'+cardNo).removeClass('btn-danger');
                $('.addCtTimeLiner-'+cardNo).addClass('btn-primary');
                $('.thisCtTimeline-'+cardNo).html('');
            }
        }

        function addNewCalc(){
            $('.new_form').show();
            $('#timelineChecker').val(1);
            var target = $('#Calculation');
            var cardNo = target.find('.card').length;
            var Calc = `<div class="card card-`+cardNo+`">
                            <div class="card-header" id="heading-`+cardNo+`">
                                <h2 class="mb-0">`+
                                    // <input type="checkbox" checked name="Cal[`+cardNo+`][enabled]">
                                    `<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-`+cardNo+`">
                                        Finanzbaustein #`+(cardNo+1)+`
                                    </button>
                                    <span class="removeCard float-right"><i class="fa fa-times" onclick="removeCard(`+cardNo+`)"></i></span>
                                </h2>
                            </div>
                            <div id="collapse-`+cardNo+`" class="collapse" data-parent="#Calculation">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Bank</label>
                                                <input type="hidden" class="angebotdate" name="angebotdate" value="" />
                                                <input type="text" id="bank" class="form-control" name="Cal[`+cardNo+`][bank]"/>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tilgungssatz</label>
                                                <input type="text" id="annuities" class="form-control" name="Cal[`+cardNo+`][annuities]"/>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Sollzins</label>
                                                <input type="text" id="to_interest" value="" class="form-control" name="Cal[`+cardNo+`][to_interest]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Effektivzins</label>
                                                <input type="text" id="effectiveness" value="" class="form-control" name="Cal[`+cardNo+`][effectiveness]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Zinsbindung</label>
                                                <input type="text" id="fixed_interest_rates" value="" class="form-control" name="Cal[`+cardNo+`][fixed_interest_rates]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Monatliche Rate</label>
                                                <input type="text" id="monthly_loan" value="" class="form-control" name="Cal[`+cardNo+`][monthly_loan]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Restschuld Ende Zinsbindung</label>
                                                <input type="text" id="residual_debt_interest_rate" value="" class="form-control" name="Cal[`+cardNo+`][residual_debt_interest_rate]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Kalkulierte Luafzeit (ca.)</label>
                                                <input type="text" id="calculated_luaf_time" value="" class="form-control" name="Cal[`+cardNo+`][calculated_luaf_time]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Nettodarlehensbetrag</label>
                                                <input type="text" id="net_loan_amount" value="" class="form-control" name="Cal[`+cardNo+`][net_loan_amount]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Bereitsellungszins</label>
                                                <input type="text" id="initial_interest" value="" class="form-control" name="Cal[`+cardNo+`][initial_interest]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Optionale Soundertilgung</label>
                                                <input type="text" id="optional_sound_recovery" value="" class="form-control" name="Cal[`+cardNo+`][optional_sound_recovery]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" class="isTM-`+cardNo+`"  name="Cal[`+cardNo+`][istm]" value="0">
                                                <a onclick="openTimeLine(`+cardNo+`)" href="Javacript:void(0)" class="btn btn-primary addTimeLiner-`+cardNo+`">Baufi Zeitstrahl hinzufügen</a>
                                                <a onclick="openCtTimeLine(`+cardNo+`)" href="Javacript:void(0)" class="btn btn-primary addCtTimeLiner-`+cardNo+`">Angepasster Zeitstrahl hinzufügen</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="thisTimeline-`+cardNo+`"></div>
                                    <div class="thisCtTimeline-`+cardNo+`"></div>
                                </div>
                            </div>
                        </div>`;
            target.append(Calc);
        }
    </script>
@endsection

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<?php
    function stringReplace($string, $from = '.', $to=',')
    {
        for ($i=0; $i < strlen($string); $i++) {
            if($string[$i] == $from) $string[$i] = $to;
        }
        return $string;
    }
?>



    <form id="kunden_edit_form" method="post" action="{{route('kunden.update',$kunden->id)}}">

        <input type="hidden" id="new_form_controller" value="0">

        <div class="container" style="padding-top:10px; background-color: #fff;">
            <div class="panel-heading"><h2>{{ $kunden->vorname }} {{ $kunden->nachname }} bearbeiten</h2></div>
            <hr/>

            <div class="panel-body">
                @if($errors->any() && !$errors->has('success'))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($errors->has('success'))
                    <div class="alert alert-success" role="alert">{{$errors->first('success')}}</div>
                @endif
            </div>
            <div class="row">

{{--                location11--}}
                <div class="col-md-4 col-md-offset-2" id="finanzierungsbedarf">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <h4>Baufinanzierungsdaten</h4>
                    <div class="form-group">
                        <label for="kaufpreis">Kaufpreis des Objekts</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="kaufpreis" id="kaufpreis"
                               placeholder="0.00" value="{{ stringReplace($kunden->kaufpreis, '.', ',') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kostenumbau">Umbau/Modernisierung</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="kostenumbau" id="kostenumbau"
                               placeholder="0.00" value="{{ stringReplace($kunden->kostenumbau, '.', ',') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kostennotar">Notar/Gericht ( <span name="kostennotar" class="text-danger">0</span>€ )</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="kostennotar" id="kostennotar"
                               placeholder="{{ stringReplace($kunden->kostennotar, '.', ',') }}" value="{{ $kunden->kostennotar }}">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="grunderwerbssteuer">Grunderwerbssteuer ( <span name="grunderwerbssteuer" class="text-danger">0</span>€ )</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="grunderwerbssteuer" id="grunderwerbssteuer"
                               placeholder="{{ stringReplace($kunden->grunderwerbssteuer, '.', ',') }}" value="{{ $kunden->grunderwerbssteuer }}">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="maklerkosten">Maklerkosten ( <span name="maklerkosten" class="text-danger">0</span>€ )</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="maklerkosten" id="maklerkosten"
                               placeholder="0.00" value="{{ stringReplace($kunden->maklerkosten, '.', ',') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gesamtkosten">Gesamtkosten</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="gesamtkosten" id="gesamtkosten"
                               placeholder="0.00" value="{{ stringReplace($kunden->gesamtkosten, '.', ',')  }}" readonly="">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="eigenkapital">Eigenkapital</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="eigenkapital" id="eigenkapital"
                               placeholder="0.00" value="{{ stringReplace($kunden->eigenkapital, '.', ',') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="finanzierungsbedarf">Finanzierungsbedarf</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="finanzierungsbedarf"
                               placeholder="0.00" value="{{ stringReplace($kunden->finanzierungsbedarf, '.', ',') }}" readonly="">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-8 col-md-offset-2">
                    <h4>Stammdaten</h4>
                    <div class="form-group">
                        <label class="col-form-label" for="vorname">Vorname</label>
                        <input type="text" class="form-control" name="vorname" id="vorname"
                               placeholder="{{ $kunden->vorname }}" value="{{ $kunden->vorname }}" >
                    </div>
                    <div class="form-group">
                        <label for="nachname">Nachname</label>
                        <input type="text" class="form-control" name="nachname" id="nachname"
                               placeholder="{{ $kunden->nachname }}" value="{{ $kunden->nachname }}" >
                    </div>

                    <div class="form-group">
                        <label for="strasse">Straße</label>
                        <input type="text" class="form-control" name="strasse" id="strasse"
                               placeholder="{{ $kunden->strasse }}" value="{{ $kunden->strasse }}" >
                    </div>

                    <div class="form-group">
                        <label for="plz">PLZ</label>
                        <input type="number" class="form-control" name="plz" id="plz" placeholder="{{ $kunden->plz }}"
                               value="{{ $kunden->plz }}" >
                    </div>

                    <div class="form-group">
                        <label for="wohnort">Wohnort</label>
                        <input type="text" class="form-control" name="wohnort" id="wohnort"
                               placeholder="{{ $kunden->wohnort }}" value="{{ $kunden->wohnort }}" >
                    </div>

                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="mail" class="form-control" name="mail" id="mail" placeholder="{{ $kunden->mail }}"
                               value="{{ $kunden->mail }}" >
                    </div>

                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" class="form-control" name="telefon" id="telefon"
                               placeholder="{{ $kunden->telefon }}" value="{{ $kunden->telefon }}" >
                    </div>

                    <div class="form-group">
                        <label for="geburtsdatum">Geburtsdatum</label>
                        <input type="date" class="form-control" name="geburtsdatum" id="geburtsdatum"
                               placeholder="{{ $kunden->geburtsdatum }}" value="{{ $kunden->geburtsdatum }}"
                               >
                    </div>
                    <div class="form-group">
                        <label>Select User</label>
                        <select class="form-control" name="kunden_user">
                          @forelse($users as $user)
                            @if(isset($kunden->myuser))

                              @if ($kunden->myuser->name == $user->name)
                              <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                              @else
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                              @endif
                            @else
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                          @empty
                            <option>Please select group to show...</option>
                          @endforelse

                        </select>
                    </div>
                    <br>

                    <input type="hidden" id="timelineChecker" name="timelineChecker" value="0" />
                    <button type="submit" class="btn btn-primary">Kunden aktualisieren</button>


                    <hr>



<div id="button_edit" style="position: fixed; right: 0px; margin-top: -70px; z-index: 111111; ">
            <li class="nav-item"><a href="{{route('kunden.show',$kunden->id)}}" class=" btn btn-mkhyp" style="border-radius: 0px;">Kunden ansehen</a></li>
</div>


                    <a onclick="addNewCalc()" href="Javascript:void(0)" class="btn btn-primary">Kalkulation hinzufügen</a>

                    @if($kunden->ehepartner_enabled)
                    @php($spouseDivShown = 'block')
                    <a onclick="kundenSpouse(this)" href="Javacript:void(0)" class="btn btn-danger" data-status="1" style="margin-left: 10px">Ehepartner entfernen</a>
                    @else
                    @php($spouseDivShown = 'none')
                    <a onclick="kundenSpouse(this)" href="Javacript:void(0)" class="btn btn-primary" data-status="0"style="margin-left: 10px">Ehepartner hinzufügen</a>
                    @endif
                    <div id="spouseDiv"  style="display: {{$spouseDivShown}}">
                        <input type="hidden" name="ehepartner_enabled" value="{{$kunden->ehepartner_enabled}}">
                        <hr>
                        <h4>Ehepartner</h4>
                        <div class="form-group">
                            <label class="col-form-label" for="vorname">Vorname</label>
                            <input type="text" class="form-control" name="ehepartner_vorname" id="ehepartner_vorname"
                                   placeholder="{{ $kunden->ehepartner_vorname }}" value="{{ $kunden->ehepartner_vorname }}" >
                        </div>
                        <div class="form-group">
                            <label for="nachname">Nachname</label>
                            <input type="text" class="form-control" name="ehepartner_nachname" id="ehepartner_nachname"
                                   placeholder="{{ $kunden->ehepartner_nachname }}" value="{{ $kunden->ehepartner_nachname }}" >
                        </div>
                        <div class="form-group">
                            <label for="mail">Mail</label>
                            <input type="mail" class="form-control" name="ehepartner_mail" id="ehepartner_mail" placeholder="{{ $kunden->ehepartner_mail }}"
                                   value="{{ $kunden->ehepartner_mail }}" >
                        </div>
                        <div class="form-group">
                            <label for="telefon">Telefon</label>
                            <input type="text" class="form-control" name="ehepartner_telefon" id="ehepartner_telefon"
                                   placeholder="{{ $kunden->ehepartner_telefon }}" value="{{ $kunden->ehepartner_telefon }}" >
                        </div>
                        <div class="form-group">
                            <label for="geburtsdatum">Geburtsdatum</label>
                            <input type="date" class="form-control" name="ehepartner_geburtsdatum" id="ehepartner_geburtsdatum"
                                   placeholder="{{ $kunden->ehepartner_geburtsdatum }}" value="{{ $kunden->ehepartner_geburtsdatum }}">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Ehepartner aktualisieren</button>
                        </div>
                        <hr>
                    </div>

                    <div class="accordion mt-35" id="Calculation">
                        <?php $cIndex = 0 ?>
                        @foreach($Calculations as $cal)
                            <div class="card card-{{$cIndex}}">
                                <div class="card-header" id="heading-{{$cIndex}}">
                                    <h2 class="mb-0">
                                        <!-- <input type="checkbox" {{$cal->enabled ? 'checked':''}} onclick="enabled(this);" data-calculation_id="{{$cal->id}}" name="Cal[{{$cIndex}}][enabled]"> -->
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$cIndex}}">
                                            Finanzbaustein #{{$cIndex+1}}
                                        </button>
                                        <span class="removeCard float-right"><i class="fa fa-times" onclick="removeCard({{$cIndex}})"></i></span>
                                    </h2>
                                </div>
                                <div id="collapse-{{$cIndex}}" class="collapse" data-parent="#Calculation">
                                    <div class="card-body">

                                        <div class="row">
{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Bank</label>--}}
{{--                                                    <input type="hidden" class="angebotdate" name="angebotdate" value="{{$cal->angebotdate}}" />--}}
{{--                                                    <input type="text" id="bank" value="{{$cal->bank}}" class="form-control" name="Cal[{{$cIndex}}][bank]"/>--}}
{{--                                                        --}}{{-- <option @if($cal->bank == 'Deutsche Bank') selected @endif value="Deutsche Bank">Deutsche Bank</option>--}}
{{--                                                        <option @if($cal->bank == 'DSL') selected @endif value="DSL">DSL</option>--}}
{{--                                                        <option @if($cal->bank == 'Sparkasse') selected @endif value="Sparkasse">Sparkasse</option>--}}
{{--                                                    </select> --}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}

{{--                                                    <label>Tilgungssatz</label>--}}
{{--                                                <input type="text" id="annuities" class="form-control" value="{{$cal->annuities}}" name="Cal[{{$cIndex}}][annuities]"/>--}}
{{--                                                        --}}{{-- <option @if($cal->annuities == 'Annuitäten') selected @endif value="Annuitäten">Annuitäten</option>--}}
{{--                                                        <option @if($cal->annuities == 'Tilgungsausgesetztes Darlehen') selected @endif value="Tilgungsausgesetztes Darlehen">Tilgungsausgesetztes Darlehen</option>--}}
{{--                                                    </select> --}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Sollzins</label>--}}
{{--                                                    <input type="text" id="to_interest" value="{{$cal->to_interest}}" class="form-control" name="Cal[{{$cIndex}}][to_interest]" required>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Effektivzins</label>--}}
{{--                                                    <input type="text" id="effectiveness" value="{{$cal->effectiveness}}" class="form-control" name="Cal[{{$cIndex}}][effectiveness]" required>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Zinsbindung</label>--}}
{{--                                                    <input type="text" id="fixed_interest_rates" value="{{$cal->fixed_interest_rates}}" class="form-control" name="Cal[{{$cIndex}}][fixed_interest_rates]" required>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Monatliche Rate</label>--}}
{{--                                                    <input type="text" id="monthly_loan" value="{{$cal->monthly_loan}}" class="form-control" name="Cal[{{$cIndex}}][monthly_loan]" required>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Restschuld Ende Zinsbindung</label>--}}
{{--                                                    <input type="text" id="residual_debt_interest_rate" value="{{$cal->residual_debt_interest_rate}}" class="form-control" name="Cal[{{$cIndex}}][residual_debt_interest_rate]" required>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Kalkulierte Luafzeit (ca.)</label>--}}
{{--                                                    <input type="text" id="calculated_luaf_time" value="{{$cal->calculated_luaf_time}}" class="form-control" name="Cal[{{$cIndex}}][calculated_luaf_time]" required>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Nettodarlehensbetrag</label>--}}
                                            {{--                                                    <input type="text" id="net_loan_amount" value="{{$cal->net_loan_amount}}" class="form-control" name="Cal[{{$cIndex}}][net_loan_amount]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Bereitsellungszins</label>--}}
                                            {{--                                                    <input type="text" id="initial_interest" value="{{$cal->initial_interest}}" class="form-control" name="Cal[{{$cIndex}}][initial_interest]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Optionale Soundertilgung</label>--}}
                                            {{--                                                    <input type="text" id="optional_sound_recovery" value="{{$cal->optional_sound_recovery}}" class="form-control" name="Cal[{{$cIndex}}][optional_sound_recovery]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>
--}}


{{--                                            ange--}}
{{-- new table--}}




{{--                                            <h4>New Calculator</h4>--}}
                                            {{--Hassaan Table--}}

                                            <script>
                                                $(document).ready(function () {

                                                    $('#end_of_fixed_year').val( parseInt($('#loan_period').val())+ parseInt($('#payment_year').val()));
                                                    $('#end_of_fixed_year').val($('#payment_month').val()+','+ $('#end_of_fixed_year').val());


                                                    $('#loan_period').change(function () {

                                                        if ($('#payment_month').val() !='Marz' && $('#payment_month').val()!='Mai'&&$('#payment_month').val()!='Juni'&&$('#payment_month').val()!='Juli'&&$('#payment_month').val()!='Oktober'&&$('#payment_month').val()!='Dezember')
                                                        {

                                                            $('#end_of_fixed_year').empty();
                                                            $('#end_of_fixed_year').val( parseInt($('#loan_period').val())+ parseInt($('#payment_year').val()));
                                                            $('#end_of_fixed_year').val($('#payment_month').val()+','+ $('#end_of_fixed_year').val());
                                                        }
                                                        else
                                                        {
                                                            alert('Monat nicht erlaubt');
                                                        }


                                                    });

                                                    $('#payment_year').change(function () {
                                                        if ($('#payment_month').val() !='Marz' && $('#payment_month').val()!='Mai'&&$('#payment_month').val()!='Juni'&&$('#payment_month').val()!='Juli'&&$('#payment_month').val()!='Oktober'&&$('#payment_month').val()!='Dezember')
                                                        {

                                                            $('#end_of_fixed_year').empty();
                                                            $('#end_of_fixed_year').val( parseInt($('#loan_period').val())+ parseInt($('#payment_year').val()));
                                                            $('#end_of_fixed_year').val($('#payment_month').val()+','+ $('#end_of_fixed_year').val());
                                                        }
                                                        else
                                                        {
                                                            alert('Monat nicht erlaubt');
                                                        }

                                                    });
                                                    $('#payment_month').change(function () {
                                                        if ($('#payment_month').val() !='Marz' && $('#payment_month').val()!='Mai'&&$('#payment_month').val()!='Juni'&&$('#payment_month').val()!='Juli'&&$('#payment_month').val()!='Oktober'&&$('#payment_month').val()!='Dezember')
                                                        {

                                                            $('#end_of_fixed_year').empty();
                                                            $('#end_of_fixed_year').val( parseInt($('#loan_period').val())+ parseInt($('#payment_year').val()));
                                                            $('#end_of_fixed_year').val($('#payment_month').val()+','+ $('#end_of_fixed_year').val());
                                                        }else
                                                        {
                                                            alert('Monat nicht erlaubt');
                                                        }


                                                    });

                                                    $('#payment_amount').click(function () {

                                                        var loan_ammount = parseInt($('#loan_amount').val());

                                                        var discount = parseInt($('#payment_discount').val());
                                                        var payout = loan_ammount*(100-discount)/100;

                                                        $('#payment_amount').val(payout);
                                                    });

                                                });

                                            </script>
                                            <table class="table table-striped table-bordered">

                                                <tr>
                                                    <td colspan="4"> <h5>Darlehensrechner</h5></td>

                                                </tr>

                                                <tr>
                                                    <td>Kreditsumme ( € )</td>
                                                    <td colspan="4"><input class="form-control text-right" id="loan_amount" type=""></td>
                                                </tr>
                                                <tr>
                                                    <td >Zinsbindun</td>
                                                    <td colspan="4">
                                                        <select id="loan_period" class="form-control">
                                                            <?php
                                                            for($i= 1;$i<=30;$i++)
                                                            {
                                                            ?>
                                                            <option value="{{$i}}">
                                                                {{$i}}
                                                                @if($i==1)
                                                                    Jahr
                                                                @else
                                                                    Jahre
                                                                @endif
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Auszahlungstermin</td>
                                                    <td colspan="2">
                                                        <select id="payment_month" class="form-control">
                                                            <option selected value='Janaur'>Janaur</option>
                                                            <option value='Februar'>Februar</option>
                                                            <option value='Marz'>Marz</option>
                                                            <option value='April'>April</option>
                                                            <option value='Mai'>Mai</option>
                                                            <option value='Juni'>Juni</option>
                                                            <option value='Juli'>Juli</option>
                                                            <option value='August'>August</option>
                                                            <option value='September'>September</option>
                                                            <option value='Oktober'>Oktober</option>
                                                            <option value='November'>November</option>
                                                            <option value='Dezember'>Dezember</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="4">

                                                        <select id="payment_year"  class="form-control">

                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>

                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Ende der Zinsbindung</td>
                                                    <td colspan="4"><input id="end_of_fixed_year" class="form-control text-right"  disabled></td>
                                                </tr>

                                                <tr>
                                                    <td>Grundbuchkosten ( € )</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="registery_fees" class="form-control text-right">

                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Disagio (Prozent)</td>
                                                    <td colspan="4">
                                                    <div class="input-group">
                                                        <input id="payment_discount" class="form-control text-right">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Auszahlungsbetrag ( € )</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="payment_amount" class="form-control text-right">
                                                                <div class="input-group-append">
                                                              <span class="input-group-text">€</span>
                                                                </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Sollzinssatz (Prozent)</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                        <input id="borrowing_rate" class="form-control text-right">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="repayment_date" value="Tilgungssatz (Prozent)" name="repayment">
                                                            <label class="custom-control-label" for="repayment_date">Tilgungssatz (Prozent)</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                        <input id="repayment_date_inp" class="form-control text-right">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="montly_deposit" value="Monatsrate (Euro)" name="repayment">
                                                            <label class="custom-control-label" for="montly_deposit">Monatsrate ( € )</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                    <div class="input-group">
                                                        <input id="montly_deposit_val" class="form-control text-right">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">€</span>
                                                        </div>
                                                    </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="payment_type_any" value="Volltilgerdarlehen" name="repayment">
                                                            <label class="custom-control-label" for="payment_type_any">Volltilgerdarlehen</label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Jährliche Sondertilgungen ab</td>
                                                    <td>
                                                        <select id="annual_unsheduled_month" class="form-control">
                                                            <option selected value='Janaur'>Janaur</option>
                                                            <option value='Februar'>Februar</option>
                                                            <option value='Marz'>Marz</option>
                                                            <option value='April'>April</option>
                                                            <option value='Mai'>Mai</option>
                                                            <option value='Juni'>Juni</option>
                                                            <option value='Juli'>Juli</option>
                                                            <option value='August'>August</option>
                                                            <option value='September'>September</option>
                                                            <option value='Oktober'>Oktober</option>
                                                            <option value='November'>November</option>
                                                            <option value='Dezember'>Dezember</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select id="annual_unsheduled_year"  class="form-control">

                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                        </select>
                                                    </td>

                                                    <td colspan="4"><input id="annual_unsheduled_val" class="form-control text-right"></td>
                                                </tr>

                                                <tr>
                                                    <td>bis</td>
                                                    <td>
                                                        <select id="annual_to_month" class="form-control">

                                                        </select>
                                                    </td>
                                                    <td colspan="4">
                                                        <select id="annual_to_year"  class="form-control">

                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Einmalige Sondertilgung</td>
                                                    <td>
                                                        <select id="onetime_unsheduled_month" class="form-control">
                                                            <option selected value='Janaur'>Janaur</option>
                                                            <option value='Februar'>Februar</option>
                                                            <option value='Marz'>Marz</option>
                                                            <option value='April'>April</option>
                                                            <option value='Mai'>Mai</option>
                                                            <option value='Juni'>Juni</option>
                                                            <option value='Juli'>Juli</option>
                                                            <option value='August'>August</option>
                                                            <option value='September'>September</option>
                                                            <option value='Oktober'>Oktober</option>
                                                            <option value='November'>November</option>
                                                            <option value='Dezember'>Dezember</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select id="onetime_unsheduled_year"  class="form-control">

                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                            <option value="2032">2032</option>
                                                            <option value="2033">2033</option>
                                                            <option value="2032">2034</option>
                                                            <option value="2033">2035</option>
                                                        </select>
                                                    </td>

                                                    <td colspan="4"><input id="onetime_unsheduled_val" class="form-control text-right"></td>

                                                </tr>
                                                <tr>
                                                    <td>Einmalige Sondertilgung</td>
                                                    <td>
                                                        <select id="onetime_unsheduled_month_1" class="form-control">
                                                            <option selected value='Janaur'>Janaur</option>
                                                            <option value='Februar'>Februar</option>
                                                            <option value='Marz'>Marz</option>
                                                            <option value='April'>April</option>
                                                            <option value='Mai'>Mai</option>
                                                            <option value='Juni'>Juni</option>
                                                            <option value='Juli'>Juli</option>
                                                            <option value='August'>August</option>
                                                            <option value='September'>September</option>
                                                            <option value='Oktober'>Oktober</option>
                                                            <option value='November'>November</option>
                                                            <option value='Dezember'>Dezember</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select id="onetime_unsheduled_year_1"  class="form-control">

                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                            <option value="2032">2032</option>
                                                            <option value="2033">2033</option>
                                                            <option value="2032">2034</option>
                                                            <option value="2033">2035</option>
                                                        </select>
                                                    </td>

                                                    <td colspan="4"><input id="onetime_unsheduled_val_1" class="form-control text-right"></td>

                                                </tr>

                                                <tr>
                                                    <td>Restschuld ( € )</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                        <input id="Outstanding_balance" class="form-control text-right">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Effektivzins (Prozent)</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                        <input id="effective__interest" class="form-control text-right">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Anschlusskredit</td>
                                                    <td colspan="4"><input id="connection_credit" class="form-control text-right"></td>
                                                </tr>

                                                <tr>
                                                    <td>Neuer Sollzinssatz (Prozent)</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                        <input id="new_borrowing_rate" class="form-control text-right">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="new_repayment_date" value="Tilgungssatz (Prozent)" name="new_repayment">
                                                            <label class="custom-control-label" for="new_repayment_date">Neuer Tilgungssatz (Proz.)</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4"><input id="new_repayment_inp" class="form-control text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="new_rate" value="Tilgungssatz (Prozent)" name="new_repayment">
                                                            <label class="custom-control-label" for="new_rate">Tilgungssatz (Prozent)</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                        <input id="new_rate_inp" class="form-control text-right">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Gesamtlaufzeit (Jahre/Monate)</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                        <input id="total_maturity" class="form-control text-right">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Y/M</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </table>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="Cal[{{$cIndex}}][id]" value="{{$cal->id}}">
                                                    <input type="hidden" class="isTM-{{$cIndex}}"  name="Cal[{{$cIndex}}][istm]" value="0">
                                                    @if(isset($cal->timeline->id))
                                                        <a onclick="openTimeLine({{$cIndex}})" href="Javacript:void(0)" class="btn btn-danger addTimeLiner-{{$cIndex}}">Baufi Zeitstrahl entfernen</a>
                                                    @else
                                                        <a onclick="openTimeLine({{$cIndex}})" href="Javacript:void(0)" class="btn btn-primary addTimeLiner-{{$cIndex}}">Baufi Zeitstrahl hinzufügen</a>
                                                    @endif

                                                    @if(isset($cal->customerTimeline->id))
                                                        <a onclick="openCtTimeLine({{$cIndex}})" href="Javacript:void(0)" class="btn btn-danger addCtTimeLiner-{{$cIndex}}">Angepasster Zeitstrahl entfernen</a>
                                                    @else
                                                        <a onclick="openCtTimeLine({{$cIndex}})" href="Javacript:void(0)" class="btn btn-primary addCtTimeLiner-{{$cIndex}}">Angepasster Zeitstrahl hinzufügen</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="thisTimeline-{{$cIndex}}">
                                            @if(isset($cal->timeline->id))
                                                <input type="hidden" name="Cal[{{$cIndex}}][timeline][id]" value="{{$cal->timeline->id}}">
                                                <div class="row ten_fields-{{$cIndex}} mt-35">
                                                    <div class="col-sm-12">
                                                        <h5>Zeitstrahl Phase 1</h5>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Finanzierungsbedarf</label>
                                                    <input type="text" id="finanzierungsbedarf_phase_eins" name="Cal[{{$cIndex}}][timeline][finanzierungsbedarf_phase_eins]" class="form-control" placeholder="0€" value="{{$cal->timeline->finanzierungsbedarf_phase_eins}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Zins p.a.</label>
                                                        <input type="text" id="jahreszins_phase_eins" name="Cal[{{$cIndex}}][timeline][jahreszins_phase_eins]" class="form-control" placeholder="%" value="{{$cal->timeline->jahreszins_phase_eins}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Laufzeit</label>
                                                        <input type="text" id="laufzeit_phase_eins" name="Cal[{{$cIndex}}][timeline][laufzeit_phase_eins]" class="form-control" placeholder="Jahre" value="{{$cal->timeline->laufzeit_phase_eins}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">monatliche Rate</label>
                                                        <input type="text" id="rate_monatlich_phase_eins" name="Cal[{{$cIndex}}][timeline][rate_monatlich_phase_eins]" class="form-control" placeholder="0€" value="{{$cal->timeline->rate_monatlich_phase_eins}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Restschuld Phase 1</label>
                                                        <input type="text" id="restschuld_phase_eins" name="Cal[{{$cIndex}}][timeline][restschuld_phase_eins]" class="form-control" placeholder="" value="{{$cal->timeline->restschuld_phase_eins}}" required>
                                                    </div>
                                                </div>
                                                <div class="row ten_fields-{{$cIndex}}">
                                                    <div class="col-sm-12">
                                                        <h5>Zeitstrahl Phase 2</h5>
                                                    </div>

                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Finanzierungsbedarf</label>
                                                        <input type="text" id="finanzierungsbedarf_phase_zwei" name="Cal[{{$cIndex}}][timeline][finanzierungsbedarf_phase_zwei]" class="form-control" placeholder="0€" value="{{$cal->timeline->finanzierungsbedarf_phase_zwei}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Zins p.a.</label>
                                                        <input type="text" id="jahreszins_phase_zwei" name="Cal[{{$cIndex}}][timeline][jahreszins_phase_zwei]" class="form-control" placeholder="%" value="{{$cal->timeline->jahreszins_phase_zwei}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Laufzeit</label>
                                                        <input type="text" id="laufzeit_phase_zwei" name="Cal[{{$cIndex}}][timeline][laufzeit_phase_zwei]" class="form-control" placeholder="Jahre" value="{{$cal->timeline->laufzeit_phase_zwei}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">monatliche Rate</label>
                                                        <input type="text" id="rate_monatlich_phase_zwei" name="Cal[{{$cIndex}}][timeline][rate_monatlich_phase_zwei]" class="form-control" placeholder="0€" value="{{$cal->timeline->rate_monatlich_phase_zwei}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Restschuld</label>
                                                        <input type="text" id="restschuld_ende" name="Cal[{{$cIndex}}][timeline][restschuld_ende]" class="form-control" placeholder="Jahre" value="{{$cal->timeline->restschuld_ende}}" required>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="thisCtTimeline-{{$cIndex}}">
                                            @if(isset($cal->customerTimeline->id))
                                                <input type="hidden" name="Cal[{{$cIndex}}][customerTimeline][id]" value="{{$cal->customerTimeline->id}}">
                                                <div class="row ct_fields-{{$cIndex}} mt-35">
                                                    <div class="col-sm-12">
                                                        <h5>Zeitstrahl Phase 1 (Angepasster)</h5>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Darlehen</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][darlehen]" class="form-control" placeholder="" value="{{$cal->customerTimeline->darlehen}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Zinsstaz</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][zinsstaz]" class="form-control" placeholder="" value="{{$cal->customerTimeline->zinsstaz}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Tilgung</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][tilgung]" class="form-control" placeholder="" value="{{$cal->customerTimeline->tilgung}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Laufzeit</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][laufzeit]" class="form-control" placeholder="" value="{{$cal->customerTimeline->laufzeit}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Rate monatl</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][rate_monatl]" class="form-control" placeholder="" value="{{$cal->customerTimeline->rate_monatl}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Restschuld</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][restschuld]" class="form-control" placeholder="" value="{{$cal->customerTimeline->restschuld}}" required>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php $cIndex++; ?>
                        @endforeach
                    </div>



                    <div class="row mt-15">
                        <div class="col-sm-12 @if(count($Calculations) == 0) new_form @endif">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Angebotsdatum</h5>
                                    <input type="date" name="angebotdate" id="angebotdate" value="" placeholder="Angebotsdatum" class="form-control">

                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" value="calculation" name="calculation" class="btn btn-primary float-right">Berechnung speichern</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4>Tilgungsplan</h4>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label for="bank">Bank</label>
                            <input type="text" id="bank" class="form-control"  value="Deutsche Bank">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="bank">Darlehen</label>
                            <input type="number" class="form-control" id="loan" placeholder="150.000,00€">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="bank">Nominalzins(%)</label>
                            <input type="number" class="form-control" name="interest" id="interest" placeholder=2.19%>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="bank">Tilgung (%)</label>
                            <input type="number" class="form-control" name="repayment" id="repayment" placeholder=2.00%>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label for="bank">Tilgungsbeginn</label>
                            <input type="date"  class="form-control" name="repaymentStart" id="repaymentStart" value="2018-04-01">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="fixed_interest_rate">Zinsfestschreibung</label>
                            <input type="date" class="form-control"  name="fixedInterestRate" id="fixedInterestRate" value="2028-04-30">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="payout">Auszahlung</label>
                            <input type="date" class="form-control" name="payout" id="payout" value="2018-04-01">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="bank">Rate</label>
                            <input type="number" class="form-control"  name="rate" id="rate" value=523.75>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#repayment_modal" type="button"  onclick="calculate()">Kalkulieren</button>
                            <button class="btn btn-danger" type="button"  data-toggle="modal" data-target="#confirm_modal">Tilgungsplan löschen</button>
                        </div>
                    </div>
                    <label for="result" id="result"></label>
                    <hr />
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <h4>Checkliste</h4>
                            <p>Folgende Unterlagen müssen eingereicht werden:</p>
                            <div class="row">
                              @php($i=0)
                              @foreach($checklistCategory as $category)
                              @if(count($category->checklists)>0)
                              <h5 class="w-100" style="padding: 10px 30px;">{{$category->name}}</h5>
                              @foreach($category->checklists as $checklist)
                              <div class="col-sm-12" style="padding: 10px 30px;">
                                    <input type="checkbox" class="cbx" id="cbx{{$i}}" style="display: none;" {{ $kunden->checklists->contains($checklist)?"checked":''}}>
                                    <label for="cbx{{$i}}" class="check" onclick="checkedFunction(this, 'kunden')" data-id="{{$checklist->id}}">
                                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                        <polyline points="1 9 7 14 15 4"></polyline>
                                    </svg>
                                    </label>
                                    <label for="cbx{{$i}}" onclick="checkedFunction(this, 'kunden')" data-id="{{$checklist->id}}">{{$checklist->body}}</label>
                              </div>
                              @php($i++)
                              @endforeach
                              @endif
                              @endforeach
                            </div>
                        </div>
                        @php($checklistEnable = $kunden->ehepartner_enabled? 'block':'none')
                        <div class="col-6" id="ehepartnerChecklist" style="display: {{$checklistEnable}}">
                            <h4>Checkliste (Ehepartner)</h4>
                            <p>Folgende Unterlagen müssen eingereicht werden:</p>
                            <div class="row">

                              @foreach($checklistCategory as $category)
                              @if(count($category->checklists)>0)
                              <h5 class="w-100" style="padding: 10px 30px;">{{$category->name}}</h5>
                              @foreach($category->checklists as $checklist)
                              <div class="col-sm-12" style="padding: 10px 30px;">
                                    <input type="checkbox" class="cbx" id="cbx{{$i}}" style="display: none;" {{ $kunden->ehepartnerChecklists->contains($checklist)?"checked":''}}>
                                    <label for="cbx{{$i}}" class="check" onclick="checkedFunction(this, 'ehepartner')" data-id="{{$checklist->id}}">
                                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                        <polyline points="1 9 7 14 15 4"></polyline>
                                    </svg>
                                    </label>
                                    <label for="cbx{{$i}}" onclick="checkedFunction(this, 'ehepartner')" data-id="{{$checklist->id}}">{{$checklist->body}}</label>
                              </div>
                              @php($i++)
                              @endforeach
                              @endif
                              @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </form>




    <!-- Modal -->
    <div class="modal fade" id="repayment_modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-left">Tilgungsplan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" >
                    <div>
                        <table id="example" class="display" style="width:100%; height: 500px !important; overflow: scroll">
                            <thead>
                            <tr>
                                <th>Rückzahlungsdatum</th>
                                <th>Zinsen</th>
                                <th>Tilgung</th>
                                <th>Darlehensrest</th>
                            </tr>
                            </thead>
                            <tbody style="height: 500px !important;">

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="confirm_modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-left">Info</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" >
                    <p>Soll der Tilgungsplan gelöscht werden??</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                    <button type="button" class="btn btn-primary" id="confirm_delete_yes" onclick="deleteCalc()">Ja</button>
                </div>
            </div>
        </div>
    </div>

    {{csrf_field()}}
    <script type="text/javascript" src="{{ asset('/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">

        function removeCard(cardNo) {
            $('.card-' + cardNo).remove();
        }

        function save_timeline() {
            // alert('1');
            //if ( confirm('Are you sure you want to submit?') ) {
            var tenFieldFlag = $('#new_form_controller').val();
            //var serializeForm = $('#kunden_edit_form').serializeArray();

            /* setTimeout(function(){
                $("#kunden_edit_form").submit();
            }, 500); */

            /* $.ajax({
                url: 'save_timeline',
                type: 'post',
                data: {
                    _token: $('[name="_token"]').val(),

                    // New 11 fields
                    bank: $('#bank').val(),
                    annuities: $('#annuities').val(),
                    to_interest: $('#to_interest').val(),
                    effectiveness: $('#effectiveness').val(),
                    fixed_interest_rates: $('#fixed_interest_rates').val(),
                    monthly_loan: $('#monthly_loan').val(),
                    residual_debt_interest_rate: $('#residual_debt_interest_rate').val(),
                    calculated_luaf_time: $('#calculated_luaf_time').val(),
                    net_loan_amount: $('#net_loan_amount').val(),
                    initial_interest: $('#initial_interest').val(),
                    optional_sound_recovery: $('#optional_sound_recovery').val(),
                    prepared_by: $('#prepared_by').val(),

                    // New 10 fields flag
                    ten_fields_flag: tenFieldFlag,

                    jahreszins_phase_eins: $('#jahreszins_phase_eins').val(),
                    laufzeit_phase_eins: $('#laufzeit_phase_eins').val(),
                    rate_monatlich_phase_eins: $('#rate_monatlich_phase_eins').val(),
                    finanzierungsbedarf_phase_zwei: $('#finanzierungsbedarf_phase_zwei').val(),
                    jahreszins_phase_zwei: $('#jahreszins_phase_zwei').val(),
                    laufzeit_phase_zwei: $('#laufzeit_phase_zwei').val(),
                    rate_monatlich_phase_zwei: $('#rate_monatlich_phase_zwei').val(),
                    restschuld_ende: $('#restschuld_ende').val(),
                    restschuld_phase_eins: $('#restschuld_phase_eins').val(),
                    finanzierungsbedarf_phase_eins: $('#finanzierungsbedarf_phase_eins').val(),

                    fullForm: serializeForm
                },
                success: function(res) {
                    toastr.success(res);
                },
                error: function(error) {
                    var error = JSON.parse(error.responseText);
                    error = error.errors;
                    $.each(error, function(k, v){
                        toastr.error(k+': '+v[0]);
                    })
                }
            }); */
        }
        function deleteCalc() {
            $.ajax({
                url: 'delete_repayment',
                type: 'get',
                success: function (res) {
                    $('#confirm_modal').modal('hide');
                    alert("Kalkulation erfolgreich gelöscht.");
                }
            });
        }

        function calculate()
        {
            // Werte aus den Inputfeldern
            var loan = Number.parseFloat(document.getElementById("loan").value);
            var interest = Number.parseFloat(document.getElementById("interest").value);
            var repayment = Number.parseFloat(document.getElementById("repayment").value);
            var repaymentStart = document.getElementById("repaymentStart").value;
            var fixedInterestRate = document.getElementById("fixedInterestRate").value;
            var payout = document.getElementById("payout").value;
            var rate = Number.parseFloat(document.getElementById("rate").value);

            if(!(repaymentStart instanceof Date))
            {
                repaymentStart = new Date(repaymentStart);
            }

            if(!(fixedInterestRate instanceof Date))
            {
                fixedInterestRate = new Date(fixedInterestRate);
            }

            if(!(payout instanceof Date))
            {
                payout = new Date(payout);
            }

            // Werte für die Berechnung
            var calcInterest = 0;
            var calcRepayment = 0;

            var loansRest = loan;

            var months = monthDiff(payout, fixedInterestRate);
            var curPayoutDate = new Date(payout.getFullYear(), payout.getMonth() + 1, 0);   // Nur zu Ausgabezwecken

            var resultString = "";

            // Nun monatlich kalkulieren

            month_names_short = ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'];

            function changeString(s) {
                return s.toLocaleString('de-DE', {
                    style: 'currency',
                    currency: 'EUR',
                    minimumFractionDigits: 2
                });
            }
            var resarr = [];
            for(var i = 0; i <= months; i++)
            {
                calcInterest = (loansRest * interest / 12) / 100;
                calcRepayment = rate - calcInterest;
                loansRest -= calcRepayment;
                loansRest = loansRest;

                resultString += "<tr><td>" + month_names_short[curPayoutDate.getMonth()] + " " + curPayoutDate.getFullYear() + "</td><td>" + changeString(round(calcInterest, 2)) + "     " + "</td><td>" +changeString(round(calcRepayment, 2)) + "</td><td>" + changeString(round(loansRest, 2)) + "</td></tr>";

                curPayoutDate.setMonth(curPayoutDate.getMonth() + 1);

                var temp = {
                    'repayment_date':(month_names_short[curPayoutDate.getMonth()]) + " " + curPayoutDate.getFullYear(),
                    'zinsen': changeString(round(calcInterest, 2)),
                    'tilgung': changeString(round(calcRepayment, 2)),
                    'darlehensrest': changeString(round(loansRest, 2))
                };

                resarr.push(temp);
            }

            //console.log(resultString);
            // document.getElementById("result").innerHTML = resultString;

            $.ajax({
                url: 'save_repayment',
                type: 'post',
                data: {
                    _token: $('[name="_token"]').val(),
                    data: resarr
                },
                success: function (res) {
                    $('#example').find('tbody').html(resultString);
                }
            });
        }

        //Berechnet die Differenz in Monaten zweier Datetimes um die Laufzeit des Darlehens zu ermitteln
        function monthDiff(d1, d2) {
            var months;
            months = (d2.getFullYear() - d1.getFullYear()) * 12;
            months -= d1.getMonth() + 1;
            months += d2.getMonth();
            return months <= 0 ? 0 : months;
        }

        function round(value, decimals) {
            return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
        }

        // function enabled(checkBox) {
        //     var calculation_id = $(checkBox).data('calculation_id');
        //     // If the checkbox is checked, display the output text
        //     $.ajax({
        //         url: '{{ route("calculation.statusChange") }}',
        //         type: 'post',
        //         data: {
        //             _token: $('[name="_token"]').val(),
        //             calculation_id: calculation_id
        //         },
        //         success: function (response) {
        //             console.log(response.calculation);
        //             if(response.calculation.enabled == 1) {
        //                 $(checkBox).prop('checked', true);
        //             } else {
        //                 $(checkBox).prop('checked', false);
        //             }
        //             swal({
        //                 title: "Enabled!",
        //                 text: "Your selected kalkulation is enabled for print.",
        //                 type: "success",
        //                 icon: 'success',
        //                 timer: 2000
        //             });
        //         },
        //         error: function (error) {
        //             if (checkBox.checked == false){
        //                 $(checkBox).prop('checked', true);
        //             } else {
        //                 $(checkBox).prop('checked', false);
        //             }
        //             swal({
        //                 title: "Error!",
        //                 text: "Something wrong. Try again.",
        //                 type: "error",
        //                 icon: 'error',
        //                 timer: 2000
        //             });
        //         }
        //     });
        // }

        function kundenSpouse(th) {
            if($(th).data('status') == 1) {
                $('input[name="ehepartner_enabled"]').val(0);
                $('#spouseDiv').fadeOut();
                $('#ehepartnerChecklist').fadeOut();
                $(th).data('status', 0);
                $(th).html('Ehepartner hinzufügen');
                $(th).removeClass('btn-danger').addClass('btn-primary');
            } else {
                $('input[name="ehepartner_enabled"]').val(1);
                $('#spouseDiv').fadeIn();
                $('#ehepartnerChecklist').fadeIn();
                $(th).data('status', 1);
                $(th).html('Ehepartner entfernen');
                $(th).removeClass('btn-primary').addClass('btn-danger');
            }
        }
        function checkedFunction(th, who) {
          $.ajax({
              url: "{{route('kundenChecklist')}}",
              type: 'post',
              data: {
                  _token: $('[name="_token"]').val(),
                  data_id: $(th).data('id'),
                  kunden_id: '{{$kunden->id}}',
                  who: who,
                  action: $(th).parent().find('input[type="checkbox"]').is(':checked') ? 1:0
              },
              success: function (res) {
                if(res.success == true) {
                    // $(th).parent().find('input[type="checkbox"]').prop('checked', true);
                } else {
                    if($(th).parent().find('input[type="checkbox"]').is(':checked')) {
                      $(th).parent().find('input[type="checkbox"]').prop('checked', false);
                    } else {
                      $(th).parent().find('input[type="checkbox"]').prop('checked', true);
                    }
                }
              }
          });
        }


    </script>

@endsection
