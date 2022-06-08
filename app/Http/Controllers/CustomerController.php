<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $_getColumns = ['id','area_id','code','name','age','is_active'];
  
    public function index()
    {
        // with('category','prices')->OrderByIdDescending()->get($this->_getColumns);
        $viewBag['customers'] = Customer::with('areas')->OrderByIdDescending()->get($this->_getColumns);
        $viewBag['areas'] = Area::all();

        // return $viewBag;

        return view('customers.index', $viewBag);
    }

   
    public function create()
    {
        $viewBag['areas'] = Area::all();
        return view('customers.create',$viewBag);
    }

 
    public function store(Request $request)
    {
        return $request->all();
    }

  
    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        //
    }

   
    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
