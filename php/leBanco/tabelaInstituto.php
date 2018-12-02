<? $meuInstituto = (new institutoDao)->select(); ?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>Id</th>
        <th>Nome</th>

        <th>Rua</th>
        <th>Numero</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>CEP</th>
    </tr>
</thead>
<tbody>
        <? for ($i = 0; i < sizeOf.$meuInstituto; $i++) { ?>
        <tr class="odd gradeX">
            <td><? $meuInstituto[$i]->getId(); ?></td>
            <td><? $meuInstituto[$i]->getNome(); ?></td>

            <td><? $meuInstituto[$i]->getEndereco->getRua(); ?></td>
            <td><? $meuInstituto[$i]->getEndereco->getNumero(); ?></td>
            <td><? $meuInstituto[$i]->getEndereco->getBairro(); ?></td>
            <td><? $meuInstituto[$i]->getEndereco->getCidade(); ?></td>
            <td><? $meuInstituto[$i]->getEndereco->getEstado(); ?></td>
            <td><? $meuInstituto[$i]->getEndereco->getCep(); ?></td>
        </tr>
        <?} ?>                                   
</tbody>
</table>