<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Board</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Meta tagovi za SEO -->
    <meta name="description" content="Find your dream job with our Job Board. Browse listings, apply for jobs, and manage your applications easily.">
    <meta name="keywords" content="job board, job listings, job applications, employment, career">
    <meta name="author" content="Beratovic Zeljko">
    <meta property="og:title" content="Job Board">
    <meta property="og:description" content="Find your dream job with our Job Board.">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
