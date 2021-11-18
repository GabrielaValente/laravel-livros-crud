<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = DB::select("SELECT * FROM properties");

        return view('property/index')->with("properties", $properties);
    }
//---------------------------------------------------------------------------------------------------------------------------//
    public function show($name) //Funçao para mostrar as informações do livro com mais detalhes show.php.
    {
        $property = DB::select(' SELECT * FROM properties where name = ?', [$name]);

        if (!empty($property)) { // Se for diferente do valor "vazio" quer dizer que tem registro, se houver registro mostre o registro(na view show)
            // se não houver registro retorne para a página inicial de livros.
            return view('property/show')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }
//---------------------------------------------------------------------------------------------------------------------------//
    public function create() //Função para CRIAR um novo registro de cadastro de livros.
    {
        return view('property/create');
    }

    public function store(Request $request)
    {
        $propertySlug = $this->setName($request->title);

        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->category,
            $request->price
        ];

        DB::insert("INSERT INTO properties (title, name, description, category, price)VALUES
                    (?, ?, ?, ?, ?)", $property);


        return redirect()->action("PropertyController@index");
    }

//---------------------------------------------------------------------------------------------------------------------------//

    public function edit ($name) // Função para EDITAR o livro/informações do livro, está em edit.php
    {
        $property = DB::select(' SELECT * FROM properties where name = ?', [$name]);

        if (!empty($property)) {
            return view('property/edit')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }

    //---------------------------------------------------------------------------------------------------------------------------//
    public function update (Request $request, $id) // Função para atualizar/UPDATE as informações editadas/modificadas no banco de dados.
    {

        $propertySlug = $this->setName($request->title);


        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->category,
            $request->price,
            $id
        ];

        DB::update("UPDATE properties SET title = ?, name = ?, description = ?, category = ?, price = ?
                    WHERE id = ?", $property);


        return redirect()->action('PropertyController@index');

    }
//---------------------------------------------------------------------------------------------------------------------------//
    private function setName($title) // URL AMIGÁVEL
    {
        $propertySlug = str_slug($title); // str_slug faz a conversão dos carateres especiais contidos no título, verificar maíuscula
        //e adiciona hífen, para ficar uma url amigável.

        $properties = DB::select("SELECT * FROM properties");


        $t = 0; // Variável que vai servir para incrementar o valor ++
        // O loop serve para verificar se o retorno é exatamente igual ao que já existe. Ex: título, título-1 na url amigável
        foreach ($properties as $property) {
            if (str_slug($property->title) === $propertySlug) {
                $t++;
            }
        }

        // Esse if vai verificar que se o valor passou pelo foreah anterior pelo menos 1 vez, caso sim vai continuar:
        if ($t > 0) {
            $propertySlug = $propertySlug . '-' . $t;
        }

        return $propertySlug;
    }
}



