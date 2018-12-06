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
 * App\Alert
 *
 * @property int $id
 * @property string $status
 * @property string $event
 * @property float $value
 * @property string $text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alert whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alert whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alert whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alert whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alert whereValue($value)
 */
	class Alert extends \Eloquent {}
}

namespace App{
/**
 * App\Climate
 *
 * @property int $id
 * @property float $temperature
 * @property float $humidity
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Climate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Climate whereHumidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Climate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Climate whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Climate whereUpdatedAt($value)
 */
	class Climate extends \Eloquent {}
}

namespace App{
/**
 * App\Co2
 *
 * @property int $id
 * @property mixed $start
 * @property mixed $stop
 * @property int $gpio
 * @property int $power
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Co2 whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Co2 whereGpio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Co2 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Co2 wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Co2 whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Co2 whereStop($value)
 */
	class Co2 extends \Eloquent {}
}

namespace App{
/**
 * App\Gpio
 *
 * @property int $id
 * @property int $pin
 * @property int|null $gpio
 * @property string|null $type
 * @property string|null $function
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gpio whereFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gpio whereGpio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gpio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gpio wherePin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gpio whereType($value)
 */
	class Gpio extends \Eloquent {}
}

namespace App{
/**
 * App\Level
 *
 * @property int $id
 * @property float $level
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereUpdatedAt($value)
 */
	class Level extends \Eloquent {}
}

namespace App{
/**
 * App\Lighting
 *
 * @property int $id
 * @property string $sunrise_start
 * @property string $sunrise_stop
 * @property string $sunset_start
 * @property string $sunset_stop
 * @property int $gpio
 * @property float $power
 * @property float $max
 * @property float $offset
 * @property int $active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereGpio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereOffset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereSunriseStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereSunriseStop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereSunsetStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereSunsetStop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lighting whereUpdatedAt($value)
 */
	class Lighting extends \Eloquent {}
}

namespace App{
/**
 * App\Message
 *
 * @property int $id
 * @property int|null $from_id
 * @property string|null $firist_name
 * @property int|null $chat_id
 * @property string|null $text
 * @property string|null $action
 * @property int|null $date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereFiristName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

namespace App{
/**
 * App\Parameter
 *
 * @property int $id
 * @property string $date
 * @property float|null $temperature
 * @property float|null $ph
 * @property float|null $nh4
 * @property float|null $no2
 * @property float|null $no3
 * @property float|null $po4
 * @property float|null $cl
 * @property float|null $kh
 * @property float|null $gh
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereCl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereGh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereKh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereNh4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereNo2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereNo3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter wherePh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter wherePo4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereUpdatedAt($value)
 */
	class Parameter extends \Eloquent {}
}

namespace App{
/**
 * App\Periferico
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $function
 * @property string $code
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Periferico whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Periferico whereFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Periferico whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Periferico whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Periferico whereType($value)
 */
	class Periferico extends \Eloquent {}
}

namespace App{
/**
 * App\Pi
 *
 * @property int $id
 * @property float $temperature
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read string $date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pi whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pi whereUpdatedAt($value)
 */
	class Pi extends \Eloquent {}
}

namespace App{
/**
 * App\Temperature
 *
 * @property int $id
 * @property float $temperature
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Temperature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Temperature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Temperature whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Temperature whereUpdatedAt($value)
 */
	class Temperature extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

