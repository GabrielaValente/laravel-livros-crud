<h1>Página Single</h1>

<?php

if(!empty($property)){

    foreach($property as $prop){
        ?>
            <h2>Título do livro: <?= $prop->title; ?></h2>

            <p>Descrição: <?= $prop->description; ?></p>

            <p>Categoria: <?= $prop->category; ?></p>

            <p>Valor: R$<?= number_format($prop->price, 2, ',', '.'); ?></p>
        <?php
    }
}
