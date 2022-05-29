<?php

namespace App\Database\Models;

use App\Database\Models\Model;
use App\Database\Contracts\ConnectTo;

class User extends Model implements ConnectTo
{

    private const table = 'users';
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $password;
    private string $email;
    private string $phone;
    private int $code;
    private string $gender;
    private string $image = 'default.png';
    private int $status;
    private string $email_verfied_at;
    private string $phone_verfied_at;
    private string $created_at;
    private string $updated_at;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of email_verfied_at
     */
    public function getEmail_verfied_at()
    {
        return $this->email_verfied_at;
    }

    /**
     * Set the value of email_verfied_at
     *
     * @return  self
     */
    public function setEmail_verfied_at($email_verfied_at)
    {
        $this->email_verfied_at = $email_verfied_at;

        return $this;
    }

    /**
     * Get the value of phone_verfied_at
     */
    public function getPhone_verfied_at()
    {
        return $this->phone_verfied_at;
    }

    /**
     * Set the value of phone_verfied_at
     *
     * @return  self
     */
    public function setPhone_verfied_at($phone_verfied_at)
    {
        $this->phone_verfied_at = $phone_verfied_at;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    public function insert()
    {
        $query = "INSERT INTO " . self::table . "( first_name,last_name,email,password,phone,gender,code) VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("ssssssi", $this->firstname, $this->lastname, $this->email, $this->password, $this->phone, $this->gender, $this->code);
        $stmt->execute();
        return $stmt;
    }


    public function checkCode()
    {
        $query = "SELECT * FROM " . self::table . " WHERE `email`= ?  AND `code`= ? ";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('si', $this->email, $this->code);
        $stmt->execute();
        return $stmt;
    }

    public function makeUserVerified()
    {
        $query = "UPDATE " . self::table . " SET `email_verfied_at` = ? WHERE `email`=?";
        $stmt = $this->con->prepare($query);
        print_r($query);

        $stmt->bind_param('ss', $this->email_verfied_at, $this->email);
        $stmt->execute();
        return $stmt;
    }


    public function getUserByEmail()
    {
        $query = "SELECT * FROM " . self::table . " WHERE `email` = ? ";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('s', $this->email);
        $stmt->execute();
        return $stmt;
    }

    public function updateCodeByEmail()
    {
        $query = "UPDATE " . self::table . " SET `code`=? WHERE `email`=?";
        $stmt = $this->con->prepare($query);
        print_r($query);
        $stmt->bind_param('is', $this->code, $this->email);
        $stmt->execute();
        return $stmt;
    }

    public function updatePasswordByEmail(){
        $query = "UPDATE ".self::table." SET password = ? WHERE email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('ss',$this->password,$this->email);
        $stmt->execute();
        return $stmt; 
    }

    public function update() {
     
        $query = "UPDATE ".self::table." SET first_name = ?,last_name = ?, phone = ? , WHERE email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('ssss',$this->first_name,$this->last_name,$this->phone,$this->email);
        return $stmt->execute();
    }
}
