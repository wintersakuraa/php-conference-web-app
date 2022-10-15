<?php

/*
 * Conference Model
 */

class Conference
{
    public int $id;

    public string $title;

    public DateTime $date;

    public ?float $lon;

    public ?float $lat;

    public string $country;
}