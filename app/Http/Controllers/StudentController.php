<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Student;

class StudentController extends Controller
{
    /*public function fetchStudentData(Request $request)
    {
       
        $request->validate([
            'student_number' => 'required|string',
        ]);
    
        $studentNumber = $request->input('student_number');
    
        // Primeiro, obtenha o token JWT de autenticação
        $authResponse = Http::post('http://localhost:3000/api/auth/login', [
            'email' => 'vanilsonhector@gmail.com',
            'password' => 'aaabbbccc',
        ]);

        if ($authResponse->failed()) {
            return response()->json(['message' => 'Falha na autenticação'], 401);
        }
    
        $token = $authResponse->json()['token'];
    
        // Depois, faça a requisição para obter os dados do estudante usando o token
        $response = Http::withToken($token)->get("http://localhost:3000/api/students/{$studentNumber}");

        if ($response->successful()) {
            $studentData = $response->json();

            // Salvar dados no banco de dados do SISEC
            $student = Student::updateOrCreate(
                ['student_number' => $studentNumber],
                [
                    
                    "numerEstudante"=> $studentData["numerEstudante"],
                    "nome"=> $studentData["nome"],
                    "BI"=> $studentData["BI"],
                    "faculdade"=> $studentData["faculdade"],
                    "curso"=> $studentData["curso"],
                    "dataInicio"=> $studentData["dataInicio"],
                    "dataFim"=> $studentData["dataFim"],
                    "mediasCadeiras"=> $studentData["mediasCadeiras"],
                    "mediaGlobal"=> $studentData["mediaGlobal"],
                    "nomeReitor"=> $studentData["nomeReitor"],
                  
                ]
            );

            return response()->json($student);
        }

        return response()->json(['message' => 'Erro ao buscar dados do estudante'], 500);
    }*/


    public function fetchStudentData(Request $request)
    {
       
        $request->validate([
            'student_number' => 'required|string',
        ]);
        $campos = $request->input('student_number');
        
    //return "https://api.econlab.co.mz/api/certificado?numeroEstudante={$campos}";
        // Depois, faça a requisição para obter os dados do estudante usando o token
        $response = Http::get("https://api.econlab.co.mz/api/certificado?numeroEstudante={$campos}");

        return $response->json();
        if ($response->successful()) {
            $studentData = $response->json();

            // Salvar dados no banco de dados do SISEC
            $student = Student::updateOrCreate(
                ['student_number' => $studentNumber],
                [
                    
                    "numerEstudante"=> $studentData["numerEstudante"],
                    "nome"=> $studentData["nome"],
                    "BI"=> $studentData["BI"],
                    "faculdade"=> $studentData["faculdade"],
                    "curso"=> $studentData["curso"],
                    "dataInicio"=> $studentData["dataInicio"],
                    "dataFim"=> $studentData["dataFim"],
                    "mediasCadeiras"=> $studentData["mediasCadeiras"],
                    "mediaGlobal"=> $studentData["mediaGlobal"],
                    "nomeReitor"=> $studentData["nomeReitor"],
                  
                ]
            );

            return response()->json($student);
        }

        return response()->json(['message' => 'Erro ao buscar dados do estudante'], 500);
    }

}
