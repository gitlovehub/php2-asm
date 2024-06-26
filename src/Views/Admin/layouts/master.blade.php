<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
                lineHeight: {
                    '48': '48px',
                },
            }
          }
        }
    </script>
    <title>
        @yield('title')
    </title>
</head>
<body class="text-base">
    @include('layouts.partials.aside')

    <section class="container max-w-screen-xl m-auto py-10 pl-40">
        <h1 class="text-2xl uppercase font-bold text-center">@yield('title')</h1>

        <div class="grid place-items-center">
            @if (isset($_SESSION["alert-success"]))
                <span class="bg-green-100 text-green-800 text-sm font-medium mt-4 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                    {{ $_SESSION["msg"] }}
                </span>
            @endif
        
            @if (isset($_SESSION["alert-error"]))
                <span class="bg-red-100 text-red-800 text-sm font-medium mt-4 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                    {{ $_SESSION["msg"] }}
                </span>
            @endif
        
            @php
                unset($_SESSION["alert-success"]);
                unset($_SESSION["alert-error"]);
            @endphp
        </div>

        <main style="min-height: 100vh">
            @yield('content')
        </main>
    </section>

    @include('layouts.partials.footer')

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>