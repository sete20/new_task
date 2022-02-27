<?php

namespace App\Http\Controllers\api\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\dashboard\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateArticleRequest $request,Article $article)
    {
        if ($request->file('img')) {
            $path = $request->file('img')->store('articles/images', ['disk' => 'public']);
            $article->update(['img' => $path]);
        }
        $article->update([
            'title' => $request->title,
            'details' => $request->details,
            'category_id' => $request->category_id,
        ]);
        return response()->json([
            'success',
            'message'=>'article updated successfully',
            'article'=>$article
        ]);
    }
}
