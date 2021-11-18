<h1>Formulário de Edição :: Livros </h1>

<?php
    $property = $property [0];
?>

<form action="<?= url("/livros/update", ['id' => $property->id]); ?>"method="post">

    <?php echo csrf_field();
    echo method_field('PUT');?>  <!--Setando que o método do formulário de edição será "put" e não "post"-->


    <label for="title">Título do Livro</label>
    <input type="text" name="title" id="title" value=" <?=$property->title;?>"> <!-- Essa tag em php está trazendo a informação a ser editada em cada o campo, ao invés de vazio -->

    <br/>


    <label for="description">Descrição do Livro</label>
    <textarea name="description" id="description" cols="30" rows="10"><?=$property->category;?></textarea>
    <br/>


    <label for="category">Categoria do livro</label>
    <input type="text" name="category" id="category" value=" <?=$property->category;?>">
    <br/>


    <label for="price">Preço</label>
    <input type="text" name="price" id="price" value=" <?=$property->price;?>">
    <br/>


    <button type="submit">Atualizar livro</button>
 </form>
