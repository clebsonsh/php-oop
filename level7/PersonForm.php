<?php

require_once 'classes/City.php';
require_once 'classes/Person.php';

class PersonForm
{
    private string $html;

    /** @var array<string, string> */
    private array $data;

    public function __construct()
    {
        $this->html = file_get_contents('html/form.html');

        $this->data = [
            'id' => null,
            'name' => null,
            'address' => null,
            'neighborhood' => null,
            'phone' => null,
            'email' => null,
            'city_id' => null,
        ];

        $cities = '';
        foreach (City::all() as $city) {
            $cities .= "<option value='{$city['id']}'>{$city['name']}</option>\n";
        }

        $this->html = str_replace('{cities}', $cities, $this->html);
    }

    public function edit($params)
    {
        try {
            $id = (int) $params['id'];
            $this->data = Person::find($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function save($params)
    {
        try {
            $personId = Person::save($params);
            $params['id'] = $personId;
            $this->data = $params;
            echo 'Record saved successfully';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function show()
    {
        $this->html = str_replace('{id}', $this->data['id'], $this->html);
        $this->html = str_replace('{name}', $this->data['name'], $this->html);
        $this->html = str_replace('{address}', $this->data['address'], $this->html);
        $this->html = str_replace('{neighborhood}', $this->data['neighborhood'], $this->html);
        $this->html = str_replace('{phone}', $this->data['phone'], $this->html);
        $this->html = str_replace('{email}', $this->data['email'], $this->html);
        $this->html = str_replace('{city_id}', $this->data['city_id'], $this->html);
        $this->html = str_replace("option value='{$this->data['city_id']}'",
            "option selected value='{$this->data['city_id']}'", $this->html);
        echo $this->html;
    }
}
