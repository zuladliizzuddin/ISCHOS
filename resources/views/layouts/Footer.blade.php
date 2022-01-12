<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
</head>
<footer
    class="grid bg-white dark:bg-gray-800 bg-opacity-95 border-opacity-60
             text-xs text-black 
             border-solid  border-2 h-15
             justify-around cursor-pointer
             fixed
             inset-x-0
             bottom-0
             pt-2">
    <div class="flex justify-items-center gap-11  ">

        <a href="{{ route('dashboard') }}">
            <div class="justify-content-center pl-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " viewBox="0 0 20 20" fill="grey">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </div>
            <div class="text-center text-xs">
                <p class="text-gray-900 dark:text-gray-300 ">Home</p>
            </div>
        </a>

        <a href="{{ route('announcement.listAnnouncement') }}">
            <div class=" items-center ">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="grey"
                    class="bi bi-megaphone-fill d-block m-auto" viewBox="0 0 16 16">
                    <path
                        d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z" />
                </svg>
            </div>
            <div class=" text-xs ">
                <p class="text-gray-900 dark:text-gray-300 ">Announcement</p>
            </div>
        </a>
        
        @if (Auth::user()->hasRole('teacher'))
            <a href="{{ route('manage_user.list_user') }}">
                <div class=" items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 d-block m-auto" viewBox="0 0 20 20"
                        fill="grey">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="text-center text-xs ">
                    <p class="text-gray-900 dark:text-gray-300 ">User</p>
                </div>
            </a>

        @elseif(Auth::user()->hasRole('parent'))
            <a href="{{ route('manage_profile.view_profile') }}">
                <div class=" items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 d-block m-auto" viewBox="0 0 20 20"
                        fill="grey">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="text-center text-xs ">
                    <p class="text-gray-900 dark:text-gray-300 ">Profile</p>
                </div>
            </a>
        @endif


    </div>

</footer>
</body>

</html>
