<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4d">
    <form method="post" id="add_create" name="add_create" action="<?= base_url('/update_especie')?>">
        <div class="card">
            <div class="card-header text-center">
                <h5>Editar uma espécie.</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="nome_especie">Nome da espécie</label>
                            <input type="text" value="<?php echo $especie['nome_especie']?>" name="nome_especie"
                                id="nome_especie" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="status_tax_especie">Status Taxonômico</label>
                            <input type="text" value="<?php echo $especie['status_tax_especie']?>"
                                name="status_tax_especie" id="status_tax_especie" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="tipos_org_especie">Tipos de Organismo</label>
                            <input type="text" value="<?php echo $especie['tipos_org_especie']?>"
                                name="tipos_org_especie" class="form-control" id="tipos_org_especie">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="aplicacoes_especie">Aplicações</label>
                            <input type="text" value="<?php echo $especie['aplicacoes_especie']?>"
                                name="aplicacoes_especie" class="form-control" id="aplicacoes_especie">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="procedencia_especie">Procedência</label>
                            <input type="text" value="<?php echo $especie['procedencia_especie']?>"
                                name="procedencia_especie" class="form-control" id="procedencia_especie">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="substrato_especie">Substrato</label>
                            <input type="text" value="<?php echo $especie['substrato_especie']?>"
                                name="substrato_especie" class="form-control" id="substrato_especie">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="riscos_especie">Riscos</label>
                            <input type="text" value="<?php echo $especie['riscos_especie']?>" name="riscos_especie"
                                class="form-control" id="riscos_especie">
                        </div>
                    </div>
                    <div class="col">

                    </div>
                </div>
            </div>
        </div>







        <input type="hidden" name="id_especie" id="id_especie" value="<?php echo $especie['id_especie']?>">
        <input type="submit" value="Salvar" class="btn btn-primary">
    </form>
</div>
</div>
</div>