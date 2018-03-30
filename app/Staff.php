<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Staff extends Authenticatable
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($user) {
            //$user->items()->delete();
        });
    }

    protected $table = 'staffs';

    protected $fillable = [
        'email', 'password',
        'name', 'last_name', 'first_name', 'tel', 'description', 'prefecture', 'area',
        'birth_at', 'sex',
        'confirmation_token', 'confirmation_sent_at',
        'confimarted_at',
        'bank_name',
        'bank_branch_name',
        'bank_account_number',
        'bank_account_last_name',
        'bank_account_first_name',
    ];

    protected $hidden = [
        'password',
        'reset_password_token',
        'remember_token',
        'change_email_token',
    ];

    protected static $prefectures = [
        '北海道', '青森県', '岩手県', '宮城県',   '秋田県',
        '山形県', '福島県', '茨城県', '栃木県',   '群馬県',
        '埼玉県', '千葉県', '東京都', '神奈川県', '山梨県',
        '長野県', '新潟県', '富山県', '石川県',   '福井県',
        '岐阜県', '静岡県', '愛知県', '三重県',   '滋賀県',
        '京都府', '大阪府', '兵庫県', '奈良県',   '和歌山県',
        '鳥取県', '島根県', '岡山県', '広島県',   '山口県',
        '徳島県', '香川県', '愛媛県', '高知県',   '福岡県',
        '佐賀県', '長崎県', '熊本県', '大分県',   '宮崎県',
        '鹿児島県', '沖縄県',
    ];

    protected static $sexs = [
        '男',
        '女',
    ];

    public static function getPrefectures()
    {
        return static::$prefectures;
    }

    public static function getAreas()
    {
        return ['西部', '中部', '東部'];
    }

    public static function getSexs()
    {
        return static::$sexs;
    }

    public function isConfimarted()
    {
        return !empty($this->confimarted_at);
    }

    public function items(){
        return $this->hasMany('App\Item')
            ->orderBy('id', 'desc');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function getReviewAvg(){
        return ceil($this->hasMany('App\Review')->avg('rate') * 100);
    }

    public function getUserMessages(){
        return $this->hasMany('App\Message')
            ->select('user_id')->distinct()
            ->orderBy('id', 'asc')
            ;
    }

    public function getMessagesByUser($userId){
        $count = $this->hasMany('App\Message')
            ->where('user_id', $userId)->count();

        // 最後の100件を取得
        $limit = 100;
        $offset = $count - $limit + 1;
        if ($offset < 0) $offset = 0;

        return $this->hasMany('App\Message')
            ->where('user_id', $userId)
            ->orderBy('id', 'asc')
            ->offset($offset)
            ->limit($limit)
            ;
    }

    public function notifications()
    {
        return $this
            ->hasMany('App\Notification')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ;
    }

    public function unreadNotifications()
    {
        return $this
            ->hasMany('App\Notification')
            ->where('read', 0)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFullBankAccountName()
    {
        return $this->bank_account_last_name . ' ' . $this->bank_account_first_name;
    }

    public function saveImage($image)
    {
        if (!$this->id) {
            return false;
        }

        $this->image = $this->id . '.' . $image->guessExtension();

        if (!is_dir($this->imageDir())) {
            if (!mkdir($this->imageDir(), 0777, true)) {
                throw new Exception('Can not create directory: ' . $this->imageDir());
            }
        }

        $image->move($this->imageDir(), $this->image);

        \Image::make($this->imagePath())
            ->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            }
        );

        $this->save();

        return true;
    }

    public function imageUrl()
    {
        if (!$this->image) {
            if ($this->sex == '女') {
                return asset(config('my.staff.default_image_path')) . '/woman.jpeg';
            }

            return asset(config('my.staff.default_image_path')) . '/man.jpeg';
        }

        return asset(config('my.staff.image_path')) . '/' . $this->image;
    }

    public function imageDir()
    {
        return public_path(config('my.staff.image_path'));
    }

    public function imagePath()
    {
        return $this->imageDir() . '/' . $this->image;
    }
}
