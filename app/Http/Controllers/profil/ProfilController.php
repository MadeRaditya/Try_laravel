<?php

namespace App\Http\Controllers\profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $biodata = [
            "nama" => "Joko Santoso",
            "npm" => 22019929,
            "role" => "Full Stack Developer",
            "project" => 12,
            "experience" => "2+ Years",
            "skill" => "15+",
        ];

        $skills = [
            ["name" => "Laravel", "percentage" => 90],
            ["name" => "Vue.js", "percentage" => 85],
            ["name" => "TailwindCSS", "percentage" => 95],
            ["name" => "MySQL", "percentage" => 80],
        ];

        $projects = [
            [
                "title" => "Todo App",
                "description" => "A simple todo application with Laravel",
                "icon" => "red",
            ],
            [
                "title" => "Anime Collection",
                "description" => "Anime tracking application",
                "icon" => "purple",
            ],
            [
                "title" => "Portfolio Website",
                "description" => "Personal branding site with Tailwind",
                "icon" => "blue",
            ],
        ];

        $socials = [
            "github" => "https://github.com/jokosantoso",
            "linkedin" => "https://linkedin.com/in/jokosantoso",
            "twitter" => "https://twitter.com/jokosantoso",
        ];

        return view("profil.profil", [
            "biodata" => $biodata,
            "skills" => $skills,
            "projects" => $projects,
            "socials" => $socials,
        ]);
    }
}
