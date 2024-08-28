<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <img src="{{ asset('assets/images/mvc.png') }}" alt="">

    <h1>Hello This my Home Page</h1>
    <ol>
        @foreach ($fruits as $fruit)
            <li>{{ $fruit }}</li>
        @endforeach
    </ol>

    <button id='one'>Click Me</button>

    <table>
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fruits as $fruit)
                <tr>
                    <td>{{ $fruit }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>


    <script>
        let btnElem = document.getElementById('one');
        btnElem.addEventListener('click', function() {
            alert('Hello Welcome to Laravel')
        })
    </script>


</body>

</html>
