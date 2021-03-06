<?php

namespace App\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use RapidApi\RapidApiConnect;
use GuzzleHttp\Client;
use Socialite;
use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {



        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rapid = new RapidApiConnect("default-application_5bc7d447e4b08725af2a7b23", "494450e4-a9a2-4a9d-b89b-6efe8d6b57fa");

        $result1 = $rapid->call('Github', 'createRepository', [
            "accessToken" => $request->access_token,
            "name" => $request->repository_name
        ]);

	for($i=1;$i<=10;$i++){
            $collaborator = 'collaborator' . $i;
            if (empty($request->$collaborator) !== true){
                $result2 = $rapid->call('Github', 'addRepositoryCollaborator', [
                    "accessToken" => $request->access_token,
                    "user" => $request->owner,
                    "repositoryName" => $request->repository_name,
                    "collabuser" => $request->$collaborator
                ]);
            }
        }
	$createapp = $this->createapp($request->email, $request->password);
	$buildapp = $this->buildapp($request->email, $request->password,$createapp->name ,"flask");
	return view('success')->with('details',$createapp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
