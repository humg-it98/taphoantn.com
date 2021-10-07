<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id(); 
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->product_id = $data['product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'NgocNTN';
        $comment->save();

    }
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function list_comment(){
        $this->AuthLogin();
        $comment = Comment::with('product')->where('comment_parent_comment','=',0)->orderBy('comment_id','DESC')->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();
        return view('admin.comment.list_comment')->with(compact('comment','comment_rep'));
    }
    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->product_id = $product_id;
        $comment->comment_status = 1;
        $comment->comment_parent_comment = 0;
        $comment->save();
    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('product_id',$product_id)->where('comment_parent_comment','=',0)->where('comment_status',0)->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();
        $output = '';
        foreach($comment as $key => $comm){
            $output.= '
                            <li>
                                <div class="author-avatar pt-15">
                                    <img src="'.url('/public/frontend/images/product-details/user.png').'" alt="Admin">
                                </div>
                                <div class="comment-body pl-15">
                                        <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                    <h5 class="comment-author pt-15">@'.$comm->comment_name.'</h5>
                                    <div class="comment-post-date">'.$comm->comment_date.'</div>
                                    <p>'.$comm->comment.'</p>
                                </div>
                            </li>
                                    ';

                                    foreach($comment_rep as $key => $rep_comment)  {
                                        if($rep_comment->comment_parent_comment==$comm->comment_id)  {
                                     $output.= '
                                                <li class="comment-children">
                                                    <div class="author-avatar pt-15tar">
                                                        <img src="'.url('/public/frontend/images/product-details/admin.png').'" alt="Admin">
                                                    </div>
                                                    <div class="comment-body pl-15">
                                                            <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                                        <h5 class="comment-author pt-15">admin</h5>
                                                        <div class="comment-post-date">
                                                        '.$rep_comment->comment_date.'
                                                        </div>
                                                        <p>'.$rep_comment->comment.'</p>
                                                    </div>
                                                </li>
                                    ';
                                        }
                                    }
        }
        echo $output;

    }
    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }
}
