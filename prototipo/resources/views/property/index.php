<h1>Listagem de livros</h1>

<p><a href="<?= url('/livros/novo'); ?>">Cadastrar novo livro</a></p>

<?php

if (!empty($properties)){

    echo "<table>";

    echo "<tr>
            <td>Título</td>
            <td>Categoria</td>
            <td>Valor</td>
            <td>Ações</td>
        </tr>";

    foreach ($properties as $property){

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
    echo "</table";
}
