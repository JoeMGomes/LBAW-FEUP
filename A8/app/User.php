<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use DB;

class User extends Authenticatable
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'member';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo_url', 'banned', 'score'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The posts this user owns.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function activity($id) {
        $results = DB::select(DB::raw("select *
                                        from (select 1 as type, id, author, date, text_body as text, title, best_answer, 0 as parent, has_been_edited(id) as edited, owner, name, photo_url, membership_date, score, banned, 0 as votes
                                                    from total_question
                                                union
                                                    select 2 as type, a.id, author, date, answer as text_body, '' as title, 0 as best_answer, question as parent, has_been_edited(id) as edited,owner, name, photo_url, membership_date, score, banned, upvotes(id) - downvotes(id) as votes
                                                    from total_answer as a
                                                union
                                                    select 3 as type, c.id, c.author, c.date, c.comment as text_body, '' as title, 0 as best_answer, c.answer as parent, has_been_edited(c.id) as edited,c.owner, c.name, c.photo_url, c.membership_date, c.score, c.banned, 0 as votes
                                                    from total_comment as c, total_answer as a) as activity
                                        where owner = :id
                                        order by date;"), ['id' => $id]);
        return collect($results)->map(function($x) {return (array) $x; })->toArray();
    }
}
