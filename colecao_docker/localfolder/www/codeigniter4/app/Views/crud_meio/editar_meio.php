    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4d">
        <form method="post" id="add_create" name="add_create" action="<?= base_url('/update_meio') ?>">
        <div class="card">
            <div class="card-header text-center">
                <h5>Editar um Meio de Cultivo.</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label for="nome_meio">Nome do Meio</label>
                <input type="text" value="<?php echo $meio_cultivo['meio_cultivo']?>" name="meio_cultivo"
                    id="meio_cultivo" class="form-control">
            </div>
            <input type="hidden" name="id_meio_cultivo" id="id" value="<?php echo $meio_cultivo['id_meio_cultivo']?>">
            <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
        </div>
            
        </form>
    </div>
    </div>
    </div>