<?php

/*
 * Repository layer implemented to access the database and to extend the CRUD operations with conferences.
 */

class ConferenceRepository extends DbContext implements BaseRepositoryInterface
{
    private ?PDO $pdo;

    public function __construct()
    {
        $this->pdo = $this->connectDb();
    }

    public function getAll()
    {
        $query = $this->pdo->query('SELECT * FROM conference');
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM conference WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function create($conference)
    {
        $sql = "INSERT INTO conference (title, date, lon, lat, country) VALUES (:title, :date, :lon, :lat, :country)";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'title' => $conference->title,
            'date' => $conference->date->format('Y-m-d H:i:s'),
            'lon' => $conference->lon,
            'lat' => $conference->lat,
            'country' => $conference->country
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM conference WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(['id' => $id]);
    }

    public function update($conference)
    {
        $sql = "UPDATE conference SET title = :title, date = :date, lon = :lon, lat = :lat, country = :country
                  WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'title' => $conference->title,
            'date' => $conference->date->format('Y-m-d H:i:s'),
            'lon' => $conference->lon,
            'lat' => $conference->lat,
            'country' => $conference->country,
            'id' => $conference->id
        ]);
    }
}