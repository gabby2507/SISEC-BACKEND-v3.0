<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Student;

class StudentController extends Controller
{
    public function fetchStudentData(Request $request)
    {
        $request->validate([
            'student_number' => 'required|string',
        ]);

        $studentNumber = $request->input('student_number');
        
        // Enviar solicitação para o sistema de gestão de estudantes
        $response = Http::get('https://url-do-sistema-gestao-estudantes.com/api/student', [
            'student_number' => $studentNumber,
        ]);

        if ($response->successful()) {
            $studentData = $response->json();

            // Salvar dados no banco de dados do SISEC
            $student = Student::updateOrCreate(
                ['student_number' => $studentNumber],
                [
                    'name' => $studentData['name'],
                    'bi_number' => $studentData['bi_number'],
                    'course' => $studentData['course'],
                    'admission_year' => $studentData['admission_year'],
                    'completion_year' => $studentData['completion_year'],
                    'final_grade' => $studentData['final_grade'],
                ]
            );

            return response()->json($student);
        }

        return response()->json(['message' => 'Erro ao buscar dados do estudante'], 500);
    }
}
