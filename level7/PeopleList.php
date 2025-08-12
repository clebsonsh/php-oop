<?php

require_once 'classes/Person.php';

class PeopleList
{
    private string $html;

    public function __construct()
    {
        $this->html = file_get_contents('html/list.html');
    }

    public function delete($params)
    {
        try {
            $id = (int) $params['id'];
            Person::delete($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function load()
    {

        try {
            $people = Person::all();

            $items = '';
            foreach ($people as $person) {
                $item = file_get_contents('html/item.html');
                $item = str_replace('{id}', $person['id'], $item);
                $item = str_replace('{name}', $person['name'], $item);
                $item = str_replace('{address}', $person['address'], $item);
                $item = str_replace('{neighborhood}', $person['neighborhood'], $item);
                $item = str_replace('{phone}', $person['phone'], $item);
                $item = str_replace('{email}', $person['email'], $item);
                $items .= $item;
            }

            $this->html = str_replace('{items}', $items, $this->html);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function show()
    {
        $this->load();
        echo $this->html;
    }
}
