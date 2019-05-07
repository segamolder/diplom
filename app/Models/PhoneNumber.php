<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 06 May 2019 20:45:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PhoneNumber
 * 
 * @property int $id
 * @property string $phone
 * @property int $user_id
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class PhoneNumber extends Eloquent
{
	protected $table = 'phone_number';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'phone',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
