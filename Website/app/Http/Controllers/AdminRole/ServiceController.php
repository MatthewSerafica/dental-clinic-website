<?php

namespace App\Http\Controllers\AdminRole;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        try {
            $services = Service::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');
                $query->where('services', 'like', '%' . $search . '%');
            })
            ->orderBy($request->input('sort', 'id'), $request->input('direction', 'asc'))
            ->paginate(10);

            return Inertia::render('Admin/Services/Index', [
                'services' => $services,
                'page' => $services->currentPage(),
                'perPage' => $services->perPage(),
                
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the school.');
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'An error occurred while retrieving courses. Please try again later.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'service' => 'required',
                'annual' => 'boolean|nullable',
                'regular' => 'boolean|nullable',
                'employee' => 'boolean|nullable',
            ]);

            DB::beginTransaction();

            Service::create([
                'services' => $request->service,
                'annual' => $request->annual ? 1 : 0,
                'regular' => $request->regular ? 1 : 0,
                'employee' => $request->employee ? 1 : 0,
            ]);

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while saving the school.' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while creating the school. Some fields maybe empty or invalid.');
        }


        return redirect()->back()->with('success', 'Service successfuly created!');
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'service' => 'required',
                'annual' => 'boolean|nullable',
                'regular' => 'boolean|nullable',
                'employee' => 'boolean|nullable',
            ]);

            DB::beginTransaction();

            $service = Service::findOrFail($request->id);
            $service->services = $request->input('service');
            $service->annual = $request->input('annual');
            $service->regular = $request->input('regular');
            $service->employee = $request->input('employee');
            $service->save();

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while editing the school.' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while editing the school. Some fields maybe empty or invalid.');
        }

        return redirect()->back()->with('success', 'School successfuly updated!');
    }

    public function destroy($id)
    {

        try {
            $service = Service::findOrFail($id);
            DB::beginTransaction();
            $service->delete();

            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'School not found.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while removing the school.');
        }

        return redirect()->back()->with('success', 'Department successfuly removed!');
    }

    public function getEmployeeServices()
    {
        $services = Service::where('employee', 1)->get();

        return response()->json($services);
    }

    public function getAnnualServices()
    {
        $annual = Service::where('annual', 1)->get();
        $regular = Service::where('regular', 1)->get();
        $services = $annual->concat($regular);
        return response()->json($services);
    }

    public function getRegularServices()
    {
        $services = Service::where('regular', 1)->get();
        return response()->json($services);
    }
}
