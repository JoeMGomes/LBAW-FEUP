<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class Question extends Model
{

    protected $primaryKey = 'post';

    protected $fillable = [
        'title'
    ];
    protected $table = 'question';

    /**
     * queries and prepares array to send to question page
     */
    public function getAllInfo($id)
    {
        $user = Auth::check() ? Auth::user()->id : 0;
        $result = DB::select(
            DB::raw('select *
        from (
            select 1 as type, id, author, date, text_body as text, title, best_answer, 0 as parent, has_been_edited(id) as edited, reported, owner, name, photo_url, membership_date, score, banned, 0 as votes, is_bookmarked(:member, id) as bookmarked
             from total_question
             where id=:question_id
          union
            select 2 as type, a.id, author, date, answer as text_body, \'\' as title, 0 as best_answer, question as parent, has_been_edited(id) as edited, reported, owner, name, photo_url, membership_date, score, banned, upvotes(id) - downvotes(id) as votes, false as bookmarked
            from total_answer as a
            where question = :question_id
          union
            select 3 as type, c.id, c.author, c.date, c.comment as text_body, \'\' as title, 0 as best_answer, c.answer as parent, has_been_edited(c.id) as edited, c.reported, c.owner, c.name, c.photo_url, c.membership_date, c.score, c.banned, 0 as votes, false as bookmarked
            from total_comment as c, total_answer as a
            where c.answer = a.id and a.question = :question_id
          union
            select 4 as type, c.id as id, color as author, now() as date, \'\' as text, \'\' as title, 0 as best_answer, 0 as parent, false as edited, false as reported, 0 as owner, name, \'\' as photo_url, now() as membership_date, 0 as score, false as banned, 0 as votes, false as bookmarked
            from question_category as q, category as c
            where q.question = :question_id and q.category = c.id  
        ) as question order by type'),
            array('question_id' => $id, 'member' => $user)
        );
        $result = collect($result)->map(function ($x) {
            return (array) $x;
        })->toArray();
        //parses query array $result
        $question = $result[0];
        $answers = array();
        $comments = array();
        $categories = array();
        foreach ($result as $r) {
            if ($r['type'] == 2) {
                array_push($answers, $r);
            } else if ($r['type'] == 3) {
                array_push($comments, $r);
            } else if ($r['type'] == 4) {
                array_push($categories, $r);
            }
        }

        // comments inside answers
        $complete_answers = array();
        foreach ($answers as $a) {
            $complete_comments = array();
            foreach ($comments as $c) {
                if ($c['parent'] == $a['id']) {
                    array_push($complete_comments, $c);
                }
            }
            $a['comments'] = $complete_comments;
            array_push($complete_answers, $a);
        }

        // best answer on question
        if (isset($question['best_answer'])) {
            $ba = $question['best_answer'];
            foreach ($complete_answers as $key => $a) {
                if ($a['id'] == $ba) {
                    $question['best_answer_info'] = $a;
                    unset($complete_answers[$key]);
                    break;
                }
            }
        }

        $question['categories'] = $categories;

        $final = array('question' => $question, 'answers' => $complete_answers);

        return $final;
    }

    public function post()
    {
        return $this->hasOne('App\Post', 'post');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'post');
    }

    public function popularQuestions()
    {
        $posts = DB::select(DB::raw('select q.id, q.title, q.text_body, q.name, q.photo_url
                                    from total_question as q, (
                                        select q.id,sum(upvotes(a.id) + downvotes(a.id)) + count(*)*5 as rank
                                        from total_question as q, total_answer as a
                                        where q.id = a.question
                                        group by q.id
                                        order by rank desc
                                        limit 5 ) as p
                                    where p.id = q.id
                                    order by p.rank desc'));
        return collect($posts)->map(function ($x) {
            return (array) $x;
        })->toArray();
    }

    public function updateQuestion(Request $request)
    {
        DB::select("UPDATE post SET text_body = :newtext WHERE id = :id;",  [
            'newtext' => $request->input('text_body'),
            'id' => $request->input('questionID')
        ]);

        DB::select("UPDATE question SET title = :title WHERE post = :id;",  [
            'title' => $request->input('title'),
            'id' => $request->input('questionID')
        ]);
    }


    public function addAnswer(Request $request)
    {
        DB::select('SELECT add_answer(:param1, :param2, :param3)', [
            'param1' => Auth::user()->id,
            'param2' => $request->input('text_body'),
            'param3' => $request->input('question_id')
        ]);
    }

    public function addQuestion($title, $text)
    {
        $id = DB::select('SELECT add_question(:param1, :param2, :param3)', [
            'param1' => Auth::user()->id,
            'param2' => $title,
            'param3' => $text
        ]);
        return $id;
    }

    public function addCategory($questionid, $categ)
    {
        DB::select('insert into question_category(question, category) values (:question, (select id from category where name = :catid));', [
            'question' => $questionid,
            'catid'  => $categ]);
    }

    public function addbestAnswer(Request $request)
    {
        $question = $request->input('question');
        $answer = $request->input('answer');
        DB::select(
            DB::raw('update question set best_answer = :answer where post = :question'),
            ['question' => $question, 'answer' => $answer]
        );
    }

    public function delQuestion(Request $request)
    {
        $question = $request->input('id');
        DB::select(DB::raw('select delete_question(:question)'), 
            ['question' => $question]);
    }
}
