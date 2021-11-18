<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome'); // Resources > views > Welcome.blade.php
});

Route::get('/livros','PropertyController@index'); // Passando uma rota e informando o que quero acessar por meio do controller. Está na views > property > index.php

Route::get('/livros/novo','PropertyController@create'); // Mostrar um formulário para cadastro de livros. Está na views > property > create.php
Route::post('/livros/store','PropertyController@store'); // Receber os dados que foram cadastrados e interagir com o banco de dados. Está na views > property > show.php

Route::get('/livros/{name}', 'PropertyController@show'); // Mostrar individualmente cada objeto/livro e as informações contidas em show.php.


Route::get('/livros/editar/{name}','PropertyController@edit'); // Traz o formulário de editar um registro de livro. Está na views > property > edit.php
Route::put('/livros/update/{name}','PropertyController@update'); // Executar o comando update para atualizar dentro do banco as informações que foram modificadas.
// O método é PUT porque se trata de uma edição.
