<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;


class MessagesController extends Controller
{

  public function getInbox(){



    // $user = User::findOrFail($id);
    $messages = auth()->user()->messages()->orderBy('sent_date','DESC')->get();

    return view('pages.private-messages', compact('messages'));

  }

  public function getMessageById(Request $request){

    if($request->ajax()){

      $id = $request->id;
      $message = Message::findOrFail($id);

      $result = [];

      $result["sender"] = $message->sender;
      $result["sent_date"] = $message->sent_date;
      $result["rental"] = $message->rental()->value('title');
      $result["content"] = $message->content;

      return response()->json($result);

    }





  }

  public function destroyMess($id){

    $message = Message::findOrFail($id);
    $message->delete();

    return redirect(route('printMess', auth()->user()->id));
  }

  public function massDestroyMess($id){

    $message = Message::findOrFail($id);
    $message->delete();

    return redirect(route('printMess', auth()->user()->id));
  }

  public function storeMessage(Request $request){
    $message = new Message();

    $message->content = $request->content;
    $message->sender = $request->sender;
    $message->sent_date = date('m-d');
    $message->user_id = (int)$request->user_id;
    $message->rental_id = (int)$request->rental_id;

    $message->save();

    return response()->json(["success"=>"true"]);
  }
}
