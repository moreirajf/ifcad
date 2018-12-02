<? $meuDisciplina = (new disciplinaDAO)->select(); ?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Descricao</th>
        <th>Carga Horaria</th>
        <th>Curso</th>
        <th>Horario</th>
        <th>Professor</th>
    </tr>
</thead>
<tbody>
        <? for ($i = 0; i < sizeOf.$meuDisciplina; $i++) { ?>
        <tr class="odd gradeX">
            <td><? $meuDisciplina[$i]->getId(); ?></td>
            <td><? $meuDisciplina[$i]->getNome(); ?></td>
            <td><? $meuDisciplina[$i]->getDescricao(); ?></td>
            <td><? $meuDisciplina[$i]->getCargahoraria(); ?></td>      
            <td><? $meuDisciplina[$i]->getCurso(); ?></td>     
            <td><? $meuDisciplina[$i]->getHorario(); ?></td>    
            <td><? $meuDisciplina[$i]->getProfessor(); ?></td>    
        </tr>
        <?} ?>                                   
</tbody>
</table>