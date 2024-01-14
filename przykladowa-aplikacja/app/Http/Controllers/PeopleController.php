<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index() {

        $people = People::all();

        return response()->json([
            'People: ' => $people,
        ]);
    }

    // Create:

    public function create(Request $request)    {

        $people = new People();
        $people->name = $request->name;
        $people->surname = $request->surname;
        $people->phone = $request->phone;
        $people->street = $request->street;
        $people->nationality = $request->nationality;

        $people->save();

            return response()->json(['Person created.']);
        }
    
    // Read:

    public function read(string $id)    {
        $people = People::find($id);
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
        $people = People::find($id);

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
            $people = People::find($id);

           
                 $people->delete();
                return response()->json([
                    'Message: ' => 'Person deleted with success.',
                ], 200);
        
    }

}
