<?php

namespace contactApp\Http\Controllers;

use Auth;
use contactApp\Contact;
use contactApp\User;
use Illuminate\Http\Request;
use Session;
use Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contact_type = $request->get('contact_type');
        $search = '%' . $request->get('search') . '%';
        if (!empty($search) || !empty($contact_type)) {
            $contacts = Contact::where('contact_type', $contact_type)->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)->orWhere('email', 'like', $search);
            })->get();
        } else {
            $contacts = Contact::all();
        }

        return view('contacts.index')->withContacts($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'contact_type'        => 'required',
            'name'                => 'required',
            'address'             => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'postal_code'         => 'required',
            'phone_number_1'      => 'required',
            'phone_number_1_type' => 'required'
        ]);

        $user = Auth::user();
        $contact = new Contact;
        $contact->user_id = $user->id;
        $contact->contact_type = $request->input('contact_type');
        $contact->contact_type_additional_info = $request->input('contact_type_additional_info');
        $contact->name = $request->input('name');
        $contact->address = $request->input('address');
        $contact->city = $request->input('city');
        $contact->state = $request->input('state');
        $contact->postal_code = $request->input('postal_code');
        $contact->email_address = $request->input('email_address');
        $contact->phone_number_1 = $request->input('phone_number_1');
        $contact->phone_number_1_type = $request->input('phone_number_1_type');
        $contact->phone_number_2 = $request->input('phone_number_2');
        $contact->phone_number_2_type = $request->input('phone_number_2_type');
        $contact->phone_number_3 = $request->input('phone_number_3');
        $contact->phone_number_3_type = $request->input('phone_number_3_type');
        $contact->save();

        Session::flash('flash_message', 'Contact successfully added!');

        return redirect()->back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return int
     */
    public function postContact(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));

        $validator = Validator::make($request->all(), [
            'contact_type'        => 'required',
            'name'                => 'required',
            'address'             => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'postal_code'         => 'required',
            'phone_number_1'      => 'required',
            'phone_number_1_type' => 'required'
        ]);

        if ($validator->passes()) {
            $contact = new Contact;
            $contact->user_id = $user->id;
            $contact->contact_type = $request->input('contact_type');
            $contact->contact_type_additional_info = $request->input('contact_type_additional_info');
            $contact->name = $request->input('name');
            $contact->address = $request->input('address');
            $contact->city = $request->input('city');
            $contact->state = $request->input('state');
            $contact->postal_code = $request->input('postal_code');
            $contact->email_address = $request->input('email_address');
            $contact->phone_number_1 = $request->input('phone_number_1');
            $contact->phone_number_1_type = $request->input('phone_number_1_type');
            $contact->phone_number_2 = $request->input('phone_number_2');
            $contact->phone_number_2_type = $request->input('phone_number_2_type');
            $contact->phone_number_3 = $request->input('phone_number_3');
            $contact->phone_number_3_type = $request->input('phone_number_3_type');
            $contact->save();

            $response = array(
                'success' => true,
                'message' => 'Contact created successfully',
            );

            return response()->json($response);
        }

        $response = array(
            'success' => false,
            'error'   => $validator->errors()->all(),
        );

        return response()->json($response);


    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContact(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        if (!empty($name)) {
            $contacts = Contact::where('name', $name)->get();

            $response = array(
                'success'  => true,
                'contacts' => $contacts,
            );

            return response()->json($response);


        } else if (!empty($email)) {
            $contacts = Contact::where('email', $email)->get();

            $response = array(
                'success'  => true,
                'contacts' => $contacts,
            );

            return response()->json($response);
        }
        $response = array(
            'success' => false,
            'error'   => 'Contact Not Found',
        );

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @internal param \contactApp\Contact $contact
     *
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show')->withContact($contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @internal param \contactApp\Contact $contact
     *
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.edit')->withContact($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param                           $id
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @internal param \contactApp\Contact $contact
     *
     */
    public function update($id, Request $request)
    {
        $contact = Contact::findOrFail($id);

        $this->validate($request, [
            'contact_type'        => 'required',
            'name'                => 'required',
            'address'             => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'postal_code'         => 'required',
            'phone_number_1'      => 'required',
            'phone_number_1_type' => 'required'
        ]);

        $input = $request->all();

        $contact->fill($input)->save();

        Session::flash('flash_message', 'Contact successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @internal param \contactApp\Contact $contact
     *
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        Session::flash('flash_message', 'Contact successfully deleted!');

        return redirect()->route('contacts.index');
    }
}
