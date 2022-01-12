<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 uppercase ">
            {{ __('School Work Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <form method="POST" action="{{ route('schoolWorkInfo.addHomeworkTeacherStore') }}" enctype="multipart/form-data">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 bg-white border-b border-gray-200">
                    <section class="justify-center">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap px-6">
                                <div class="w-full md:px-4 lg:px-6 py-5">
                                        <div class="px-4 py-4 md:px-10">
                                            <div class="grid grid-cols-1">
                                                <x-label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="class" :value="__('Class')" />
                                                {!! Form::select('class',$classList,$class,[ 'class'=>'py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent','required','placeholder'=>__('Please select'),'id'=>'class','name'=>'class']) !!}
                                            </div>
                                            <div class="grid grid-cols-1 pt-8">
                                                <x-label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold" for="subject" :value="__('Subject Class Name')" />
                                                {!! Form::select('subject',$subjectList,$subject,[ 'class'=>'py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent','required','placeholder'=>__('Please select'),'id'=>'subject','name'=>'subject']) !!}
                                            </div>
                                            <div class="grid grid-cols-1 pt-8">
                                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tittle</label>
                                                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="title" placeholder="Insert title" />
                                            </div>
                                            <div class="grid grid-cols-1 pt-8">
                                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Due Date</label>
                                                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" name="due_date" placeholder="Insert title" />
                                            </div>

                                            

                                            <div class="grid grid-cols-1 pt-8">
                                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                                                <textarea class="resize-none py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="description" type="text"></textarea>
                                              </div>

                                              <div class="grid grid-cols-1 pt-8">
                                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload File</label>
                                                  <div class='flex items-center justify-center w-full h-auto'>
                                                      <label class='flex flex-col border-4 border-dashed w-full h-auto hover:bg-gray-100 hover:border-purple-300 group'>
                                                            <div id="placeholder" class='flex flex-col items-center justify-center pt-7'>
                                                                <svg class=" w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                                <p class=' lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a file</p>
                                                            </div>
                                                            <img id="output" class="h-auto w-auto">
                                                        <input type='file' name="picture" id="image" onchange="loadFile(event)" class="hidden"/>
                                                      </label>
                                                  </div>
                                              </div>

                                             
                                        </div>
                                </div>
                            </div>
                
                        </div>
                    </section>
                </form>
                    <div class='flex items-center justify-center  pt-5 pb-8 '>
                        <button type="submit" class=' md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300 shadow-xl font-medium text-white px-4 py-2' onclick="location.href='{{('/dashboard/listHomeworkTeacher')}}'">ADD</button>
                      </div>
            </div>
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
