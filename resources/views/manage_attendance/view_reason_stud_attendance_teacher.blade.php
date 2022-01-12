<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
          {{ __('Student Attendance') }}
      </h2>
  </x-slot>

  <div class="py-12">

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- SMALL CARD ROUNDED -->
        <div class="bg-white shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer  | transition-colors duration-500">
          <div class="flex flex-col justify-center p-5">
          <p class="text-center text-gray-900 dark:text-gray-300 pb-5">Date</p>
          <p class="text-center text-blue-400 font-bold text-3xl">{{ $attendances->created_at->format('d/m/Y') }}</p>
          </div>
          <div class="flex flex-col justify-center p-5">
            <p class="text-gray-900  text-center dark:text-gray-300 pb-5">Status</p>
            <p class="text-red-500 text-center  dark:text-gray-100 text-justify font-bold">Absent</p>
          </div>
        </div>
        <br><br>
        <!-- END SMALL CARD ROUNDED -->
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-bold text-3xl text-center text-white  leading-tight  bg-indigo-900 border-indigo-300 ">
              {{ __('Reason') }}
            </h2>
                <div class="p-6 bg-white border-b border-gray-200">
                  <section class="justify-center">
                    <div class="container mx-auto">
                        <div class="flex flex-wrap px-6">
                            <div class="w-full md:px-4 lg:px-6 py-5">
                                    <div class="px-4 py-4 md:px-10">
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name</label>
                                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value={{ $attendances->student->studFullName}}  />
                                            <br>
                                          </div>
                                        <div class="grid grid-cols-1 pt-2">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                                            <textarea class="resize-none py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text">{{$attendances->description}}</textarea>
                                          </div>

                                          <div class="grid grid-cols-1 pt-8">
                                              <div class='flex items-center justify-center w-full'>
                                                  <label class='flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-purple-300 group'>
                                                      <img src= "{{ url($attendances->file_reason) }}" class="h-auto w-full border-white border-8">
                                                  </label>
                                              </div>
                                          </div>
                                    </div>
                            </div>
                        </div>
            
                    </div>
                </section>
                    
              </div>
          </div>
      </div>
  </div>

</x-app-layout>
