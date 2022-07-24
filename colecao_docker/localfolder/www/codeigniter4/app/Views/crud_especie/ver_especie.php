<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4d">
    <div class="container text-center mt-3">
        <h3>Dados sobre a cultura <?php echo $especie['nome_especie']?></h3>
    </div>
    <div class="container mt-3">
        <form method="post" id="add_create" name="add_create" ?>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome_especie">Nome da espécie</label>
                        <input type="text" value="<?php echo $especie['nome_especie']?>" name="meio_cultivo"
                            id="meio_cultivo" disabled class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="status_tax">Status Taxonômico</label>
                        <input type="text" value="<?php echo $especie['status_tax_especie']?>" name="meio_cultivo"
                            id="meio_cultivo" disabled class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tipos_org">Tipos de Organismo</label>
                        <input type="text" value="<?php echo $especie['tipos_org_especie']?>" name="meio_cultivo"
                            id="meio_cultivo" disabled class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="tipos_org">Aplicações</label>
                        <input type="text" value="<?php echo $especie['aplicacoes_especie']?>" name="meio_cultivo"
                            id="meio_cultivo" disabled class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="procedencia">Procedência</label>
                        <input type="text" value="<?php echo $especie['procedencia_especie']?>" name="meio_cultivo"
                            id="meio_cultivo" disabled class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="substrato">Substrato</label>
                        <input type="text" value="<?php echo $especie['substrato_especie']?>" name="meio_cultivo"
                            id="meio_cultivo" disabled class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="riscos">Riscos</label>
                        <input type="text" value="<?php echo $especie['riscos_especie']?>" name="meio_cultivo"
                            id="meio_cultivo" disabled class="form-control">
                    </div>
                </div>
                <div class="col">

                </div>
            </div>







        </form>
    </div>
</div>
</div>
</div>