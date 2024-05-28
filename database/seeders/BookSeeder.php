<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $libros = [
            [
                "nombre" => "Cien años de soledad",
                "titulo" => "Cien años de soledad",
                "genero" => "Realismo mágico",
                "descripcion" => "Una saga multigeneracional que narra la historia de la familia Buendía en el ficticio pueblo de Macondo.",
                "autor" => "Gabriel García Márquez"
            ],
            [
                "nombre" => "Harry Potter y la piedra filosofal",
                "titulo" => "Harry Potter y la piedra filosofal",
                "genero" => "Fantasía",
                "descripcion" => "La primera entrega de la serie de libros de Harry Potter, que sigue las aventuras del joven mago Harry Potter y sus amigos en Hogwarts.",
                "autor" => "J.K. Rowling"
            ],
            [
                "nombre" => "El Señor de los Anillos",
                "titulo" => "El Señor de los Anillos",
                "genero" => "Fantasía épica",
                "descripcion" => "Una epopeya fantástica que sigue la búsqueda del hobbit Frodo Bolsón para destruir el Anillo Único y derrotar al Señor Oscuro Sauron.",
                "autor" => "J.R.R. Tolkien"
            ],
            [
                "nombre" => "1984",
                "titulo" => "1984",
                "genero" => "Distopía",
                "descripcion" => "Una novela distópica que presenta un mundo totalitario gobernado por el Gran Hermano, donde la libertad individual es suprimida.",
                "autor" => "George Orwell"
            ],
            [
                "nombre" => "Orgullo y prejuicio",
                "titulo" => "Orgullo y prejuicio",
                "genero" => "Novela romántica",
                "descripcion" => "Una historia de amor y prejuicios sociales que sigue el complicado cortejo entre Elizabeth Bennet y el señor Darcy.",
                "autor" => "Jane Austen"
            ]
        ];

        User::factory(1)->create();

        foreach ($libros as $libro) {
            \App\Models\Book::create(
                [
                    'title' => $libro['nombre'],
                    'author' => $libro['autor'],
                    'description' => $libro['descripcion'],
                    'genre' => $libro['genero'],
                    'status' => 'available',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            );
        }
    }
}
