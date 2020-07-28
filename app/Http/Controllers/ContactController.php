<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function get()
    {
        // get all users except the authenticated one
        $contacts = User::where('id', '!=', Auth::id())->get();

        $unreadIds = Message::select(DB::raw('`from` as sender_id, count(`from`) as message_count'))
            ->where('to', Auth::id())
            ->where('read', false)
            ->groupBy('from')
            ->get();
        
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->message_count : 0;

            return $contact;
        });

        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        // Mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', Auth::id())->update(['read' => true]);

        $messages = Message::where('from', $id)->orWhere('to', $id)->get();

        $messages = Message::where(function($q) use ($id) {
            $q->where('from', Auth::id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', Auth::id());

        })->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $message = Message::create([
            'from' => Auth::id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}
