<?php

/*
 * Service layer (business logic) of application.
 * Use the repository layer to implement certain logic involving the database.
 */

class ConferenceService implements BaseServiceInterface
{
    private ConferenceRepository $conferenceRepository;

    public function __construct()
    {
        $this->conferenceRepository = new ConferenceRepository();
    }

    public function getAll()
    {
        try {
            return $this->conferenceRepository->getAll();
        } catch (PDOException $e) {
            die('<h1>' . $e->getMessage() . '</h1>');
        }
    }

    public function getById($id)
    {
        try {
            return $this->conferenceRepository->getById($id);
        } catch (PDOException $e) {
            die('<h1>' . $e->getMessage() . '</h1>');
        }
    }

    public function create($conference)
    {
        try {
            if ($conference->lon == 0 || $conference->lat == 0) {
                $conference->lon = null;
                $conference->lat = null;
            }

            $this->conferenceRepository->create($conference);
        } catch (PDOException $e) {
            die('<h1>' . $e->getMessage() . '</h1>');
        }
    }

    public function delete($id)
    {
        try {
            $this->conferenceRepository->delete($id);
        } catch (PDOException $e) {
            die('<h1>' . $e->getMessage() . '</h1>');
        }
    }

    public function edit($conference)
    {
        try {
            if ($conference->lon == 0 || $conference->lat == 0) {
                $conference->lon = null;
                $conference->lat = null;
            }

            $this->conferenceRepository->update($conference);
        } catch (PDOException $e) {
            die('<h1>' . $e->getMessage() . '</h1>');
        }
    }
}