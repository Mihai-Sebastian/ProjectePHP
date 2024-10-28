<?php

namespace App\Controllers;

use App\Models\Games;

class GamesController
{
    //funcio index
    public function index()
    {
        //obtenim tots els jocs
        $games = Games::getAll();

        //pasem els jocs a la vista
        return view('games/index', ['games' => $games]);
    }

    //funcio per anar a la vista create
    public function create()
    {
        return view('games/create');
    }

    //funcio per guardar les dades i tornar a la vista principal
    public function store($data)
    {
        //cridem funcio create del model
        Games::create($data);
        //retornar a la vista principal
        header('location: /games');
        exit;
    }

   //funcio per a la vista edit
    public function edit($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /games');
            exit;
        }

        //busquem la peli
        $game = Games::find($id);
        $genres = Games::getGenres($id);
        $allGenres = Games::getAllGenres();

        //si no ens passen cap peli mostrar 404
        if (!$game) {
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        //retornem la vista i li passem la peli indicada
        return view('games/edit', ['game' => $game,'genres'=>$genres,'allGenres'=>$allGenres]);
    }

    //funcio update per a modificar la peli a la base de dades
    public function update($id, $data)
    {
        //modifiquem
        Games::update($id, $data);

        //retonem a la pàgina principal
        header('location: /games');
        exit;
    }

    //funcio per anar a la vista delete
    public function delete($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /games');
            exit;
        }

        //busquem la peli
        $game = Games::find($id);
        //retornem la vista en la peli
        return view('games/delete', ['game' => $game]);

    }

    //funcio per eliminar la peli de la base de dades
    public function destroy($id)
    {
        //utilizem la funcio delete del model
        Games::delete($id);

        //retornar a la vista
        header('location: /games');
    }
    public function show($id)
    {
        // si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /games');
            exit;
        }

        // busquem la peli
        $game = Games::find($id);
        $genres = Games::getGenres($id);


        // si no ens passen cap peli mostrar 404
        if (!$game) {
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        // retornem la vista i li passem la peli indicada
        return view('games/show', ['game' => $game, 'genres'=>$genres]);
    }
}