<?php include 'head.php'; ?>
<!-- Importando CSS e bootstrap da head.php  -->

<h1>Listagem de livros</h1>

<p><a href="<?= url('/livros/novo'); ?>">Cadastrar novo livro</a></p>


<div class="container">


<?php

if (!empty($properties)) {

    echo '<table class="table">';
    echo '<thead>
            <tr>
            <th scope="col">Título</td>
            <th scope="col">Categoria</td>
            <th scope="col">Valor</td>
            <th scope="col">Ações</td>
            </tr>
            </thead>';


    echo "<tbody>";
    foreach ($properties as $property) {

        $linkReadMore = url("/livros/" . $property->name); // Opção de "leia mais" ao lado do livro.
        $linkEditItem = url("/livros/editar/" . $property->name); // Opção de editar o item/informações do livro.
        $linkRemoveItem = url("/livros/remover/" . $property->name); // Opção de remover o item/informações do livro.



        echo "<tr>
                    <td> {$property->title}</td>
                    <td> {$property->category}</td>
                    <td> R$ " . number_format($property->price, 2, ",", ".") . "</td>
                    <td><a href='{$linkReadMore}'>Ver mais</a>  |  <a href='{$linkEditItem}'>Editar</a>  |  <a href='{$linkRemoveItem}'>Remover</a></td>
            </tr>";

    }
    echo "</tbody>";
    echo "</table";

}
?>
</div>


