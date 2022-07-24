<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col">
                <h4>Exportar dados da planilha</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="<?php echo base_url('/export'); ?>" class="btn btn-dark">Export</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h4>Importar dados para a planilha</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="<?php echo base_url('/import');?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="upload_file" class="form-label" id="upload_file">
                    <input type="submit" name="submit" class="btn btn-dark">
                </form>
            </div>
        </div>

    </div>
</main>