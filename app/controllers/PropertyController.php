<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}
require_once __DIR__ . '/../models/Property.php';

class PropertyController {
    private $property_model;

    public function __construct() {
        $this->property_model = new Property($_SESSION['user_id']);
    }

    public function index() {
        $properties = $this->property_model->all();
        $page_title = 'Properties CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/properties/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $owner_data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'mailing_address' => $_POST['mailing_address'],
                'city' => $_POST['city'],
                'state_province' => $_POST['state_province'],
                'postal_code' => $_POST['postal_code'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number']
            ];
            $property_data = [
                'street_address' => $_POST['street_address'],
                'city' => $_POST['city_prop'],
                'state_province' => $_POST['state_province_prop'],
                'postal_code' => $_POST['postal_code_prop'],
                'property_type' => $_POST['property_type'],
                'parcel_number' => $_POST['parcel_number'],
                'legal_description' => $_POST['legal_description'],
                'square_footage' => $_POST['square_footage'],
                'year_built' => $_POST['year_built']
            ];
            $this->property_model->create($owner_data, $property_data);
            header('Location: /?controller=property&action=index');
            exit;
        }
        $page_title = 'Properties CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/properties/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function edit($id) {
        $property = $this->property_model->find($id);
        if (!$property) {
            header('Location: /?controller=property&action=index');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $owner_data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'mailing_address' => $_POST['mailing_address'],
                'city' => $_POST['city'],
                'state_province' => $_POST['state_province'],
                'postal_code' => $_POST['postal_code'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number']
            ];
            $property_data = [
                'street_address' => $_POST['street_address'],
                'city' => $_POST['city_prop'],
                'state_province' => $_POST['state_province_prop'],
                'postal_code' => $_POST['postal_code_prop'],
                'property_type' => $_POST['property_type'],
                'parcel_number' => $_POST['parcel_number'],
                'legal_description' => $_POST['legal_description'],
                'square_footage' => $_POST['square_footage'],
                'year_built' => $_POST['year_built']
            ];
            $this->property_model->update($id, $owner_data, $property_data);
            header('Location: /?controller=property&action=index');
            exit;
        }
        $page_title = 'Properties CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/properties/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function delete($id) {
        $this->property_model->delete($id);
        header('Location: /?controller=property&action=index');
        exit;
    }
}
