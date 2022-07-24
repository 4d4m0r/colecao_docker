<script>
$(document).ready(function() {
    $('#meio').DataTable();
});
</script>
<div class="col-md-12 ms-sm-auto col-lg-10 px-md-6 mt-3">
    <?php echo anchor(base_url('meio/create/'),'Novo Meio',['class' => 'btn btn-primary mb-3'])?>
    <table class="table" id="meio">
        <thead>
            <tr>
                <th>Nome do Meio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($meios as $meio):?>
            <tr>
                <td><?php echo $meio['meio_cultivo']?></td>
                <td><?php echo anchor('meio/edit/'. $meio['id_meio_cultivo'],'Editar')?>
                    -
                    <?php echo anchor('meio/delete/'. $meio['id_meio_cultivo'],'Deletar',['onclick' => 'return confirma()'])?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
</div>
</div>