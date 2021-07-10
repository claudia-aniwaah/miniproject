<?php


class Controller
{

    public function model(string $model): Model
    {
        require_once("../app/Models/" . $model . ".php");
        return new $model;
    }


    public function view(string $view, array $data = []): void
    {
        if (file_exists("../app/Views/" . $view . ".php")) {
            require_once("../app/Views/" . $view . ".php");
        } else {
            die("404: PAGE DOES NOT EXIST");
        }
    }


}