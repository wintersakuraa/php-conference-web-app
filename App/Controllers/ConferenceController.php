<?php

/*
 * Controller class for operating conferences
 */

class ConferenceController extends Controller
{
    private ConferenceService $conferenceService;

    public function __construct()
    {
        $this->conferenceService = new ConferenceService();
    }

    public function getAll()
    {
        $data = $this->conferenceService->getAll();
        $this->view('/Conference/getAll', $data);
    }

    public function getById()
    {
        // check if id is set
        if (isset($_REQUEST['id'])) {
            $id = (int)$_REQUEST['id'];
            $data = [$this->conferenceService->getById($id)];
            $this->view('/Conference/getById', $data);
        } else {
            die('<h1>Error: Wrong set of parameters</h1>');
        }
    }

    public function create()
    {
        // if submit button pressed
        if (isset($_POST['save'])) {
            // validate entries
            $conferenceValidator = new Validator($_POST);
            $errors = $conferenceValidator->validateForm();

            // save data to DB if valid
            if (empty($errors)) {
                $conference = $this->model('Conference');
                $conference->title = $_POST['title'];
                $conference->date = new DateTime($_POST['date']);
                $conference->lon = (float)$_POST['lon'];
                $conference->lat = (float)$_POST['lat'];
                $conference->country = $_POST['country'];

                $this->conferenceService->create($conference);
                header('Location: ' . BASE_ROUTE . '/index.php?controller=conference&action=getAll');
            } else {
                $data = $errors;
                $this->view('/Conference/create', $data);
            }
        } else {
            $this->view('/Conference/create');
        }
    }

    public function delete()
    {
        // check if id is set
        if (isset($_REQUEST['id'])) {
            $id = (int)$_REQUEST['id'];
            $this->conferenceService->delete($id);

            header('Location: ' . BASE_ROUTE . '/index.php?controller=conference&action=getAll');
        } else {
            die('<h1>Error: Wrong set of parameters</h1>');
        }
    }

    public function edit()
    {
        // check if id is set
        if (isset($_REQUEST['id'])) {
            $id = (int)$_REQUEST['id'];
            $conference = $this->conferenceService->getById($id);
            $data['conference'] = $conference;

            // if edit button pressed
            if (isset($_POST['edit'])) {
                // validate entries
                $conferenceValidator = new Validator($_POST);
                $errors = $conferenceValidator->validateForm();

                // save data to DB if valid
                if (empty($errors)) {
                    $conference->title = $_POST['title'];
                    $conference->date = new DateTime($_POST['date']);
                    $conference->lon = (float)$_POST['lon'];
                    $conference->lat = (float)$_POST['lat'];
                    $conference->country = $_POST['country'];

                    $this->conferenceService->edit($conference);
                    header('Location: ' . BASE_ROUTE . '/index.php?controller=conference&action=getById&' . $_REQUEST['id']);
                } else {
                    $data['errors'] = $errors;
                    $this->view('/Conference/edit', $data);
                }
            } else {
                $this->view('/Conference/edit', $data);
            }
        } else {
            die('<h1>Error: Wrong set of parameters</h1>');
        }
    }
}