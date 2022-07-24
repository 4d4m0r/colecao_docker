    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4d">
        <form method="post" id="add_create" name="add_create" action="<?= base_url('/especie/store/') ?>">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Adicionar uma cultura.</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="nome_especie">Nome da espécie</label>
                                <input type="text" name="nome_especie" class="form-control" id="nome_especie">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="status_tax">Status Taxonômico</label>
                                <input type="text" name="status_tax" class="form-control" id="status_tax">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="tipos_org">Tipos de Organismo</label>
                                <input type="text" name="tipos_org" class="form-control" id="tipos_org">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tipos_org">Aplicações</label>
                                <input type="text" name="aplicacoes" class="form-control" id="aplicacoes">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="procedencia">Procedência</label>
                                <input type="text" name="procedencia" class="form-control" id="procedencia">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="substrato">Substrato</label>
                                <input type="text" name="substrato" class="form-control" id="substrato">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="riscos">Riscos</label>
                                <input type="text" name="riscos" class="form-control" id="riscos">
                            </div>
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>
            </div>







            <input type="submit" value="Salvar" class="btn btn-primary">
        </form>
    </div>
    </div>
    </div>