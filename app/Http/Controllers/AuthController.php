<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LegalPerson;
use App\Models\Password;
use App\Models\PhysicalPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'surname' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'patronymic' => 'nullable|string|max:255',
                'birth_date' => 'required|date',
                'passport_series' => 'required|string|max:10',
                'passport_number' => 'required|string|max:10',
                'inn' => 'required|string|max:12',
                'snils' => 'nullable|string|max:11',
                'phone' => 'required|string|max:15|unique:physical_persons',
                'email' => 'required|email|max:255|unique:physical_persons',
                'type' => 'required|string|in:физическое лицо,юридическое лицо',
                'login' => 'required|string|max:255|unique:clients',
                'password' => 'required|string|min:8',
                'client_full_name' => 'nullable|string|max:255',
                'client_short_name' => 'nullable|string|max:255',
                'kpp' => 'nullable|string|max:9',
                'ogrn' => 'nullable|string|max:13',
                'address' => 'nullable|string|max:255',
                'status' => 'nullable|string|max:255',
                'okved_code_id' => 'nullable|int',
                'legal_login' => 'nullable|string|max:255',
                'legal_password' => 'nullable|string|min:8',
            ]);


            $physicalPerson = PhysicalPerson::create([
                'surname' => $validatedData['surname'],
                'name' => $validatedData['name'],
                'patronymic' => $validatedData['patronymic'],
                'birth_date' => $validatedData['birth_date'],
                'passport_series' => $validatedData['passport_series'],
                'passport_number' => $validatedData['passport_number'],
                'inn' => $validatedData['inn'],
                'snils' => $validatedData['snils'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
            ]);


            $hashedPassword = Hash::make($validatedData['password']);
            $password = Password::create(['password' => $hashedPassword]);


            $client = Client::create([
                'person_id' => $physicalPerson->id,
                'type' => $validatedData['type'],
                'login' => $validatedData['login'],
                'password_reference' => $password->id,
            ]);


            if ($validatedData['type'] === 'юридическое лицо') {
                $hashedLegalPassword = Hash::make($validatedData['legal_password']);
                $legalPassword = Password::create(['password' => $hashedLegalPassword]);

                $legalClient = Client::create([
                    'person_id' => $physicalPerson->id,
                    'type' => 'юридическое лицо',
                    'login' => $validatedData['legal_login'],
                    'password_reference' => $legalPassword->id,
                ]);

                LegalPerson::create([
                    'client_id' => $legalClient->id,
                    'client_full_name' => $validatedData['client_full_name'],
                    'client_short_name' => $validatedData['client_short_name'],
                    'inn' => $validatedData['inn'],
                    'kpp' => $validatedData['kpp'],
                    'ogrn' => $validatedData['ogrn'],
                    'physical_persons_id' => $physicalPerson->id,
                    'phone' => $validatedData['phone'],
                    'email' => $validatedData['email'],
                    'address' => $validatedData['address'],
                    'status' => $validatedData['status'],
                    'okved_code_id' => $validatedData['okved_code_id'],
                ]);
            }

            return response()->json(['message' => 'Registration successful'], 201);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {

        $validatedData = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);


        $client = Client::where('login', $validatedData['login'])->first();


        if (!$client || !Hash::check($validatedData['password'], $client->password->password)) {
            return response()->json(['message' => 'Invalid login or password'], 401);
        }


        return response()->json($client);


    }
}
