<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if (Auth::user()->role == 1) {
            $messages = Message::with(['sender','recipient'])->get();
            $users = User::whereNot('role', 1)->get();
        }else{
            $messages = Message::where('user_id', Auth::id())->with(['sender','recipient'])->get();
            $users = [];
            foreach ($messages as $message) {
                $users[] = User::find($message->recipient_id);
            }
        }
        return view('messages.index', compact('messages','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // dd($request->all());
        $recipent = User::find($request->recipient_id);
        if (!$recipent) {
            $recipent = new User();
            $recipent->name = $request->recipient_id;
            $recipent->role = 2;

            $recipent->save();
        }
        $request->validate([
            'content' => 'required|string|max:255',
            'question' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
            'order_by' => 'nullable|integer|min:1',
        ]);
        
        $message = new Message();
        $message->user_id = Auth::id();
        $message->recipient_id = $recipent->id;
        $message->content = $request->content;
        $message->question = $request->question;
        $message->password = $request->password;
        if ($request->order_by) {
            $message->order_by = $request->order_by;
        }else{
            $message->order_by = Message::where('user_id', Auth::id())->where('recipient_id',$recipent->id)->max('order_by')+1;
        }
        $message->updated_at = null;
        $message->save();

        return redirect()->back()->with('success', 'Message berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $message = Message::find($id);
        if (!$message) {
            return redirect()->back()->with('error', 'Message tidak ditemukan.');
        }

        $request->validate([
            'content' => 'required|string|max:255',
            'question' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
            'order_by' => 'nullable|integer|min:1',
        ]);

        $message->content = $request->content;
        $message->question = $request->question;
        $message->password = $request->password;
        if ($request->order_by) {
            $message->order_by = $request->order_by;
        } else {
            $message->order_by = Message::where('user_id', Auth::id())->where('recipient_id', $recipent->id)->max('order_by') + 1;
        }
        $message->save();

        return redirect()->back()->with('success', 'Message berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        $message = Message::find($id);
        $message->delete();
         return response()->json(['success'=>"Message berhasil dihapus"], 200);
    }

    function find($name) {
        $user = User::where('name', $name)->where('role',2)->first();
        if (!$user) {
            abort(404);
        }
        $message = Message::where('recipient_id',$user->id)->where('is_read',false)->orderBy('order_by')->first();
        if (!$message) {
            # code...
            return view('messages.nope',compact('name'));
        }
        if ($message->question) {
            # code...
            return view('messages.lock',compact('message'));
        }
        // return view('messages.display');
        return view('messages.display',compact('message'));

    }
    function next($name) {
        $user = User::where('name', $name)->where('role',2)->first();
        if (!$user) {
            abort(404);
        }
        $message = Message::where('recipient_id',$user->id)->where('is_read',false)->orderBy('order_by')->first();
        $message->is_read = true;
        $message->read_at= now();
        $message->save();
        return redirect()->back();
    }
    function unlock(Request $request, $name) {
        $password = $request->password;
        $user = User::where('name', $name)->where('role',2)->first();
        if (!$user) {
            abort(404);
        }
        $message = Message::where('recipient_id',$user->id)->where('is_read',false)->orderBy('order_by')->first();
        if ($message->password != $password) {
            # code...
            return redirect()->back()->with('error', 'Kuncinya salah nih :(');
        }
        $message->question = null;
        $message->save();
         return redirect()->back();

    }
}
