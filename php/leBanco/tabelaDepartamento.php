<? $meuDepartamento = (new departamentoDao)->select(); ?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Instituto</th>
    </tr>
</thead>
<tbody>
        <? for ($i = 0; i < sizeOf.$meuDepartamento; $i++) { ?>
        <tr class="odd gradeX">
            <td><? $meuDepartamento[$i]->getId(); ?></td>
            <td><? $meuDepartamento[$i]->getNome(); ?></td>
            <td><? $meuDepartamento[$i]->getTelefone(); ?></td>
            <td><? $meuDepartamento[$i]->getInstituto(); ?></td>        
        </tr>
        <?} ?>                                   
</tbody>
</table>