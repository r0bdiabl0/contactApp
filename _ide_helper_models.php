<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Contact
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $email_address
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $phone_number_1
 * @property string $phone_number_1_type
 * @property string $phone_number_2
 * @property string $phone_number_2_type
 * @property string $phone_number_3
 * @property string $phone_number_3_type
 * @property int $contact_type
 * @property string $contact_type_additional_info
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereContactType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereContactTypeAdditionalInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereEmailAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact wherePhoneNumber1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact wherePhoneNumber1Type($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact wherePhoneNumber2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact wherePhoneNumber2Type($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact wherePhoneNumber3($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact wherePhoneNumber3Type($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact wherePostalCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereUserId($value)
 */
	class Contact extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

