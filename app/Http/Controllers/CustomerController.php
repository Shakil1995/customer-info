<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CustomerController extends Controller
{
    private $_getColumns = ['id','area_id','code','name','age','is_active'];
  
    public function index()
    {
    
        $viewBag['customers'] = Customer::with('area')->OrderByIdDescending()->get($this->_getColumns);
        $viewBag['areas'] = Area::all();

        return view('customers.index', $viewBag);
    }

   
    public function create()
    {
        $viewBag['areas'] = Area::all();
        return view('customers.create',$viewBag);
    }

 
    public function store(Request $request)
    {
       

        //   $customerID='';
        // $totalCustomer=Customer::count();
        // if(strlen($totalCustomer)==1)
        // {
        //     $customerID="1000".$totalCustomer;
        // }
        // elseif(strlen($totalCustomer)==2)
        // {
        //     $customerID="000".$totalCustomer;
        // }
        // elseif(strlen($totalCustomer)==3)
        // {
        //     $customerID="00".$totalCustomer;
        // }
        // elseif(strlen($totalCustomer)==4)
        // {
        //     $customerID="0".$totalCustomer;
        // }
        // elseif(strlen($totalCustomer)==5)
        // {
        //     $customerID=$totalCustomer;
        // }
        // else
        // {
        //     $customerID=$totalCustomer+1;
        // }
        // $customerIDFul = preg_replace("/\s+/", "", $customerID);
        try {

        $customer = new Customer; 

        $nameItem = $request->name;
        $code = $request->code;
        $area_id = $request->area_id;
        $age = $request->age;

            
        $values = [];
    

        if(($nameItem !== NULL)){
            foreach ($nameItem as $index => $name) {
                $values[] = [
                       'name'=>$name,
                        'area_id' => $area_id[$index],
                        'code' => $code[$index],
                        'age' => $age[$index],
                ];
            }
        }


        if ( ($nameItem !== NULL) ){
            $customer->insert($values);
        }

    } catch (QueryException $e) {

        return redirect()->route('customers.index')->with(['errorMsg' => $e->getMessage()]);
    }

    return redirect()->route('customers.index')->with('status', 'Customer  has been created successfully.');


  
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
