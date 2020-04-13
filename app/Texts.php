<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Texts
 * @package App
 * @property string $text
 * @property boolean $share
 * @property boolean $contribute_to_science
 * @property integer $user_id
 * @property string $voice
 */
class Texts extends Model
{
    protected $table ='text';

}
