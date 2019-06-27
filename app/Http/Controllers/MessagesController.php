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
}
