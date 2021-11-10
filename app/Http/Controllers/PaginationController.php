<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;


class PaginationController extends Controller
{
    public function index(Request $request)
    {
        $dbname=session("dbname");
        Client::configure($dbname);
     $properties=DB::select("EXEC Pro_AllActiveProperties");
            $categories=DB::select("EXEC selectcategories");
            $queryResults=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3",[':param1'=>'All',':param2'=>'All',':param3'=>'All',]);
        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        //Create a new Laravel collection from the array data
        $collection = new Collection($queryResults);
        //Define how many items we want to be visible in each page
        $perPage = 20;
        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
        $paginatedSearchResults->setPath($request->url());
        $paginatedSearchResults->appends($request->except(['page']));
        return view('auth.home')
        ->withproperties($properties)
         ->withcategories($categories)
         ->withvacantunits($paginatedSearchResults);
        // return view('search', ['results' => $paginatedSearchResults]);
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        $dbname=session("dbname");
        Client::configure($dbname);
     $properties=DB::select("EXEC Pro_AllActiveProperties");
            $categories=DB::select("EXEC selectcategories");
            $queryResults=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3",[':param1'=>'All',':param2'=>'All',':param3'=>'All',]);
        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        //Create a new Laravel collection from the array data
        $collection = new Collection($queryResults);
        //Define how many items we want to be visible in each page
        $perPage = 20;
        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
        $paginatedSearchResults->setPath($request->url());
        $paginatedSearchResults->appends($request->except(['page']));
        return view('auth.appendvacantunits')
        ->withproperties($properties)
         ->withcategories($categories)
         ->withvacantunits($paginatedSearchResults);
     }
    }
}
?>