<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Http\Requests\UserRequest;
use Validator, Hash, DB;

class UserController extends Controller
{
    //Lista de usuario
    public function index()
    {
        try {
            $users = DB::table('users')
                ->join('roles', 'users.roles_id', 'roles.id')
                ->select('users.*', 'roles.rol_name')
                ->get();

            $roles = Roles::all();
            return view('user.index')->with('users', $users)->with('roles', $roles);
        } catch (\Exception $e) {
            return 'Error : ' . $e->getMessage();
        }

    }

    // Crear usuario
    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:users',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required |email|unique:users',
                'password' => 'required',
                'rolesId' => 'required',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors()->getMessages();
                alert()->error('ERROR', json_encode($message));
                return redirect()->back();
            }

            $user = new User();
            $user->name = $request->name;
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->roles_id = $request->rolesId;
            $user->save();
            alert()->success('Éxito', 'Operación ejecutada con éxito ');
            return redirect()->back();
        } catch (\Exception $e) {
            alert()->error('ERROR', $e->getMessage());
            return redirect()->back();
        }
    }

    // Ver detalles del usuario
    public function show(string $id)
    {
        $user = $this->userById($id);
        if ($user) {
            return view('user.detail')->with('user', $user);
        } else {
            alert()->error('Errro', "Error del sistema ");
            return redirect()->back();
        }

    }



    // Carga los datos del usuario, en el formulario
    public function showById(string $id)
    {
        $user = $this->userById($id);
        if ($user) {
            return view('user.updateUsers')->with('user', $user);
        }
        alert()->error('Errro', "Error del sistema ");
        return redirect()->back();
    }



    //Filtrar usuario
    public function userById($id)
    {
        try {
            $user = User::find($id);
            return $user;
        } catch (\Exception $e) {
            return true;
        }
    }


    // Actualiza los datos de los usuarios

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required |email',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors()->getMessages();
                alert()->error('ERROR', json_encode($message));
                return redirect()->back();
            }


            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->email = $request->email;
            $user->save();

            alert()->success('Éxito', 'Operación ejecutada con éxito ');
            return redirect('/users');
        } catch (\Exception $e) {


            alert()->error('Errro', "Error del sistema ");
            return redirect()->back();
        }


    }




    //Actualiza los datos del usuario en cesión

    public function authUpdate(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required |email',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors()->getMessages();
                alert()->error('ERROR', json_encode($message));
                return redirect()->back();
            }

            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->email = $request->email;
            $user->save();

            alert()->success('Éxito', 'Operación ejecutada con éxito ');
            return redirect()->back();
        } catch (\Exception $e) {


            alert()->error('Errro', "Error del sistema ");
            return redirect()->back();
        }

    }


    //Inhabilitar usuario
    public function destroy(string $id)
    {
        try {
            $this->changeStatus($id, 1);
            return redirect()->back();
        } catch (\Exception $e) {
            return 'Error : ' . $e->getMessage();

        }
    }

    //Activar usuario
    public function retrieve(string $id)
    {
        try {
            $this->changeStatus($id, 0);
            return redirect()->back();
        } catch (\Exception $e) {
            return 'Error : ' . $e->getMessage();

        }
    }


    //Cambia el estado del usuario  flase / true
    public function changeStatus($id, $state)
    {
        try {
            $user = User::findOrFail($id);
            $user->stadium = $state;
            $user->save();
        } catch (\Exception $e) {
            return 'Error : ' . $e->getMessage();
        }
    }

}
