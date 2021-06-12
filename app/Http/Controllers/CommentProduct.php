<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentProduct extends Controller
{
    public function AuthLogin(){

        if(Session::get('login_normal')){

            $admin_id = Session::get('admin_id');
        }else{
            $admin_id = Auth::id();
        }
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
        $comment->product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'HiếuStore';
        $comment->save();

    }
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function list_comment(){
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

                                        <div class="col-md-2">
                                            <img width="100%" src="('/public/frontend/images/avata.png')" class="img img-responsive img-thumbnail">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color:green;">@'.$comm->comment_name.'</p>
                                            <p style="color:#000;">'.$comm->comment_date.'</p>
                                            <p>'.$comm->comment.'</p>
                                        </div>
                                    </div><p></p>
                                    ';

                                    foreach($comment_rep as $key => $rep_comment)  {
                                        if($rep_comment->comment_parent_comment==$comm->comment_id)  {
                                     $output.= ' <div class="row style_comment" style="margin:5px 40px;background: aquamarine;">

                                        <div class="col-md-2">
                                            <img width="80%" src="('/public/frontend/images/admin.png')" class="img img-responsive img-thumbnail">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color:blue;">@Admin</p>
                                            <p style="color:#000;">'.$rep_comment->comment.'</p>
                                            <p></p>
                                        </div>
                                    ;
                                        }
                                    }
        }
        echo $output;

    }
}
