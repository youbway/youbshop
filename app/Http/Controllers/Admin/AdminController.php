<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Vendor;
use App\Models\VendorBankDetails;
use App\Models\VendorBusinessDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPSTORM_META\type;

// use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function updateAdminPassword(Request $request)
    {
        $adminDetails = (Auth::guard('admin')->user());

        if ($request->isMethod('post')) {
            if (Hash::check($request->currentPassword, Auth::guard('admin')->user()->password)) {
                if ($request['password'] == $request['password-confirm']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($request['password'])]);
                    return redirect()->route('update.admin.password')->with('success' , 'Password has been updated successfully');
                } else {
                    return redirect()->route('update.admin.password')->with('error' , 'Password and password confirm does not match');
                }
            } else {
                return redirect()->route('update.admin.password')->with('error' , 'Enter the correct current password');
            }
        }
        return view('admin.settings.update_admin_password', compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request)
    {

        if (Hash::check($request->currentPassword, Auth::guard('admin')->user()->password)) {
            return "true";
        }
        return "false";
    }


    public function updateAdminDetails(Request $request)
    {
        $adminDetails = Auth::guard('admin')->user();
        if ($request->isMethod('post')) {
            if (! $request->has('status')) {
                $request->request->add(['status' => 0]);
            } else {
                $request->merge([
                    'status' => 1,
                ]);
            }

            $path = Auth::guard('admin')->user()->image;
            $path = Str::swap(['storage' => 'public'], $path);

            if (!empty($request->image)) {
                if($path) {
                    deleteImage($path);
                }
                $path = saveImage('admin_img', $request->image);
            }


            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'mobile' => 'required|numeric',
            ];

            try {
                $this->validate($request,$rules);
                DB::beginTransaction();
                Admin::where('id', Auth::guard('admin')->user()->id)->update([
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'status' => $request->status,
                    'image' => $path,
                ]);
                DB::commit();
                return redirect()->route('update.admin.details')->with('success' , 'Details have been updated successfully');
            } catch (\Exception $ex) {
                DB::rollBack();
                return redirect()->route('update.admin.details')->with('error' , 'Something went wrong');
            }

        }

        return view('admin.settings.update_admin_details', compact('adminDetails'));
    }

    public function login(Request $request)
    {

        if ($request->isMethod('post')) {

            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ];

            $messages = [
                'email.required' => 'The email is required !!',
                'email.email' => 'The email must be valid',
                'password.required' => 'The password is required',
                'password.min' => 'The password must be at least 6 characters',
            ];
            $this->validate($request,$rules, $messages);
            if (Auth::guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password'], 'status' => 1])) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')->with(['error' => 'invalid email or password']);
            }

            // return $request;
        }
        return view('admin.login');
    }


    public function updateVendorDetails($slug, Request $request)
    {
        $adminDetails = Auth::guard('admin')->user();
        $vendorDetails = $adminDetails->vendor;
        $businessDetails = $vendorDetails->business;
        $bankDetails = $vendorDetails->bank;
        $countries = Country::all();


        if ($slug == 'personal') {
            if ($request->isMethod('post')) {
                //update in admins table
                //1- image
                $path = $adminDetails->image;
                $path = Str::swap(['storage' => 'public'], $path);
                $this->validate($request,Admin::AdminVendorRules());
                try {
                    //validation "trying to not use the form request"
                    //updating image
                    if (!empty($request->image)) {
                        if($path) {
                            deleteImage($path);
                        }
                        $path = saveImage('admin_img', $request->image);
                    }
                    DB::beginTransaction();
                    Admin::where('id', Auth::guard('admin')->user()->id)->update([
                        'name' => $request->name,
                        'mobile' => $request->mobile,
                        'image' => $path,
                    ]);
                    DB::commit();
                } catch (\Exception $ex) {
                    DB::rollBack();
                    dd($ex);
                    return redirect()->route('update.vendor.details', $slug)->with('error' , 'Something went wrong');
                }

                //update in vendors table
                $this->validate($request,Vendor::rules());
                try {
                    DB::beginTransaction();
                    $vendorDetails->update([
                        'name' => $request->name,
                        'mobile' => $request->mobile,
                        'address' => $request->address,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country,
                        'pincode' => $request->pincode,
                    ]);
                    DB::commit();
                    return redirect()->route('update.vendor.details', $slug)->with('success' , 'Details have been updated successfully');
                } catch (\Exception $ex) {
                    deleteImage($path);
                    DB::rollBack();
                    dd($ex);
                    return redirect()->route('update.vendor.details', $slug)->with('error' , 'Something went wrong');
                }

            }
        } else if ($slug == 'business') {
           if ($request->isMethod('post')) {

                //1- image
                $path = $businessDetails->address_proof_image;
                $path = Str::swap(['storage' => 'public'], $path);

                //update in vendorsBusinessDetails table

                if (!empty($request->address_proof_image)) {
                    if($path) {
                        deleteImage($path);
                    }
                    $path = saveImage('business_proof_img', $request->address_proof_image);
                }
                if ($path) {
                    $request->validate(VendorBusinessDetails::rules());
                }else {
                    $request->validate(VendorBusinessDetails::rules(true));
                }
                try {

                    DB::beginTransaction();
                    $businessDetails->update([
                        'shop_email' => $request->shop_email,
                        'shop_name' => $request->shop_name,
                        'shop_address' => $request->shop_address,
                        'shop_city' => $request->shop_city,
                        'shop_state' => $request->shop_state,
                        'shop_country' => $request->shop_country,
                        'shop_mobile' => $request->shop_mobile,
                        'shop_website' => $request->shop_website,
                        'shop_pincode' => $request->shop_pincode,
                        'business_license_number' => $request->business_license_number,
                        'gst_number' => $request->gst_number,
                        'pan_number' => $request->pan_number,
                        'address_proof' => $request->address_proof,
                        'address_proof_image' => $path,
                    ]);
                    DB::commit();
                    return redirect()->route('update.vendor.details', $slug)->with('success' , 'Details have been updated successfully');
                } catch (\Exception $ex) {
                    DB::rollBack();
                    return redirect()->route('update.vendor.details', $slug)->with('error' , "something went wrong");
                }
            }

        } else if ($slug == 'bank') {
            //validation
            if ($request->isMethod('post')) {
                $request->validate(VendorBankDetails::rules());

            try {

                DB::beginTransaction();
                $bankDetails->update([
                    'account_holder_name' => $request->account_holder_name,
                    'bank_name' => $request->bank_name,
                    'account_number' => $request->account_number,
                    'bank_ifsc_number' => $request->bank_ifsc_number,
                ]);
                DB::commit();
                return redirect()->route('update.vendor.details', $slug)->with('success' , 'Details have been updated successfully');
            } catch (\Exception $ex) {
                DB::rollBack();
                return redirect()->route('update.vendor.details', $slug)->with('error' , "something went wrong");
            }
            }
        }

        return view('admin.vendors.update_vendor_details', compact('slug', 'adminDetails', 'vendorDetails', 'businessDetails', 'bankDetails', 'countries'));
    }

    public function showAdmins($type = null)
    {

        if ($type) {
            $items = Admin::where('type', $type)->get();
        } else {
            $items =  Admin::all();
        }

        return view('admin.admins.index', compact('type', 'items'));
    }

    public function adminShowVendorDetails($id)
    {
        $adminDetails = Admin::where('id', $id)->first();
        $vendorDetails = $adminDetails->vendor;
        $businessDetails = $vendorDetails->business;
        $bankDetails = $vendorDetails->bank;
        return view('admin.admins.show_vendor_details',compact('vendorDetails','adminDetails', 'businessDetails', 'bankDetails'));
    }

    public function updateAdminStatus(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->status;
            if ($status == "active") {
                $status = 0;
            }
            if ($status == "inactive") {
                $status = 1;
            }

            $admin = Admin::findOrFail($request->item_id);
            $admin->update(["status" => $status]);

            return response()->json(["status" => $status, "item_id" => $request->item_id]);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
