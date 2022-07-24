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
    <form method="post" id="add_create" name="add_create" action="<?= base_url('/update_cultura') ?>">
        <div class="card">
            <div class="card-header text-center">
                <h5>Editar uma cultura.</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Espécie.</h6>
                        </label>
                        <select name="id_especie" id="id_especie" class="form-select">
                            <option value="<?php echo $cultura[0]['id_especie']?>">
                                <?php echo $cultura[0]['nome_especie']?>
                            </option>
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
                        <select name="id_meio" id="id_meio" class="form-select">
                            <option value="<?php echo $cultura[0]['id_meio_cultivo']?>">
                                <?php echo $cultura[0]['meio_cultivo']?>
                            </option>
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
                        <input value="<?php echo $cultura[0]['n_dpua_cultura']?>" name="n_dpua" id="n_dpua" type="text"
                            class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Código da cultura.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['codigo_col_ext_cultura']?>" name="codigo_col_ext"
                            type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Autor.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['autor_cultura']?>" name="autor" type="text"
                            class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Método de Preservação.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['metodo_preservacao_cultura']?>" name="metodo_preser"
                            type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Cultura Descartada.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['cultura_descartada_cultura']?>" name="cult_descar"
                            type="text" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>N° Cultura Preservada em óleo.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['n_cul_preser_oleo_cultura']?>" name="n_cult_preser_oleo"
                            type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>N° Cultura Preservada em água.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['n_cul_preser_agua_cultura']?>" name="n_cult_preser_agua"
                            type="text" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Data da preservação em óleo.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['data_preser_oleo_cultura']?>" name="data_preser_oleo"
                            type="date" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Data da Preservação em água.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['data_preser_agua_cultura']?>" name="data_preser_agua"
                            type="date" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Depositante.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['depositante_cultura']?>" name="depositante" type="text"
                            class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Histórico do depósito.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['historico_deposito_cultura']?>" name="historico"
                            type="text" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Forma de Envio.</h6>
                        </label>
                        <input value="<?php echo $cultura[0]['forma_envio_cultura']?>" name="forma_envio" type="text"
                            class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>Restrição.</h6>
                        </label>
                        <select name="restricao" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $cultura[0]['restricao_cultura']?>">
                                <?php if($cultura[0]['status_cultura'] = 1){echo "Sim";}else{echo "Não";} ?></option>
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
                        <input value="<?php echo $cultura[0]['status_cultura']?>" name="status" type="text"
                            class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label>
                            <h6>Observações.</h6>
                        </label>
                        <textarea value="<?php echo $cultura[0]['observacao_cultura']?>" name="observacao"
                            class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <label>
                            <h6>País</h6>
                        </label>
                        <select class="form-select" id="pais" name="pais">
                            <option value="<?php echo $cultura[0]['id_pais']?>"><?php echo $cultura[0]['nome_pt_pais']?>
                            </option>
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
                            <option value="<?php echo $cultura[0]['id_estados']?>">
                                <?php echo $cultura[0]['nome_estados']?></option>
                        </select>
                    </div>
                    <div class="col">
                        <label>
                            <h6>Cidade.</h6>
                            <select name="cidade" id="cidade" class="form-select">
                                <option value="<?php echo $cultura[0]['id_cidades']?>">
                                    <?php echo $cultura[0]['nome_cidades']?></option>
                            </select>
                        </label>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container justify-content-center text-center">
            <input type="hidden" name="id_cultura" id="id_cultura" value="<?php echo $cultura[0]['id_cultura']?>">
            <button type="submit" value="Inserir cultura" class="btn btn-dark">Editar cultura</button>
            <br><br>
        </div>

    </form>
</div>
</div>
</div>