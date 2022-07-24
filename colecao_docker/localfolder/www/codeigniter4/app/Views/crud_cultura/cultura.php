<script>
$(document).ready(function() {
    $('#cultura').DataTable();
});
</script>
<div class="col-md-12 ms-sm-auto col-lg-10 px-md-6 mt-3">
    <?php echo anchor(base_url('cultura/create/'),'Nova Cultura',['class' => 'btn btn-primary mb-3'])?>
    <table class="table" id="cultura">
        <thead>
            <tr>
                <th>DPUA</th>
                <th>Espécie</th>
                <th>Meio Cultivo</th>
                <th>Cód. Col. Ext.</th>
                <th>Método de Preser.</th>
                <th>Depositante</th>
                <th>Restrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($culturas as $cultura):?>
            <tr>
                <td><?php echo $cultura['n_dpua_cultura']?></td>
                <td><?php echo $cultura['nome_especie']?></td>
                <td><?php echo $cultura['meio_cultivo']?></td>
                <td><?php echo $cultura['codigo_col_ext_cultura']?></td>
                <td><?php echo $cultura['metodo_preservacao_cultura']?></td>
                <td><?php echo $cultura['depositante_cultura']?></td>
                <td><?php 
                            if($cultura['restricao_cultura'] == 0){
                                echo "Não";
                            }else{
                                echo "Sim";
                            }
                            ?>
                </td>

                <td>
                    <?php echo anchor('cultura/visualizar/'. $cultura['id_cultura'],'Visualizar')?>
                    -
                    <?php echo anchor('cultura/edit/'. $cultura['id_cultura'],'Editar')?>
                    -
                    <?php echo anchor('cultura/delete/'. $cultura['id_cultura'],'Deletar',['onclick' => 'return confirma()'])?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
</div>
</div>