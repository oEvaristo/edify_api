@extends('adminlte::page')

@section('title', 'Cadastro Cotação')

@section('content')

    <!-- Modal Carregando -->
    <div class="modal" data-backdrop="static" id="telaCarregando" tabindex="-1" role="dialog" aria-hidden="true"
        style="z-index: 1500;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header card-outline card-primary">
                    <h5 class="modal-title">Carregando Aguarde !</h5>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-outline card-primary" style="margin-top: 20px;">
        <div class="card-header">
            <h3 class="card-title">Cadastro Cotação</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <form id="f_cotacao">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Selecione a Transportadora</label>
                            <select name="transportadora_id" id="transportadora_id" class="form-control">
                                <option value=""></option>
                                @foreach ($lista_transportadora as $trans)
                                    <option value="{{ $trans['id'] }}">{{ $trans['id'] . ' - ' . $trans['nome'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Selecione o Estado</label>
                            <select name="uf" id="uf" class="form-control">
                                <option value=""></option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Percentual Cotação %</label>
                            <input name="percentual_cotacao" id="percentual_cotacao" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Valor Extra (R$)</label>
                            <input name="valor_extra" id="valor_extra" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-2" style="margin-bottom: 30px">
                    <button type="button" class="btn btn-block btn-primary" onclick="grava_cotacao()">
                        <i class="fas fa-save" style="margin-right: 5px"></i> Salvar</button>
                </div>


                <table id="tb_cotacoes" class="table table-striped table-bordered" style="width:100%; font-size: 12px">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>UF</th>
                            <th>Perc. Frete</th>
                            <th>Valor Taxa</th>
                            <th>Transportadora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista_cotacoes as $cotacao)
                            <tr>
                                <td>{{ $cotacao['id'] }}</td>
                                <td>{{ $cotacao['uf'] }}</td>
                                <td>{{ $cotacao['percentual_cotacao'] }}%</td>
                                <td>R$ {{ $cotacao['valor_extra'] }}</td>
                                <td>{{ $cotacao['transportadora_id'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('js')
    <script src="../public/vendor/moment/moment.min.js"></script>
    <script src="../public/vendor/inputmask/jquery.inputmask.min.js"></script>
    <script src="../public/vendor/jquery_maskmoney/jquerymaskmoney.js"></script>
    <script>
        $(document).ready(function() {

            $("#valor_extra").maskMoney({
                prefix: "",
                decimal: ",",
                thousands: ".",
                allowZero: true
            });

            $("#percentual_cotacao").maskMoney({
                prefix: "",
                decimal: ",",
                thousands: "."
            });


            var table = $('#tb_cotacoes').DataTable({
                "paging": false,
                "ordering": true,
                "info": false,
                "pageLength": 50,
                "language": {
                    "sSearch": "Pesquisar",
                    "decimal": ",",
                    "thousands": "."
                }
            });
        });

        function grava_cotacao() {

            $('#telaCarregando').modal('show');

            var c_uf = $("#uf").val();
            var c_perc_cotacao = format_numero($("#percentual_cotacao").val());
            var c_val_extra = format_numero($("#valor_extra").val());
            var c_trans_id = $("#transportadora_id").val();

            $.ajax({
                method: 'POST',
                url: '../public/api/cotacao',
                dataType: 'application/json',
                cache: false,
                data: {
                    uf: c_uf,
                    percentual_cotacao: c_perc_cotacao,
                    valor_extra: c_val_extra,
                    transportadora_id: c_trans_id
                },
                error: function(xhr, er) {

                    $('#telaCarregando').modal('hide');

                    if (xhr.status == 500) {
                        obj = JSON.parse(xhr.responseText);

                        Swal.fire({
                            title: 'Atenção',
                            text: '' + obj['message'] + '',
                            type: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        });
                    } else if (xhr.status == 200) {

                        obj = JSON.parse(xhr.responseText);

                        Swal.fire({
                            title: 'Salvo !',
                            text: 'Cotação gravada com Sucesso !',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                window.location.replace("../public/");
                            }
                        });
                    }
                }
            });
        }

        function format_numero(num) {
            num = num.replace('.', '');
            num = num.replace(',', '.');
            return num;
        }
    </script>
@stop
