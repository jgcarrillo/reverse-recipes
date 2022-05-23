<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <title>Reverse Recipes - {{ $recipe_data['name'] }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">

    <style>
        .table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .table thead tr {
            background-color: rgb(253 224 71);;
            color: black;
            text-align: left;
        }

        .table th,
        .table td {
            padding: 12px 15px;
        }

        .table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .table tbody tr:last-of-type {
            border-bottom: 2px solid rgb(253 224 71);;
        }

        .table tbody {
            font-weight: bold;
            color: black;
        }

        .header__h1 {
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: bold;
        }

        .italic {
            font-style: italic;
        }

        .logo__img {
            display: block;
            margin-right: auto;
            margin-left: auto;
            width: 50px;
        }

        .date {
            font-style: italic;
            text-align: right;
            margin-top: 1.5rem;
            font-size: 0.8rem;
        }

        .recipe {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
<header>
    <h1 class="header__h1">
        <img class="logo__img" src="{{ $logo }}" alt="Reverse Recipes Logo">
        {{ $recipe_data['name'] }}
        <img class="logo__img" src="{{ $logo }}" alt="Reverse Recipes Logo">
    </h1>
</header>

<div class="recipe">
    <img class="recipe__image" src="{{ public_path('storage/images/recipes/') . $recipe_data['photo'] }}" alt="Recipe Image">
</div>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Time <span class="italic">(minutes)</span></th>
        <th>Difficulty</th>
        <th>Persons</th>
        <th>Type</th>
        <th>Ingredients</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $recipe_data['name'] }}</td>
        <td>{{ $recipe_data['description'] }}</td>
        <td>{{ $recipe_data['time'] }}</td>
        <td>{{ $recipe_data['difficulty'] }}</td>
        <td>{{ $recipe_data['persons'] }}</td>
        <td>{{ $recipe_data['type'] }}</td>
        <td>{{ $recipe_data['ingredients'] }}</td>
    </tr>
    </tbody>
</table>

<div class="date">
    Date of generation: {{ $date }}
</div>
</body>
</html>
