<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo]
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function filter($data)
    {
        $contact = Contact::query();

        if (isset($data['email']) && $data['email'] != '') {
            $contact->where('email', 'like', "%" . $data['email'] . "%");
        }

        if (isset($data['mobile']) && $data['mobile'] != '') {
            $contact->where('mobile', 'like', "%" . $data['mobile'] . "%");
        }

        if (isset($data['verified']) && $data['verified'] != '') {
            $contact->where('is_email_verified', $data['verified']);
        }

        return $contact;
    }
}
