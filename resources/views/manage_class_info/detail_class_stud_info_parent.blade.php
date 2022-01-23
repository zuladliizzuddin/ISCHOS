<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
          <a href="/classInfo">{{ __('CLASS INFORMATION') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 bg-white border-b border-gray-200">
                    <section class="justify-center">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap px-6">
                                <div class="w-full md:px-4 lg:px-6 py-5">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                          <div class='flex items-center justify-center w-full'>
                                             
                                                    @php
                                                    $id = $detailStudent->id
                                                @endphp

                                                @if ($detailStudent->studImage != null)                                
                                                <div class="flex">
                                                    <img class="w-40 h-40 border-2 shadow-md" src= "{{ url($detailStudent ->studImage ) }}" disabled />
                                                @endif
                                                </div>
                                                    
                                             
                                          </div>
                                      </div>
                                     
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student's Full Name</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->studFullName}}" disabled />
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student Identity Card</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->studIdCard}}" disabled />
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Address</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->address}}" disabled/>
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Class Name</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->school_class->class_name}}" disabled/>
                          </div>

                          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                            <div class="grid grid-cols-1">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->gender}}" disabled/>
                            </div>
                            <div class="grid grid-cols-1">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Age</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->age}}" disabled/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">B.O.D</label>
                                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->brthOfDate}}" disabled/>
                              </div>
                              <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Religion</label>
                                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->religon}}" disabled/>
                              </div>
                          </div>
                      
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parent's Full Name</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->parentFullName}}" disabled/>
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parent Identity Card</label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->parentIdCard}}" disabled/>
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parental Salary </label>
                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$detailStudent->parentSalary}}" disabled/>
                          </div>
                      
                          <div class='flex items-center justify-center w-100  md:gap-8 gap-4 pt-5 pb-5 '>

                            <button class='w-auto bg-indigo-900 border-indigo-300 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="location.href='{{ ('/studInfo/editClassStudInfo') }}/{{$id !=null ? $id:0}}'">EDIT</button>

                          </div>

            </div>
        </div>
    </div>
    

</x-app-layout>