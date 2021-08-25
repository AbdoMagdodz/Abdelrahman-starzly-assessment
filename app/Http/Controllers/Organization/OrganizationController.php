<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationRequest;
use App\Organization;
use Illuminate\Support\Facades\Session;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::filter(request()->all())->paginate(10);

        return view('organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('organizations.store');

        return view('organizations.form', compact('action'));
    }

    /**
     * @param OrganizationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(OrganizationRequest $request)
    {
        $org = new Organization();

        foreach ($request->except('logo', '_token') as $field => $value) {
            $org->$field = $value;
        }

        $org->logo = $request->file('logo')->store('logos', 'public');

        $org->save();

        Session::flash('success', 'Organization has been stored successfully');

        return redirect(route('organizations.index'));
    }

    /**
     * @param Organization $organization
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Organization $organization)
    {
        $action = route('organizations.update', $organization->id);

        return view('organizations.form', compact('organization', 'action'));
    }

    /**
     * @param OrganizationRequest $request
     * @param Organization $organization
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(OrganizationRequest $request, Organization $organization)
    {
        foreach ($request->except('_token', '_method', 'logo') as $field => $value) {
            $organization->$field = $value;
        }

        if ($request->hasFile('logo')) {
            $organization->deleteLogo();
            $organization->logo = $request->file('logo')->store('logos', 'public');
        }

        $organization->save();

        Session::flash('success', 'Organization has been updated successfully');

        return redirect(route('organizations.index'));
    }

    /**
     * @param Organization $organization
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Organization $organization)
    {
        $organization->contacts()->delete();
        $organization->deleteLogo();
        $organization->delete();

        Session::flash('success', 'Organization has been deleted successfully');

        return redirect()->back();
    }
}
