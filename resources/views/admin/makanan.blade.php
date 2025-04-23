<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('partials.sidebar')
            <main class="p-6">
                @yield('content')
            </main>
        <!-- Main Content -->
        <div class="p-5 flex-1 overflow-y-auto overflow-x-hidden">
        <!-- Profile -->
        @include('partials.profile')
            <main class="p-1">
                @yield('content')
            </main>
            
            <main>
                <div>
                    <div>
                        <dialog>

                        </dialog>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
