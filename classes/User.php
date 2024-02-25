<?php
class User
{
    public $id;
    public $name;
    public $age;
    public $birth_date;
    public $gender;
    public $email;
    public $mobile;
    public $address;
    public $qualification;
    public $employment_status;

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
?>
