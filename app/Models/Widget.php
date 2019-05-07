<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 04 May 2019 15:19:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Widget
 * 
 * @property int $id
 * @property string $name
 * @property string $canvas_image
 * @property int $bg_width
 * @property int $bg_height
 * @property string $image_url
 * @property int $image_height
 * @property int $image_width
 * @property int $image_x
 * @property int $image_y
 * @property string $text
 * @property int $text_x
 * @property int $text_y
 * @property int $text_size
 * @property string $text_font
 * @property string $input_text
 * @property int $input_x
 * @property int $input_y
 * @property int $user_id
 * @property bool $active
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Widget extends Eloquent
{
	protected $table = 'widget';
	public $timestamps = false;

	protected $casts = [
		'bg_width' => 'int',
		'bg_height' => 'int',
		'image_height' => 'int',
		'image_width' => 'int',
		'image_x' => 'int',
		'image_y' => 'int',
		'text_x' => 'int',
		'text_y' => 'int',
		'text_size' => 'int',
		'input_x' => 'int',
		'input_y' => 'int',
		'user_id' => 'int',
		'active' => 'bool'
	];

	protected $fillable = [
		'name',
		'canvas_image',
		'bg_width',
		'bg_height',
		'image_url',
		'image_height',
		'image_width',
		'image_x',
		'image_y',
		'text',
		'text_x',
		'text_y',
		'text_size',
		'text_font',
		'input_text',
		'input_x',
		'input_y',
		'user_id',
		'active'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
