<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
          <a href="/classInfo">{{ __('CLASS INFORMATION') }}</a>
        </h2>
    </x-slot>
  
    <div class="py-12">
    @foreach($detailStudent as $student)
    @php
        $id = $student->id
    @endphp
    <form method="POST" action="{{ ('/studInfo/updateClassStudInfo') }}/{{$id !=null ? $id:0}}" enctype="multipart/form-data">
    @csrf 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 bg-white border-b border-gray-200">
                    <section class="justify-center">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap px-6">
                                <div class="w-full md:px-4 lg:px-6 py-5">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Image</label>
                                          <div class='flex items-center justify-center w-full'>
  
                                          @if ($student->studImage != null)                                
                                                <div class="flex">
                                                  <label class='flex flex-col border-5 border-dashed w-40 h-40 hover:bg-gray-100 hover:border-purple-300 group '>
                                                    <div class='flex flex-col items-center justify-center'>
                                                    <img class="w-40 h-40 border-4 border-dashed" id="output" src= "{{ asset($student ->studImage ) }}" />
                                                    <input type='file' name="studImage" id="image" onchange="loadFile(event)" class="hidden" disabled/>
                                                    </div>
                                                 </label>
                                                @endif
                                                </div>
                                          </div>
                                      </div>
                                     
                            <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student's Full Name</label>
                            <input name="studFullName" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$student->studFullName}}" disabled/>
                          </div>
  
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student Identity Card</label>
                            <input name="studIdCard" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"  value="{{$student->studIdCard}}" disabled/>
                          </div>
  
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Address</label>
                            <input name="address" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$student->address}}"/>
                          </div>
  
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Class Name</label>
                             {!! Form::select('class',$clasList,$class,[ 'class'=>'py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent','disabled','id'=>'class','name'=>'class']) !!}
                          </div>
  
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                            <div class="grid grid-cols-1">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
                              <select name="gender" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" disabled>
                                <option value="Lelaki">LELAKI</option>
                                <option value="Perempuan">PEREMPUAN</option>
                              </select>
                            </div>
  
                            <div class="grid grid-cols-1">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Age</label>
                              <input name="age" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$student->age}}" disabled/>
                            </div>
                            
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">B.O.D (Example: 11 January 2000)</label>
                                <input name="brthOfDate" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$student->brthOfDate}}" disabled/>
                              </div>
  
                              <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Religion</label>
                                <select name="religon" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" disabled>
                                  <option value="Islam">ISLAM</option>
                                  <option value="Buddha">BUDDHA</option>
                                  <option value="Kristian">KRISTIAN</option>
                                </select>
                              </div>
                          </div>
                      
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parent's Full Name</label>
                            <input name="parentFullName" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$student->parentFullName}}" disabled/>
                          </div>
  
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parent Identity Card (With -)</label>
                            <input name="parentIdCard" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$student->parentIdCard}}" disabled/>
                          </div>
  
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parental Salary (RM) </label>
                            <input name="parentSalary" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" value="{{$student->parentSalary}}" />
                          </div>
  
                          </div>
                            </div>
                @endforeach
                        </div>
                    </section>
  
                </form>
                    <div class='flex items-center justify-center w-100  md:gap-8 gap-4 pt-10 pb-5 '>
                            <button type="submit" class=' w-auto bg-indigo-900 border-indigo-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'>UPDATE</button>
                          </div>
  
            </div>
        </div>
    </div>
    
  
  </x-app-layout>