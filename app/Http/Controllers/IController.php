<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

interface IController {
    public function getAll(Request $request);
    public function getById($id);
}
