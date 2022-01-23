<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
          <a href="{{ route('studInfo.list_studInfo')}}">{{ __('STUDENT INFORMATION') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="pt-6 pb-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <div class="w-11/12 md:w-9/12 lg:w-1/2">
                          <div class="flex justify-center pt-4">
                            <div class="flex">
                                <img class="w-auto h-40 border-2 shadow-md" src="{{ asset('img/azwan.jpg') }}" alt="" />
                            </div>
                          </div>

                          <div class='flex items-center justify-center w-100 pb-8'>
                            <button class='w-auto h-8 bg-gray-500 border-indigo-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Choose File</button>
                          </div>
                      
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Full Name</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="MOHAMMAD AZWAN BIN MOHD SIDIK" />
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Identity Card</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="220303-03-3232" />
                          </div>
                      
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                            <div class="grid grid-cols-1">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
                              <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                <option>LELAKI</option>
                                <option>PEREMPUAN</option>
                              </select>
                            </div>
                            <div class="grid grid-cols-1">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Age</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="15" />
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">B.O.D</label>
                                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="13/04/2022" />
                              </div>
                              
                              <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Religion</label>
                                <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                  <option>ISLAM</option>
                                  <option>BUDDHA</option>
                                  <option>KRISTIAN</option>
                                </select>
                              </div>
                          </div>
                      
                      
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Full Name Parent</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="MUHD SIDIK BIN AZWAN" />
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Identity Card</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="970303-03-3232" />
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Class Name</label>
                            <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                              <option>1 ZAMRUD</option>
                              <option>2 ZAMRUD</option>
                              <option>3 ZAMRUD</option>
                            </select>
                          </div>
                      
                          <div class='flex items-center justify-center w-100  md:gap-8 gap-4 pt-5 pb-5 '>
                            <button class='w-auto bg-indigo-900 border-indigo-300 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="location.href='{{ ('/dashboard/detailStudInfo') }}'">UPDATE</button>
                          </div>
                      
                        </div>
                      </div>

                      
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
