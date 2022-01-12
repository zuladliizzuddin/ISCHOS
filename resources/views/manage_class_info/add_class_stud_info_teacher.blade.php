<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('CLASS INFORMATION') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('classInfo.addClassStudInfoStore') }}" enctype="multipart/form-data">
        @csrf
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 bg-white border-b border-gray-200">
                    <section class="justify-center">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap px-6">
                                <div class="w-full md:px-4 lg:px-6 py-5">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Image</label>
                                          <div class='flex items-center justify-center w-full'>
                                              <label class='flex flex-col border-4 border-dashed w-40 h-40 hover:bg-gray-100 hover:border-purple-300 group'>
                                                    <div id="placeholder" class='flex flex-col items-center justify-center pt-7 '>
                                                        <svg class=" w-10 h-10 mt-3 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                        <p class='h-40 w-40 text-center lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a file</p>
                                                    </div>
                                                    <img id="output" class="h-40 w-40">
                                                <input type='file' name="studImage" id="image" onchange="loadFile(event)" class="hidden"/>
                                              </label>
                                          </div>
                                      </div>
                                     
                            <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student's Full Name</label>
                            <input name="studFullName" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" />
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student Identity Card (With -)</label>
                            <input name="studIdCard" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"  />
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Address</label>
                            <input name="address" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" />
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Class Name</label>
                             {!! Form::select('class',$clasList,$class,[ 'class'=>'py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent','required','placeholder'=>__('Please select'),'id'=>'class','name'=>'class']) !!}
                          </div>

                          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                            <div class="grid grid-cols-1">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
                              <select name="gender" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                <option value="Lelaki">LELAKI</option>
                                <option value="Perempuan">PEREMPUAN</option>
                              </select>
                            </div>

                            <div class="grid grid-cols-1">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Age</label>
                              <input name="age" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"/>
                            </div>
                            
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">B.O.D (Example: 11 January 2000)</label>
                                <input name="brthOfDate" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"/>
                              </div>

                              <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Religion</label>
                                <select name="religon" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                  <option value="Islam">ISLAM</option>
                                  <option value="Buddha">BUDDHA</option>
                                  <option value="Kristian">KRISTIAN</option>
                                </select>
                              </div>
                          </div>
                      
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parent's Full Name</label>
                            <input name="parentFullName" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"/>
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parent Identity Card (With -)</label>
                            <input name="parentIdCard" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"/>
                          </div>

                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parental Salary (RM) </label>
                            <input name="parentSalary" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"/>
                          </div>

                          </div>
                            </div>
                
                        </div>
                    </section>

                </form>
                    <div class='flex items-center justify-center pt-10 pb-8 '>
                            <button type="submit" class=' md:w-5/12 w-11/12 bg-indigo-900 border-indigo-300 rounded-full shadow-xl font-medium text-white px-4 py-2'>SAVE</button>
                      </div>

            </div>

    

</x-app-layout>

<script>
    var loadFile = function(event){
        var output = document.getElementById('output');
        var placeholder = document.getElementById('placeholder');
        output.src = URL.createObjectURL(event.target.files[0]);
        placeholder.style.display = "none";

    }
</script>