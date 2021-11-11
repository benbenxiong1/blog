<?php


namespace Api\Controllers;


use App\Models\Article;
use App\Models\ArticleHasLabel;
use App\Models\ArticleLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function list(Request $request)
    {
        $list = Article::query()->with('label')->filter($request->all())->type()->paginate(15);
        return $this->success($list);
    }

    public function edit(Request $request)
    {
        $edit = Article::query()->with('label')->find($request->id);
        return $this->success($edit);
    }

    public function label()
    {
        $list = ArticleLabel::query()->get();
        return $this->success($list);
    }


    public function add(Request $request)
    {
        DB::beginTransaction();
        try {
            $article = new Article();
            $article->user_id = 1;
            $article->title = $request->title;
            $article->content = $request->input('content');
            $article->type = $request->type;
            $article->img = $request->img;
            $article->created_at = time();
            $article->save();

            $insert = [];
            foreach ($request->label as $item) {
                $insert[] = [
                    "label_id" => $item,
                    "article_id" => $article->id
                ];
            }
            $num = ArticleHasLabel::insert($insert);
            if($num){
                DB::commit();
                return $this->message('操作成功');
            }
            DB::rollBack();
            return $this->error('操作异常请重试', '500');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('操作异常请重试', '500');
        }
    }

}