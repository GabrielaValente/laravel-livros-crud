<?php include 'head.php'; ?> <!-- Importando CSS e bootstrap da head.php  -->

<h1>Formulário de Cadastro :: Livros </h1>

<form action="<?= url("/livros/store"); ?>"method="post">

    <?= csrf_field(); ?>

    <label for="title">Título do Livro</label>
    <input type="text" name="title" id="title">
    <br/>


    <label for="description">Descrição do Livro</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <br/>


    <label for="category">Categoria do livro</label>
    <input type="text" name="category" id="category">
    <br/>


    <label for="price">Preço</label>
    <input type="text" name="price" id="price">
    <br/>


    <button type="submit">Cadastrar livro</button>
 </form>
