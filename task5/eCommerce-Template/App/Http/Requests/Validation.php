<?php

namespace App\Http\Requests;

use App\Database\Models\Model;

// use App\Http\Requests\GetError;

class Validation
{
    private array $errors = [];
    private string $key;
    private string $value;


    /**
     * Get the value of key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of key
     *
     * @return  self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function getError(string $error)
    {
        if (isset($this->errors[$error])) {
            foreach ($this->errors[$error] as $error) {
                return $error;
            }
        }
        return false;
    }
    public function required(): self
    {
        if (empty($this->value)) {
            $this->errors[$this->key][__FUNCTION__] = GetError::message("{$this->key} is required");
        }

        return $this;
    }

    public function string(): self
    {
        if (!is_string($this->value)) {
            $this->errors[$this->key][__FUNCTION__] = GetError::message("{$this->key} must be string");
        }
        return $this;
    }

    public function min($min): self
    {

        if (strlen($this->value) < $min) {
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} length must be more than {$min} ";
        }
        return $this;
    }

    public function max($max): self
    {

        if (strlen($this->value) > $max) {
            $this->errors[$this->key][__FUNCTION__] = "{$this->key} length must be less than {$max} ";
        }
        return $this;
    } 

    public function unique(string $table, string $column)
    {
        $model = new Model;
        $stmt = $model->con->prepare('SELECT * FROM `{$table}` WHERE `{$column}` = ?');
        $stmt->bind_param('s', $this->value);
        $stmt->execute();

        if ($stmt->get_result()->num_rows == 1) {
            $this->errors[$this->key][__FUNCTION__] = GetError::message("{$column} is already exists");
        }
        return $this;
    }

    public function regex(string $pattern, string $message = NULL): self
    {
        if (!$message) {
            $message = "{$this->key} invalid";
        }
        if (!preg_match($pattern, $this->value)) {
            $this->errors[$this->key][__FUNCTION__] = GetError::message($message);
        }

        return $this;
    }
    
}
