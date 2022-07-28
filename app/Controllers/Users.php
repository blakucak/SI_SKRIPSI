<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\Model_Users';
    protected $format    = 'json';

    use ResponseTrait;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        // $data = $this->model->findAll();
        $data = $this->db->query("SELECT * FROM users")->getResultArray();
        return $this->respond($data);
    }
    public function create()
    {
        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'register');
        $errors = $this->validation->getErrors();

        if ($errors) {
            return $this->fail($errors);
        }

        $user = new \App\Entities\Users();
        $user->fill($data);
        $user->created_by = 0;
        $user->created_date = date("Y-m-d H:i:s");

        if ($this->model->save($user)) {
            return $this->respondCreated($user, 'user created');
        }
    }
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['id'] = $id;
        $validate = $this->validation->run($data, 'update_user');
        $errors = $this->validation->getErrors();

        if ($errors) {
            return $this->fail($errors);
        }

        if (!$this->model->findById($id)) {
            return $this->fail('id tidak ditemukan');
        }

        $user = new \App\Entities\Users();
        $user->fill($data);
        $user->updated_by = 0;
        $user->updated_date = date("Y-m-d H:i:s");

        if ($this->model->save($user)) {
            return $this->respondUpdated($user, 'user updated');
        }
    }
    public function delete($id = null)
    {
        if (!$this->model->findById($id)) {
            return $this->fail('id tidak ditemukan');
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id . ' user deleted']);
        }
    }
    public function show($id = null)
    {
        $data = $this->model->find($id);

        if ($data) {
            return $this->respond($data);
        }

        return $this->fail('id tidak ditemukan');
    }
}
