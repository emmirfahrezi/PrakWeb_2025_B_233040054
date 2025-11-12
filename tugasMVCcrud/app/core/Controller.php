<?php

class Controller
{
    // controller view methodnya
    public function view($view, $data = [])
    {
        // buat variabel lokal dari array data, mis: $data['nama'] -> $nama
        if (!empty($data) && is_array($data)) {
            extract($data);
        }
        require_once '../app/views/' . $view . '.php';
    }


    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
