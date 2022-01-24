<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriber;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }
    public function store(StoreSubscriber $request)
    {
        Subscriber::create($request->all());
        alert()->success('success', 'Subscription completed successfully');
        return redirect()->back();

    }
    public function destroy($id)
    {
        Subscriber::destroy($id);
        return redirect()->route('subscribers.index')->with('success', 'Subscriber was deleted successfully!');
    }
}
