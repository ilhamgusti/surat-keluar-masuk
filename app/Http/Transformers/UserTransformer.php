<?php

namespace App\Http\Transformers;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserTransformer
{

    public static function toInstance(array $input, $data = null)
    {
        if (empty($data)) {
            $data = new User();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case "name":
                    $data->name = $value;
                    break;
                case "email":
                    $data->email = $value;
                    break;
                case "role":
                    $data->role = $value;
                    break;
                case "password":
                    $passwordValue = Hash::make($value);
                    $data->password = $passwordValue;
                    break;
            }
        }

        return $data;
    }
}
