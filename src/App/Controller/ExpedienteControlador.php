<?php

namespace App\Controller;

use App\Controller\InterfaceController;
use App\Model\ExpedienteModelo;

class ExpedienteControlador implements InterfaceController
{

    public function index($api)
    {
        // TODO: Implement index() method.
    }

    public function create($api)
    {
        // TODO: Implement create() method.
    }

    public function store($api)
    {
        // TODO: Implement store() method.
    }

    public function edit($id, $api)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, $api)
    {
        // TODO: Implement update() method.
    }

    public function show($id, $api)
    {
        // TODO: Implement show() method.
    }

    public function destroy($id, $api)
    {
        ExpedienteModelo::borrarExpediente($id);
    }
}