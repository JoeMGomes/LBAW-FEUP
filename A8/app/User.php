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
                                        from (select 1 as type, id, author, date, text_body as text, title, best_answer, 0 as parent, has_been_edited(id) as edited, reported,owner, 0 as votes
                                                    from total_question
                                                union
                                                    select 2 as type, a.id, author, date, answer as text, '' as title, 0 as best_answer, question as parent, has_been_edited(id) as edited,reported,owner, upvotes(id) - downvotes(id) as votes
                                                    from total_answer as a
                                                union
                                                    select 3 as type, c.id, c.author, c.date, c.comment as text, '' as title, 0 as best_answer, c.answer as parent, has_been_edited(c.id) as edited, c.reported,owner, 0 as votes
                                                    from total_comment as c) as activity
                                        where author = :id and reported = false
                                        order by date desc;"), ['id' => $id]);
        return collect($results)->map(function($x) {return (array) $x; })->toArray();
    }

    public function activityQuestions($id) {
        $results = DB::select(DB::raw("select *
                                        from (select 1 as type, id, author, date, text_body as text, title, best_answer, 0 as parent, has_been_edited(id) as edited,reported,owner, 0 as votes
                                                    from total_question) as activity
                                        where author = :id and reported = false
                                        order by date desc;"), ['id' => $id]);
        return collect($results)->map(function($x) {return (array) $x; })->toArray();
    }

    public function activityAnswers($id) {
        $results = DB::select(DB::raw("select *
                                        from (select 2 as type, a.id, author, date, answer as text, '' as title, 0 as best_answer, question as parent, has_been_edited(id) as edited,reported,owner, upvotes(id) - downvotes(id) as votes
                                                    from total_answer as a
                                                ) as activity
                                        where author = :id and reported = false
                                        order by date desc;"), ['id' => $id]);
        return collect($results)->map(function($x) {return (array) $x; })->toArray();
    }

    public function activityComments($id) {
        $results = DB::select(DB::raw("select *
                                        from (select 3 as type, c.id, c.author, c.date, c.comment as text, '' as title, 0 as best_answer, c.answer as parent, has_been_edited(c.id) as edited,reported,owner, 0 as votes
                                                from total_comment as c) as activity
                                        where author = :id and reported = false
                                        order by date desc;"), ['id' => $id]);
        return collect($results)->map(function($x) {return (array) $x; })->toArray();
    }

    public function updateEmail($data){

        DB::update(
            'UPDATE member SET email = :email where id = :id',
            [
                'email' =>$data['email'],
                'id' =>$data['id']
            ]
        );

    }

    public function updatePassword($data){

        DB::update(
            'UPDATE member SET password = :pass where id = :id',
            [
                'pass' => $data['pass'],
                'id' => $data['id']
            ]
        );
    }

    public function updateName($data){
        DB::update(
            'UPDATE member SET name = :name where id = :id',
            [
                'name' => $data['name'],
                'id' => $data['id']
            ]
        );
    }

    public function updatePhoto($data){

        DB::update('UPDATE member set photo_url = :photo WHERE id = :id', [
            'photo' => $data['imageName'],
            'id'=> $data['id']
            ]);

    }

    public function deleteUser($data){

        
        DB::delete('DELETE FROM member WHERE id = :id', ['id' => $data['id']]);

    }
}
