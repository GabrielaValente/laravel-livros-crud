    <?php include 'head.php'; ?> <!-- Importando CSS e bootstrap da head.php  -->

    <h1>Formulário de Edição :: Livros </h1>

    <?php
    $property = $property[0];
    ?>

    <form action="<?= url("/livros/update", ['id' => $property->id]); ?>" method="post">

        <?php echo csrf_field();
        echo method_field('PUT'); ?>
        <!--Setando que o método do formulário de edição será "put" e não "post"-->

        <label for="title">Título do Livro</label>
        <input type="text" name="title" id="title" value=" <?= $property->title; ?>"> <!-- Essa tag em php está trazendo a informação a ser editada em cada o campo, ao invés de vazio -->
        <br />


        <label for="description">Descrição do Livro</label>
        <textarea name="description" id="description" cols="30" rows="10"><?= $property->category; ?></textarea>
        <br />


        <label for="category">Categoria do livro</label>
        <input type="text" name="category" id="category" value=" <?= $property->category; ?>">
        <br />


        <label for="price">Preço</label>
        <input type="text" name="price" id="price" value=" <?= $property->price; ?>">
        <br />


        <button type="submit" class="btn btn-md btn-success">Atualizar livro</button>
    </form>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
