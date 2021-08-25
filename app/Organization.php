<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function filter($data)
    {
        $organization = Organization::query();

        if (isset($data['name']) && $data['name'] != '') {
            $organization->where('name', 'like', "%" . $data['name'] . "%");
        }

        return $organization;
    }

    /**
     *
     */
    public function deleteLogo()
    {
        $logo = asset("storage/$this->logo");

        if (file_exists($logo)) {
            unset($logo);
        }
    }
}
