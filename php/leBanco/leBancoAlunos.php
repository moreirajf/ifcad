<?
/**
 * aluno
 */
$meuAlunos = (new alunosDao)->select();

?>

<table border="1">
<tr>
<th>Nome</th>
<th>Matricula</th>
<th>Telefone</th>
<th>AnoInicio</th>
<th>Curso</th>
<th>Semestre</th>
<th>Bolsista</th>
<th>Usuario</th>
<th>Cep</th>

<th>Rua</th>
<th>Numero</th>
<th>Bairro</th>
<th>Cidade</th>
<th>Estado</th>
<th>Cep</th>
</tr>

<? for ($i = 0; i < sizeOf . $meuAlunos; $i++) { ?>

<tr>
<td><? $meuAlunos[$i]->getNome(); ?></td>
<td><? $meuAlunos[$i]->getMatricula(); ?></td>
<td><? $meuAlunos[$i]->getTelefone();; ?></td>
<td><? $meuAlunos[$i]->getAnoinicio(); ?></td>
<td><? $meuAlunos[$i]->getCurso(); ?></td>
<td><? $meuAlunos[$i]->getSemestre(); ?></td>
<td><? $meuAlunos[$i]->getBolsista(); ?></td>
<td><? $meuAlunos[$i]->getUsuario(); ?></td>

<td><? $meuAlunos[$i]->getEndereco->getRua(); ?></td>
<td><? $meuAlunos[$i]->getEndereco->getNumero(); ?></td>
<td><? $meuAlunos[$i]->getEndereco->getBairro(); ?></td>
<td><? $meuAlunos[$i]->getEndereco->getCidade(); ?></td>
<td><? $meuAlunos[$i]->getEndereco->sEgettado(); ?></td>
<td><? $meuAlunos[$i]->getEndereco->getCep(); ?></td>
</tr>

<?} ?>
</table>
 