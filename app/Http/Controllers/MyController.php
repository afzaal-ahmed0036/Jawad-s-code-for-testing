<?php
     
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
    
class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('admin.import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        if(request()->file() == null)
        {
            return back()->with('error' , 'does not import empty file. Please choose the file first');
        }
      else
      {
        Excel::import(new UsersImport,request()->file('file'));
             
        return back();
      }

    }
}
