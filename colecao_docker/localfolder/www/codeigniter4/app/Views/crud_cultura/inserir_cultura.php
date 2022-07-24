<script>
$(document).ready(function() {
    $('#pais').change(function() {
        var id_pais = $('#pais').val();
        var action = 'get_estado';

        if (id_pais != '') {
            $.ajax({
                url: "/action",
                method: "POST",
                data: {
                    id_pais: id_pais,
                    action: action
                },
                dataType: "JSON",
                success: function(data) {
                    var html = '<option value="">Selecione o Estado</option>';

                    for (var count = 0; count < data.length; count++) {
                        html += '<option value="' + data[count].id_estados + '">' + data[
                            count].nome_estados + '</option>';
                    }
                    $('#estado').html(html);
                }
            });
        } else {
            $('#estado').val('');
        }
        $('#cidade').val('');
    });

    $('#estado').change(function() {
        var id_estado = $('#estado').val();
        var action = 'get_cidade';

        if (id_estado != '') {
            $.ajax({
                url: "/action",
                method: "POST",
                data: {
                    id_estado: id_estado,
                    action: action
                },
                dataType: "JSON",
                success: function(data) {
                    var html = '<option value="">Selecione a Cidade</option>';

                    for (var count = 0; count < data.length; count++) {
                        html += '<option value="' + data[count].id_cidades + '">' + data[
                            count].nome_cidades + '</option>';
                    }
                    $('#cidade').html(html);
                }
            });
        } else {
            $('#cidade').val('');
        }
    });
});
</script>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4d">
    <form method="post" id="add_create" name="add_create" action="<?= base_url('/cultura/store/') ?>">
        <div class="card">
            <div class="card-header text-center">
                <h5>Adicionar uma cultura.</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Espécie.</h6>
                        </label>
                        <select name="id_especie" id="id_especie">
                            <?php foreach($especies as $especie){?>
                            <option value="<?php echo $especie['id_especie']?>"><?php echo $especie['nome_especie']?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <label>
                            <h6>Meio de Cultivo.</h6>
                        </label>
                        <select name="id_meio" id="id_meio">
                            <?php foreach($meios as $meio){ ?>
                            <option value="<?php echo $meio['id_meio_cultivo']?>"><?php echo $meio['meio_cultivo']?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>




                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>DPUA.</h6>
                        </label>
                        <input name="n_dpua" id="n_dpua" type="text" class="form-control" placeholder="First name"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Código da cultura.</h6>
                        </label>
                        <input name="codigo_col_ext" type="text" class="form-control" placeholder="Last name"
                            aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Autor.</h6>
                        </label>
                        <input name="autor" type="text" class="form-control" placeholder="First name"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Método de Preservação.</h6>
                        </label>
                        <input name="metodo_preser" type="text" class="form-control" placeholder="Last name"
                            aria-label="Last name">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Cultura Descartada.</h6>
                        </label>
                        <input name="cult_descar" type="text" class="form-control" placeholder="First name"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>N° Cultura Preservada em óleo.</h6>
                        </label>
                        <input name="n_cult_preser_oleo" type="text" class="form-control" placeholder="Last name"
                            aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>N° Cultura Preservada em água.</h6>
                        </label>
                        <input name="n_cult_preser_agua" type="text" class="form-control" placeholder="First name"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Data da preservação em óleo.</h6>
                        </label>
                        <input name="data_preser_oleo" type="date" class="form-control" placeholder="Last name"
                            aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Data da Preservação em água.</h6>
                        </label>
                        <input name="data_preser_agua" type="date" class="form-control" placeholder="First name"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Depositante.</h6>
                        </label>
                        <input name="depositante" type="text" class="form-control" placeholder="Last name"
                            aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Histórico do depósito.</h6>
                        </label>
                        <input name="historico" type="text" class="form-control" placeholder="First name"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Forma de Envio.</h6>
                        </label>
                        <input name="forma_envio" type="text" class="form-control" placeholder="Last name"
                            aria-label="Last name">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Restrição.</h6>
                        </label>
                        <select name="restricao" class="form-select" aria-label="Default select example">
                            <option selected>Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Status.</h6>
                        </label>
                        <input name="status" type="text" class="form-control" placeholder="First name"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Observações.</h6>
                        </label>
                        <textarea name="observacao" class="form-control" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>País</h6>
                        </label>
                        <select class="form-select" id="pais" name="pais">
                            <option value="">Selecione o país</option>
                            <?php
                                    foreach($pais as $linha){
                                        echo '<option value="'.$linha["id_pais"].'">'.$linha["nome_pt_pais"].'</option>';
                                    }
                                ?>
                        </select>

                    </div>
                    <div class="col">
                        <label>
                            <h6>Estado.</h6>
                        </label>
                        <select class="form-select" id="estado" name="estado">
                        </select>
                    </div>
                    <div class="col">
                        <label>
                            <h6>Cidade.</h6>
                            <select name="cidade" id="cidade" class="form-select">

                            </select>
                        </label>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <br>

        <button type="submit" value="Inserir cultura" class="btn btn-dark">Inserir cultura</button>
        <br><br>
    </form>
</div>
</div>
</div>