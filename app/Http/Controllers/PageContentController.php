<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function index()
    {
        $content = PageContent::first();
        return view('homecessa', compact('content'));
    }
}