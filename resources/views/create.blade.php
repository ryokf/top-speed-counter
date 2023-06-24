<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/app.css')
</head>

<body>
    {{-- navbar start --}}
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Homepage</a></li>
                    <li><a>Portfolio</a></li>
                    <li><a>About</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
        </div>
    </div>
    {{-- navbar end --}}

    <div class="container mx-10">
    <form action="/create" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-4">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="torque" class="form-label">Torque:</label>
            <input type="number" name="torque" id="torque" value="{{ old('torque') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="power" class="form-label">Power:</label>
            <input type="number" name="power" id="power" value="{{ old('power') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="shifting_rpm" class="form-label">Shifting RPM:</label>
            <input type="number" name="shifting_rpm" id="shifting_rpm" value="{{ old('shifting_rpm') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="limit_rpm" class="form-label">Limit RPM:</label>
            <input type="number" name="limit_rpm" id="limit_rpm" value="{{ old('limit_rpm') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="weight" class="form-label">Weight:</label>
            <input type="number" name="weight" id="weight" value="{{ old('weight') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="mass" class="form-label">Mass:</label>
            <input type="number" name="mass" id="mass" value="{{ old('mass') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="wheel_rad" class="form-label">Wheel Radius:</label>
            <input type="number" name="wheel_rad" id="wheel_rad" value="{{ old('wheel_rad') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="primary_gear_ratio" class="form-label">Primary Gear Ratio:</label>
            <input type="number" name="primary_gear_ratio" id="primary_gear_ratio"
                value="{{ old('primary_gear_ratio') }}" required class="form-control">
        </div>

        <div class="mt-4">
            <label for="gear_ratio_1" class="form-label">Gear Ratio 1:</label>
            <input type="number" name="gear_ratio_1" id="gear_ratio_1" value="{{ old('gear_ratio_1') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="gear_ratio_2" class="form-label">Gear Ratio 2:</label>
            <input type="number" name="gear_ratio_2" id="gear_ratio_2" value="{{ old('gear_ratio_2') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="gear_ratio_3" class="form-label">Gear Ratio 3:</label>
            <input type="number" name="gear_ratio_3" id="gear_ratio_3" value="{{ old('gear_ratio_3') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="gear_ratio_4" class="form-label">Gear Ratio 4:</label>
            <input type="number" name="gear_ratio_4" id="gear_ratio_4" value="{{ old('gear_ratio_4') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="gear_ratio_5" class="form-label">Gear Ratio 5:</label>
            <input type="number" name="gear_ratio_5" id="gear_ratio_5" value="{{ old('gear_ratio_5') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="gear_ratio_6" class="form-label">Gear Ratio 6:</label>
            <input type="number" name="gear_ratio_6" id="gear_ratio_6" value="{{ old('gear_ratio_6') }}" required
                class="form-control">
        </div>

        <div class="mt-4">
            <label for="secondary_gear_ratio" class="form-label">Secondary Gear Ratio:</label>
            <input type="number" name="secondary_gear_ratio" id="secondary_gear_ratio"
                value="{{ old('secondary_gear_ratio') }}" required class="form-control">
        </div>

        <div class="mt-4">
            <label for="photo" class="form-label">Photo:</label>
            <input type="file" name="photo" id="photo" required class="form-control">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

    {{-- footer start --}}
    <footer class="footer p-10 bg-neutral text-neutral-content">
        <div>
            <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                fill-rule="evenodd" clip-rule="evenodd" class="fill-current">
                <path
                    d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                </path>
            </svg>
            <p>ACME Industries Ltd.<br />Providing reliable tech since 1992</p>
        </div>
        <div>
            <span class="footer-title">Social</span>
            <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg></a>
            </div>
        </div>
    </footer>
    {{-- footer end --}}
</body>

</html>
