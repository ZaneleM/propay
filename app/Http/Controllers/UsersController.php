<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function index()
    {
        $users = Users::all();

        return View::make('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/profiles/create.blade.php)
        return View::make('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
        $data = array(
            'first-name' => 'required',
            'last-name' => 'required',
            'mobile' => 'required|max:255',
            'email' => 'required|email|max:100|unique:users',
            'language' => 'required',
            'dob' => 'required',
            'password' => 'required|min:6|confirmed'
        );
        $validator = Validator::make(Input::all(), $data);

        if ($validator->fails()) {
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store

            $profile = new profile;
            $profile->name = Input::get('first-name');
            $profile->surname = Input::get('first-name');
            $profile->mobile = Input::get('mobile');
            $profile->email = Input::get('email');
            $profile->language = Input::get('language');
            $profile->dob = Input::get('dob');
            $profile->password = Input::get('password');
            $profile->save();


            Session::flash('message', 'Successfully created a Profile!');
            return Redirect::to('users');
        }

        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return Response
         */
    public function show($id)
    {
        $user = User::find($id);

        return View::make('users.show')
            ->with('user', $user);
    }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return Response
         */
        public
        function edit($id)
        {
            //
            $user = User::find($id);

            return View::make('users.edit')
                ->with('users', $user);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  int $id
         * @return Response
         */
        public
        function update($id)
        {
            $data = array(
                'first-name' => 'required',
                'last-name' => 'required',
                'mobile' => 'required|max:255',
                'email' => 'required|email|max:100|unique:users',
                'language' => 'required',
                'dob' => 'required',
                'password' => 'required|min:6|confirmed'
            );
            $validator = Validator::make(Input::all(), $data);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('users/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $profile = User::find($id);
                $profile->name = Input::get('first-name');
                $profile->surname = Input::get('first-name');
                $profile->mobile = Input::get('mobile');
                $profile->email = Input::get('email');
                $profile->language = Input::get('language');
                $profile->dob = Input::get('dob');
                $profile->password = Input::get('password');
                $profile->save();

                // redirect
                Session::flash('message', 'Successfully updated a profile!');
                return Redirect::to('users');
            }
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return Response
         */
        public
        function destroy($id)
        {
            $user = User::find($id);
            $user->delete();

            Session::flash('message', 'Successfully deleted the profile!');
            return Redirect::to('users');
        }


    }
