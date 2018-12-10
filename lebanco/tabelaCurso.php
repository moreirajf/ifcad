<? $meuCurso = (new cursoDao)->select(); ?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>Id<th>
        <th>Nome</th>
        <th>Departamento</th>
        <th>Área</th>
        <th>Vagas</th>
    </tr>
</thead>
<tbody>
        <? for ($i = 0; i < sizeOf.$meuCurso; $i++) { ?>
        <tr class="odd gradeX">
            <td><? $meuCurso[$i]->getId(); ?></td>
            <td><? $meuCurso[$i]->getNome(); ?></td>
            <td><? $meuCurso[$i]->getDepartamento(); ?></td>
            <td><? $meuCurso[$i]->getArea(); ?></td>
            <td><? $meuCurso[$i]->getVagas(); ?></td>
        </tr>
        <?} ?>                                   
</tbody>
</table>