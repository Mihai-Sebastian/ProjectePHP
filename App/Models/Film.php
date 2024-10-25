<?php

namespace App\Models;

use Core\App;

class Film
{
    protected static $table = 'films';

    //funcio per a que torne totes les pelis
    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    //funcio per a buscar una peli
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
        $statement = $db->prepare('SELECT genres.id, genres.name FROM genres JOIN film_genres ON genres.id = film_genres.genre_id WHERE film_genres.film_id = :id');
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
        //taula films
        $statement = $db->prepare('INSERT INTO ' . static::$table . "(name, director, year, description) VALUES (:name, :director, :year, :description)");
        $statement->bindValue(':name', $data['name']);
        $statement->bindValue(':director', $data['director']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':description', $data['description']);
        $statement->execute();
        // Obtenció de l'últim ID de la pel·lícula inserida
        $filmId = $db->lastInsertId();

        // Comprovem si hi ha gèneres seleccionats
        if (isset($data['genres']) && !empty($data['genres'])) {
            // Preparar la instrucció d'inserció per a la taula film_genres
            $genreStatement = $db->prepare('INSERT INTO film_genres (film_id, genre_id) VALUES (:film_id, :genre_id)');

            foreach ($data['genres'] as $genreId) {
                $genreStatement->bindValue(':film_id', $filmId);
                $genreStatement->bindValue(':genre_id', $genreId);
                $genreStatement->execute();
            }
        }
    }

    //funcio update
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE ". static::$table . " SET name = :name, director = :director, year = :year, description =:description WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->bindValue(':name', $data['name']);
        $statement->bindValue(':director', $data['director']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':description', $data['description']);
        $statement->execute();
        if (isset($data['genres']) && !empty($data['genres'])) {
            // Eliminar els gèneres de la pel·lícula
            $deleteStatement = $db->prepare('DELETE FROM film_genres WHERE film_id = :film_id');
            $deleteStatement->bindValue(':film_id', $id);
            $deleteStatement->execute();

            // Preparar la instrucció d'inserció per a la taula film_genres
            $genreStatement = $db->prepare('INSERT INTO film_genres (film_id, genre_id) VALUES (:film_id, :genre_id)');

            foreach ($data['genres'] as $genreId) {
                $genreStatement->bindValue(':film_id', $id);
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