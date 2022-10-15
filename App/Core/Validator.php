<?php

/*
 * Class for validation entities
 */

class Validator
{
    private $data;
    private $errors = [];
    private static $fields = ['title', 'date', 'country', 'lat', 'lon'];

    public function __construct($postData)
    {
        $this->data = $postData;
    }

    public function validateForm()
    {
        $this->validateTitle();
        $this->validateDate();
        $this->validateCountry();

        // if address is provided
        if (!empty($this->data['lat']) && !empty($this->data['lon'])) {
            $this->validateAddress();
        }

        return $this->errors;
    }

    private function validateTitle()
    {
        $title = trim($this->data['title']);

        if (!empty($title)) {
            if ((strlen($title) < 2) || (strlen($title) > 255)) {
                $this->addError('title', 'Title must be (2-255) characters');
            }
        } else {
            $this->addError('title', 'Title field must be provided');
        }
    }

    private function validateDate()
    {
        $date = strtotime(trim($this->data['date']));

        if (!empty($date)) {
            $mysqlDate = date('Y-m-d H:i:s', $date);
            $today = date('Y-m-d H:i:s');

            // if enter date <= today's date
            if ((strtotime($mysqlDate) - strtotime($today)) / (24 * 60 * 60) < 1) {
                $this->addError('date', 'Inappropriate date has been chosen');
            }
        } else {
            $this->addError('date', 'Date field must be provided');
        }
    }

    private function validateAddress()
    {
        $lat = $this->data['lat'];
        $lon = $this->data['lon'];

        //Latitude
        if (!preg_match('/^-?(90|[1-8][0-9][.][0-9]{1,20}|[0-9][.][0-9]{1,20})$/', $lat)) {
            $this->addError('lat', 'Latitude value is invalid');
        }

        //Longitude
        if (!preg_match('/^-?(180|1[1-7][0-9][.][0-9]{1,20}|[1-9][0-9][.][0-9]{1,20}|[0-9][.][0-9]{1,20})$/', $lon)) {
            $this->addError('lon', 'Longitude value is invalid');
        }
    }

    private function validateCountry()
    {
        $country = trim($this->data['country']);

        if (empty($country)) {
            $this->addError('country', 'Country field must be provided');
        }
    }

    private function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }
}