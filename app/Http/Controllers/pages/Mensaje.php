<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class Mensaje extends Controller
{
  public function index()
  {
      $messages = Message::with('user')->latest()->get();
      return view('content.pages.messages', ['messages' => $messages]);
  }

  public function create(){
    $message = new Message();
    return view('content.pages.messages-create', compact('message'));

  }

  public function store(Request $request)
  {
      $request->validate([
          'content' => 'required|max:255',
      ]);

      $message = new Message();
      $message->content = $request->input('content');
      $message->user_id = auth()->id(); // Asigna el ID del usuario actual que publica el mensaje
      $message->save();
      return redirect()->route('pages-messages');;
  }
}
