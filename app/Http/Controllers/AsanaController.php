<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
// use the config to get  asana creds
use Config;


class AsanaController extends Controller
{
    public function fetchAsanaTasks()
    {
        $accessToken = Config::get('asana.access_token');

        $response = Http::withHeaders([
            'Authorization' => $accessToken,
        ])->get('https://app.asana.com/api/1.0/user_task_lists/1206441959768782/tasks');

        // Check if the request was successful
        if ($response->successful()) {
            $tasks = $response->json()['data']; // Assuming the response contains a 'data' key
            return view('tasks', ['tasks' => $tasks]);
        } else {
            // Handle the error
            $error = $response->json();
            return response()->json(['error' => $error], $response->status());
        }
    }

    public function detailsFromAsana($id)
    {
        $accessToken = Config::get('asana.access_token');

        $response = Http::withHeaders([
            'Authorization' => $accessToken,
        ])->get('https://app.asana.com/api/1.0/tasks/' . $id);

        // Check if the request was successful
        if ($response->successful()) {
            $task = $response->json()['data']; // Assuming the response contains a 'data' key

            // Debugging: Dump and die to see the content
            // dd($task);            
            return view('tasks.detailsFromAsana', ['task' => $task]);
        } else {
            // Handle the error
            $error = $response->json();
            return view('tasks.detailsFromAsana')->with('error', 'Failed to retrieve task details');
        }
    }



}
