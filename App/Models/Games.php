<?php

namespace App\Models;

use Core\App;

class Games
{
    protected static $table = 'games';

    //funcio per a que torne tots els jocs
    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    //funcio per a buscar un joc per id
    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->execute(array('id' => $id));
        return $statement->fetch(\PDO::FETCH_OBJ);

    }
    public static function getGenres($id)
    {
        $db=App::get('database')->getConnection();
        $statement = $db->prepare('SELECT genres.id, genres.name FROM genres JOIN game_genres ON genres.id = game_genres.genre_id WHERE game_genres.game_id = :id');
        $statement->execute(array('id' => $id));
        return $statement->fetchAll();

    }
    public static function getAllGenres()
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT id, name FROM genres');
        $statement->execute();
        return $statement->fetchAll();
    }

    //funcio create
    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        //taula games
        $statement = $db->prepare('INSERT INTO ' . static::$table . "(title, developer, release_date, rating, platform, multiplayer, price) VALUES (:title, :developer, :release_date, :rating, :platform, :multiplayer, :price)");

        $statement->bindValue(':title', $data['name']);
        $statement->bindValue(':developer', $data['developer']);
        $statement->bindValue(':release_date', $data['release_date']);
        $statement->bindValue(':rating', $data['rating']);
        $statement->bindValue(':platform', $data['platform']);
        $statement->bindValue(':multiplayer', $data['multiplayer']);
        $statement->bindValue(':price', $data['price']);
        $statement->execute();

        // Obtenció de l'últim ID del joc inserit
        $gameId = $db->lastInsertId();

        // Comprovem si hi ha gèneres seleccionats
        if (isset($data['genres']) && !empty($data['genres'])) {
            // Preparar la instrucció d'inserció per a la taula game_genres
            $genreStatement = $db->prepare('INSERT INTO game_genres (game_id, genre_id) VALUES (:game_id, :genre_id)');

            foreach ($data['genres'] as $genreId) {
                $genreStatement->bindValue(':game_id', $gameId);
                $genreStatement->bindValue(':genre_id', $genreId);
                $genreStatement->execute();
            }
        }

    }

    //funcio update
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE ". static::$table . " SET title = :title, developer = :developer, release_date = :release_date, rating = :rating, platform = :platform, multiplayer = :multiplayer, price = :price WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->bindValue(':title', $data['title']);
        $statement->bindValue(':developer', $data['developer']);
        $statement->bindValue(':release_date', $data['release_date']);
        $statement->bindValue(':rating', $data['rating']);
        $statement->bindValue(':platform', $data['platform']);
        $statement->bindValue(':multiplayer', $data['multiplayer']);
        $statement->bindValue(':price', $data['price']);
        $statement->execute();
        if (isset($data['genres']) && !empty($data['genres'])) {
            // Eliminar els gèneres del joc
            $deleteStatement = $db->prepare('DELETE FROM game_genres WHERE game_id = :game_id');
            $deleteStatement->bindValue(':game_id', $id);
            $deleteStatement->execute();

            // Preparar la instrucció d'inserció per a la taula game_genres
            $genreStatement = $db->prepare('INSERT INTO game_genres (game_id, genre_id) VALUES (:game_id, :genre_id)');

            foreach ($data['genres'] as $genreId) {
                $genreStatement->bindValue(':game_id', $id);
                $genreStatement->bindValue(':genre_id', $genreId);
                $genreStatement->execute();
            }
        }
    }

    //funcio delete
    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM '. static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

}