<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.order.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.account.formAccount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('accountIMG');
        }
        User::create($params);
        session()->flash('success', 'Пользователь создан');
        return redirect()->route('accounts.show');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('auth.account.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('auth.account.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $user = User::findOrFail($id);
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($user->image);
            $path = $request->file('image')->store('accountIMG');
            $params['image'] = $path;
        }
        $user->update($params);
        session()->flash('success', 'Вы обновили данные учетной записи!');
        return redirect()->route('accounts.show', $user);
    }
}
