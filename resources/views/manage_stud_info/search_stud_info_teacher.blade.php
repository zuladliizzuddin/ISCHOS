<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
          <a href="{{ route('studInfo.list_studInfo')}}">{{ __('STUDENT INFORMATION') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 bg-white border-b border-gray-200">
                    
                      <div class="min-h-screen dark:bg-gray-900 py-6  flex-col ">
                        <div class="flex flex-col p-1">

                        {{-- Search --}}
                            <div class="pt-2 relative mx-auto text-gray-600">
                              <form action="{{ route('studInfo.searchStudInfo') }}" method="GET" role="search">
                                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                  type="search" name="search" placeholder="Search">
                                <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                  <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                    width="512px" height="512px">
                                    <path
                                      d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                  </svg>
                                </button>
                              </form>
                            </div>
                        {{-- End Search --}}
                        
                            <div class="overflow-x-auto mt-6">
                            
                              <table class="table-auto border-collapse w-full">
                                <thead>
                                  <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                                    <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Name</th>
                                    <th class="px-4 py-2 " style="background-color:#f8f8f8">IC</th>
                                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Gender</th>
                                  </tr>
                                </thead>
                                @foreach ($detailStudentInfo as $listSudentinfo)
                                  @php
                                  $id = $listSudentinfo->id
                                  @endphp
                                    <tbody class="text-sm font-normal text-gray-700">
                                      <tr class="hover:bg-gray-100 border-b border-gray-200 py-10" style="cursor: pointer" onclick="window.location.href='{{ ('/studInfo/detailStudent') }}/{{$id !=null ? $id:0}}'">
                                        <td class="px-4 py-4">{{$listSudentinfo->studFullName}}</td>
                                        <td class="px-4 py-4">{{$listSudentinfo->studIdCard}}</td>
                                        <td class="px-4 py-4">{{$listSudentinfo->gender}}</td>
                                      </tr>
                                    </tbody>
                                @endforeach
                              </table>
                            </div>
                      </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

