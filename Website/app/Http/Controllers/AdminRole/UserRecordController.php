<?php

namespace App\Http\Controllers\AdminRole;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Models\Dentist;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Exception;
use Illuminate\Support\Facades\DB;

class UserRecordController extends Controller
{
    public function index(Request $request)
    {
        try {
            $users = User::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('id', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                })
                ->when($request->input('user_type'), function ($query, $user_type) {
                    $query->where('user_type', $user_type);
                })
                ->orderBy($request->input('sort', 'id'), $request->input('direction', 'asc'))
                ->paginate(6)
                ->withQueryString();

            $filters = $request->only(['search', 'user_type']);

            return Inertia::render('Admin/Users/Index', compact('users', 'filters'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the users.');
        }
    }

    public function create()
    {
        return Inertia('Admin/Users/Create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'last_name' => 'required|string|regex:/^[^\s].*$/',
                'first_name' => 'required|string|regex:/^[^\s].*$/',
                'middle_name' => 'required|string|regex:/^[^\s].*$/',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'contact_number' => 'required|regex:/^09\d{9}$/',
                'user_type' => 'required',
            ]);

            $user = User::create([
                'name' => $request->last_name . ', ' . $request->first_name,
                'user_type' => $request->user_type,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            Dentist::create([
                'user_id' => $user->id,
                'dentist_id' => $user->id,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'contact_number' => $request->contact_number,
            ]);

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create user.')->withInput();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while creating the user.')->withInput();
        }
        return redirect(route('admin.user.index'))->with('success', 'User created!');
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            return Inertia::render('Admin/Users/Show', compact('user'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the user.');
        }
    }

    public function edit($id)
    {
        try {
            $user_info = User::findOrFail($id);

            return Inertia::render('Admin/Users/Edit', compact('user_info'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the user.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::where('id', $id)->first();

            $data = $request->validate([
                'name' => 'string',
                'email' => 'email',
                'password' => 'nullable|string|min:8',
                'user_type' => 'required',
            ]);

            $user->update([
                'name' => $data['name'],
                'user_type' => $data['user_type'],
                'email' => $data['email'],
                'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
            ]);

            if ($user->user_type == 'student') {
                $student = $user->student->first();
                if ($user->wasChanged('email')) {
                    $emailParts = explode('@', $user->email);
                    $student->id_number = $emailParts[0];
                    $student->save();
                }

                if ($user->wasChanged('name')) {
                    $nameParts = explode(', ', $user->name);
                    $student->update([
                        'last_name' => $nameParts[0],
                        'first_name' => $nameParts[1] ?? '',
                    ]);
                }
            } else if ($user->user_type == 'employee') {
                $employee = $user->employee->first();
                if ($user->wasChanged('name')) {
                    $nameParts = explode(', ', $user->name);
                    $employee->update([
                        'last_name' => $nameParts[0],
                        'first_name' => $nameParts[1] ?? '',
                    ]);
                }
            } else if ($user->user_type == 'dentist') {
                $dentist = Dentist::where('user_id', $user->id)->first();
                if ($user->wasChanged('name')) {
                    $nameParts = explode(', ', $user->name);
                    $dentist->update([
                        'last_name' => $nameParts[0],
                        'first_name' => $nameParts[1] ?? '',
                    ]);
                }
            } else if ($user->user_type == 'assistant') {
                $assistant = Assistant::where('user_id', $user->id)->first();
                if ($user->wasChanged('name')) {
                    $assistant->update([
                        'name' => $user->name,
                    ]);
                }
            }
            return redirect(route('admin.user.index'))->with('success', 'User updated!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            return back()->with('error', 'Failed to update user.')->withInput();
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while updating the user.')->withInput();
        }
    }

    public function createAssistant()
    {
        return Inertia('Admin/Users/CreateAssistant');
    }

    public function storeAssistant(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|regex:/^[a-zA-Z]+([-\s]?[a-zA-Z]+)*$/',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'user_type' => 'required',
            ]);          

            $user = User::create([
                'name' => $request->last_name . ', ' . $request->first_name,
                'user_type' => $request->user_type,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            Assistant::create([
                'user_id' => $user->id,
                'assistant_id' => $user->id,
                'name' => $request->name,
            ]);

            return redirect(route('admin.user.index'))->with('success', 'User created!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            return back()->with('error', 'Failed to create user.')->withInput();
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while creating the user.')->withInput();
        }
    }
}
