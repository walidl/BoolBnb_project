<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;


class MessagesController extends Controller
{

  public function printMessagesById($id){

    if(auth()->user()->id != $id){

      return redirect('rentals/all');
    }else{

      $user = User::findOrFail($id);
      $messages = $user->messages;

      return view('pages.private-messages', compact('messages'));
    }
  }

  public function destroyMess($id){

    $message = Message::findOrFail($id);
    $message->delete();

    return redirect(route('printMess', auth()->user()->id));
  }

  public function storeMessage(Request $request){
    $message = new Message();

    $message->content = $request->content;
    $message->sender = $request->sender;
    $message->sent_date = date('m-d');
    $message->user_id = $request->user_id;
    $message->rental_id = $request->rental_id;

    $message->save();

    return response()->json(["success"=>"true"]);
  }
}
