<?php

namespace App\Http\Controllers;

use App\models\User;

class PeopleController extends Controller
{
    public function index(){

        $people = Person::all();

        return response()->json([
            'People: ' => $people,
        ]);
    }

    // Create:

    public function store(Request $request) {   
        $input = $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'phone' => ['required'],
            'street' => ['required'],
            'nationality' => ['required'],
        ]);

        $people = Person::create($input);

        if ($people->save())   {
            return response()->json([
                'Message: ' => 'Success!',
                'Person created: ' => $people
        ], 200);
        }   else    {
            return response([
                'Message: ' => 'We could not create a new person.',
            ], 500);
        }
    }

    // Read:

    public function show(string $id)    {
        $people = Person::find($id);
        if ($people)    {
            return response()->json([
                'Message: ' => 'Person found.',
                'Person: ' => $people
            ], 200);
        }
        else    {
            return response([
                'Message: ' => 'We could not find the person.',
            ], 500);
        }
    }

    // Update:

    public function update(Request $request, string $id)    {
        $people = Person::find($id);

        if($people)    {
            $input = $request->validate([
                'name' => ['required'],
                'surname' => ['required'],
                'phone' => ['required'],
                'street' => ['required'],
                'nationality' => ['required'],
            ]);

            $people->name = $input['name'];
            $people->surname = $input['surname'];
            $people->phone = $input['phone'];
            $people->street = $input['street'];
            $people->nationality = $input['nationality'];

            if($people->save()) {
                return response()->json([
                    'Message: ' => 'Person updated with success.',
                    'Person: ' => $people
                ], 200);
            }
            else    {
                return response([
                    'Message: ' => 'We could not update the person.',
                ], 500);
            }
        }
    }

        //Delete: 

    public function destroy(string $id) {
            $people = Person::find($id);

            if($people)    {
                $people->delete();
                return response()->json([
                    'Message: ' => 'Person deleted with success.',
                ], 200);
            }
            else    {
                return response([
                    'Message: ' => 'We could not find the person.',
                ], 500);
            }
    }

}


