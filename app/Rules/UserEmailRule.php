<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class UserEmailRule implements Rule
{
    private $failMessage = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($organization_id)
    {
        $this->organization_id = $organization_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (request()->method() == "POST"){
            $result = $this->checkEmailRequired($value);
            if (!$result){
                 return $result;
             }

            $result = $this->checkIsEmail($value);
            if (!$result){
                return $result;
            }

           $result = $this->checkIsEmailForSuperAdmin($value);
            if (!$result){
                return $result;
            }

            $result = $this->checkIsEmailExistsInOrganization($value);
            if (!$result){
                return $result;
            }
        }
          return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       return $this->failMessage;
    }

    private function checkEmailRequired($value){
        if (!$value){
            $this->failMessage = "The email field is required.";
            return false;
        }
      return true;
    }// end method

    private function checkIsEmail($value){
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->failMessage = "This field must be email.";
            return false;
        }
        return true;
    }// end method


    private function checkIsEmailExistsInOrganization($value){
        $user = User::sqlFirst("SELECT users.email FROM users
                       INNER JOIN user_organizations ON user_organizations.user_id = users.id
                       WHERE users.email = ? AND user_organizations.organization_id = ?",[$value, $this->organization_id]);
        if ($user){
            $this->failMessage = 'The email already exists in this organizations';
            return false;
        }
        return true;
    }// end method


    private function checkIsEmailForSuperAdmin($value){
        $user = User::sqlFirst("SELECT users.email FROM users
                       INNER JOIN user_roles ON user_roles.user_id = users.id AND user_roles.user_id = 1
                       WHERE users.email = ?",[$value]);
        if ($user){
            $this->failMessage = "The email can't add to this organizations,Choose another email !!";
            return false;
        }
        return true;
    }// end method


}
